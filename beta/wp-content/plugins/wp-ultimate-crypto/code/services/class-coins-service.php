<?php

namespace MABEL_WPUC\Code\Services {

	use MABEL_WPUC\Core\Common\Linq\Enumerable;
	use MABEL_WPUC\Core\Common\Managers\Settings_Manager;

	class Coins_Service {

		public static $transient_name = 'wpuc_coins';
		public static $transient_name_currencies = 'wpuc_currencies';
		private static $transient_coin_ids_name = 'wpuc_coin_ids';
		private static $coinlist = null;
		private static $currencylist = null;

		#region Public functions

		public static function exchange($amt, $curr) {

			if(strtoupper($curr) === 'USD') return $amt;

			if(empty(self::$currencylist))
				self::fetch();

			$currency = Enumerable::from(self::$currencylist)->firstOrDefault(function($x) use($curr){
				return $x['currency'] === strtoupper($curr);
			});

			if($currency === null)
				return "Currency unavailable!";

			return round($amt/$currency['exchange_rate'],2);
		}

		public static function get_coin($coin = '') {

			self::fetch();
			return Enumerable::from(self::$coinlist)->firstOrDefault('$x => $x["id"] === "'.$coin.'"');

		}

		public static function get_coins($coinlist = array()) {

			self::fetch();

			if(empty(self::$coinlist) || self::$coinlist === false) return false;

			if(empty($coinlist))
				return self::$coinlist;

			$result = array();

			foreach ($coinlist as $coin_id) {
				$coin = Enumerable::from(self::$coinlist)->firstOrDefault('$x => $x["id"] === "'.trim($coin_id).'"');
				if($coin != null)
					array_push($result, $coin);
			}

			return $result;

		}

		public static function get_currencies(){
			self::fetch();

			if(empty(self::$currencylist) || self::$currencylist === false) return false;

			return self::$currencylist;
		}

		public static function format_price($price,$decimals = 'auto') {
			$price = floatval($price);
			if($decimals === 'auto'){
				if($price <= 2)
					$decimals = 4;
				else if($price <= 100)
					$decimals = 3;
				else $decimals = 2;
			}
			$format = Settings_Manager::get_setting('format');
			return number_format($price, $decimals, $format === 'point' ? '.':',',$format === 'point' ? ',' : '.');
		}

		#endregion

		#region API functions

		public static function get_coin_ids() {

			$coins = get_transient(self::$transient_coin_ids_name);

			if($coins === false) {
				$coins = CoinApi_Service::get_crypto_ids();
				if($coins === false) return false;
				set_transient(self::$transient_coin_ids_name,$coins, 15 * 60); 
			}

			return $coins;
		}

		public static function import_coins() {

			$retries = 3;
			$response = false;

			while($retries >= 0 && $response === false) {
				$response = CoinApi_Service::get_cryptos();

				if($response != false) {
					set_transient(self::$transient_name,$response['coins'],DAY_IN_SECONDS);
					set_transient(self::$transient_name_currencies,$response['currencies'],DAY_IN_SECONDS);
					update_option(self::$transient_name,$response['coins']);
					update_option(self::$transient_name_currencies,$response['currencies']);
					update_option(self::$transient_name.'_timestamp',time());
				}
			}

			return $response != false? $response['coins'] : false;
		}

		#endregion

		#region Private Helpers

		private static function fetch() {
			if(self::$coinlist === null) {
				self::$coinlist = get_transient( self::$transient_name );
			}
			if(self::$coinlist === false) {
				self::$coinlist = get_option(self::$transient_name);
			}
			if(self::$coinlist === false) {
				self::import_coins();
				self::fetch();
			}
			if(self::$currencylist === null) {
				self::$currencylist = get_transient( self::$transient_name_currencies );
			}
			if(self::$currencylist === false) {
				self::$currencylist = get_option(self::$transient_name_currencies);
			}
			if(self::$currencylist === false) {
				self::import_coins();
				self::fetch();
			}
		}

		#endregion
	}
}
<?php

namespace MABEL_WPUC\Code\Services {

	use MABEL_WPUC\Core\Common\Linq\Enumerable;
	use MABEL_WPUC\Core\Common\Managers\Settings_Manager;

	class CoinApi_Service {

		public static function get_crypto_ids() {

			$response = self::request('type=ids');

			if($response == null || $response->status != 200)
				return false;

			return Enumerable::from($response->body['result'])->select(function($x){
				return array('title' => $x['name'].' ('.$x['shorthand'].')','id' => $x['id']);
			})->toArray();

		}

		public static function get_cryptos() {
			$response = self::request('type=list&list='.Settings_Manager::get_setting('coins').'&currencies='. str_replace(';',',',Settings_Manager::get_setting('currencies')));

			if($response == null || $response->status != 200)
				return false;
			return $response->body;
		}

		#region Private Helpers

		private static function request($action) {

			$url =  'https://studiowombat.com/crypto-api/coins/?'.$action;

			$headers = array(
				'Content-Type' => 'application/json',
				'Authorization' => 'Bearer '.base64_encode('Free/'.get_bloginfo('url')) 
			);

			$options = array(
				'timeout' => 15,
				'headers' => $headers
			);

			$response = wp_remote_get($url,$options);

			if(is_wp_error($response)) return null;

			return (object) array(
				'status' => $response['response']['code'],
				'body' => json_decode(wp_remote_retrieve_body($response), true)
			);
		}

		#endregion

	}
}
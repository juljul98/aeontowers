<?php

namespace MABEL_WPUC\Code\Controllers
{

	use MABEL_WPUC\Code\Models\ListGrid_Base_VM;
	use MABEL_WPUC\Code\Models\WPCryptoGrid_VM;
	use MABEL_WPUC\Code\Models\WPCryptoIcon_VM;
	use MABEL_WPUC\Code\Models\WPCryptoList_VM;
	use MABEL_WPUC\Code\Models\WPCryptoText_VM;
	use MABEL_WPUC\Code\Services\Coins_Service;
	use MABEL_WPUC\Code\Services\Currency_Service;
	use MABEL_WPUC\Core\Common\Linq\Enumerable;
	use MABEL_WPUC\Core\Common\Managers\Config_Manager;
	use MABEL_WPUC\Core\Common\Shortcode;

	if(!defined('ABSPATH')){die;}

	class Shortcode_Controller
	{
		private $slug;

		public function __construct()
		{
			$this->slug = Config_Manager::$slug;
			new Shortcode(
				'wpcrypto_text',
				'wpcrypto-text',
				array($this, 'create_wpcrypto_text_model'),
				array(
					'currency_as_html' => true
				)
			);
			new Shortcode(
				'wpcrypto_list',
				'wpcrypto-list',
				array($this, 'create_wpcrypto_list_model'),
				array(
					'currency_as_html' => true,
					'coins' => 'all',
					'type' => 'price',
					'show_ranking' => true,
					'currency' => 'USD',
					'orderby' => 'list'
				)
			);
			new Shortcode(
				'wpcrypto_grid',
				'wpcrypto-grid',
				array($this, 'create_wpcrypto_grid_model'),
				array(
					'currency_as_html' => true,
					'coins' => 'all',
					'type' => 'price',
					'show_ranking' => true,
					'currency' => 'USD',
					'orderby' => 'list',
					'columns' => 3
				)
			);
			new Shortcode(
				'wpcrypto_icon',
				'wpcrypto-icon',
				array($this,'create_wpcrypto_icon_model'),
				array(
					'coin' => 'bitcoin',
					'size' => 25
				)
			);
		}

		public function create_wpcrypto_icon_model($attributes){
			$model = new WPCryptoIcon_VM();
			$model->icon = Config_Manager::$url .'public/img/coins/'.$attributes['coin'].'.svg';
			$model->size = $attributes['size'];

			return $model;
		}

		public function create_wpcrypto_grid_model($attributes) {

			$model = new WPCryptoGrid_VM();
			$this->prepare_list_grid_model($model,$attributes);
			$model->columns = $attributes['columns'];

			return $model;
		}

		public function create_wpcrypto_list_model($attributes) {

			$model = new WPCryptoList_VM();
			$this->prepare_list_grid_model($model,$attributes);
			return $model;

		}

		public function create_wpcrypto_text_model($attributes) {

			$model = new WPCryptoText_VM();

			$coin = isset($attributes['coin']) ? $attributes['coin'] : 'bitcoin';
			$type = isset($attributes['type']) ? $attributes['type'] : 'price';
			$show_icon = isset($attributes['icon']) ? $attributes['icon'] : false;
			$currency = isset($attributes['currency']) ? strtoupper($attributes['currency']) : 'USD';
			$currency_symbol = Currency_Service::currency_symbol($currency, $attributes['currency_as_html']);

			$coin_details = Coins_Service::get_coin($coin);

			if($coin_details === null) {
				$model->error = '[Error: coin data not imported]';
				return $model;
			}

			$text = $show_icon ? '<img style="width:1em;height:1em;display:inline-block;" src="'.Config_Manager::$url.'public/img/coins/'.$coin.'.svg" alt="'.$coin_details->name.'" /> ': '';

			switch($type) {
				case 'change_24h':
					$text .= Coins_Service::format_price($coin_details['change_24h'],2) .'%';
					break;
				case 'volume_24h':
					$text .= $currency_symbol . Coins_Service::format_price(Coins_Service::exchange($coin_details['volume_24h'],$currency));
					break;
				case 'marketcap':
					$text .= $currency_symbol . Coins_Service::format_price(Coins_Service::exchange($coin_details['marketcap'],$currency));
					break;
				default:
					$text .= $currency_symbol . Coins_Service::format_price(Coins_Service::exchange($coin_details['price'],$currency));
					break;
			}

			$model->text = $text;
			return $model;

		}

		private function prepare_list_grid_model(ListGrid_Base_VM &$model, $attributes) {

			$model->show_ranking = $attributes['show_ranking'];
			$currency = strtoupper($attributes['currency']);
			$sort = $attributes['orderby'];
			$type = $attributes['type'];
			$model->currency_symbol = Currency_Service::currency_symbol($currency,$attributes['currency_as_html']);

			$coinlist = $attributes['coins'];
			$coins_from_cache = Coins_Service::get_coins($coinlist === 'all' ? array() : explode(',',$coinlist));

			$coins = array();

			foreach($coins_from_cache as $c) {

				$coin = array(
					'ranking' => $c['rank'],
					'name' => $c['name'],
					'shorthand' => strtoupper($c['shorthand']),
					'icon' => Config_Manager::$url .'public/img/coins/'.$c['id'].'.svg',
					'change' => Coins_Service::format_price($c['change_24h'],2)
				);
				switch($type) {
					case 'price': $coin['price'] = Coins_Service::format_price(Coins_Service::exchange($c['price'],$currency));
						break;
					case 'marketcap': $coin['price'] = Coins_Service::format_price(Coins_Service::exchange($c['marketcap'], $currency));
						break;
					case 'volume': $coin['price'] = Coins_Service::format_price(Coins_Service::exchange($c['volume_24h'], $currency));
						break;
				}
				array_push($coins,$coin);
			}

			if($sort != 'list') {
				switch($sort){
					case 'ranking':
						$coins = Enumerable::from($coins)->orderBy('$x => $x["ranking"]')->toArray();
						break;
					case 'change':
						$coins = Enumerable::from($coins)->orderByDesc('$x => $x["change"]')->toArray();
						break;
					case 'price':
						$coins = Enumerable::from($coins)->orderByDesc('$x => $x["price"]')->toArray();
						break;
				}
			}

			$model->coins = $coins;
		}
	}
}
<?php

namespace MABEL_WPUC\Code\Controllers
{

	use MABEL_WPUC\Code\Services\Coins_Service;
	use MABEL_WPUC\Code\Services\Cron_Service;
	use MABEL_WPUC\Core\Common\Admin;
	use MABEL_WPUC\Core\Common\Managers\Config_Manager;
	use MABEL_WPUC\Core\Common\Managers\Options_Manager;
	use MABEL_WPUC\Core\Common\Managers\Settings_Manager;
	use MABEL_WPUC\Core\Models\Choicepicker_Option;
	use MABEL_WPUC\Core\Models\Custom_Option;
	use MABEL_WPUC\Core\Models\Dropdown_Option;

	if(!defined('ABSPATH')){die;}

	class Admin_Controller extends Admin
	{
		private $slug;

		public function __construct()
		{

			parent::__construct(new Options_Manager());
			$this->slug = Config_Manager::$slug;

			$this->add_ajax_function('mb-wpuc-get-coin-ids', $this,'get_crypto_ids',false,true);
			$this->add_ajax_function('mb-wpuc-import-coins', $this,'import_coins',false,true);
			$this->add_ajax_function('mb-wpuc-get-status', $this,'get_status',false,true);
			$this->add_ajax_function('mb-wpuc-reschedule-task', $this,'reschedule_task',false,true);
		}

		public function reschedule_task() {
			Cron_Service::create_task();
		}

		public function get_status() {
			$start = microtime(true);
			$coins = Coins_Service::get_coins();
			$currencies = Coins_Service::get_currencies();
			$fetch_time = round(microtime(true)-$start,5);
			$success = is_array($coins);
			$total_coins = is_array($coins) ? count($coins) : 0;
			$total_currencies = is_array($currencies) ? (count($currencies)+1) : 1;
			$last_fetch = get_option(Coins_Service::$transient_name.'_timestamp');
			$last_fetch = $last_fetch != false ? ((time()-intval($last_fetch))) : -1;
			if($last_fetch === -1)
				$last_fetch = 'No coins fetched yet.';
			else{
				$last_fetch = $last_fetch < 60 ? 'Less than a minute ago.' : floor($last_fetch/60).' minutes ago.';
			}
			wp_send_json_success(array(
				'success' => $success,
				'coins' => $total_coins,
				'last_fetch' => $last_fetch,
				'fetch_time' => $fetch_time,
				'currencies' => $total_currencies
			));
		}

		public function import_coins() {
			$coins = Coins_Service::import_coins();
			if(!$coins)
				wp_send_json_error();
			else wp_send_json_success(sizeof($coins));
		}

		public function get_crypto_ids() {
			$coins = Coins_Service::get_coin_ids();
			if(!$coins)
				wp_send_json_error();

			wp_send_json_success($coins);
		}

		public function init_admin_page() {
			$this->options_manager->add_section('settings', __('Settings',$this->slug), 'admin-settings', true);
			$this->options_manager->add_section('coins', __('Coins', $this->slug), 'image-filter');
			$this->options_manager->add_section('status', __('Status', $this->slug), 'performance');

			$currency_choice =  new Choicepicker_Option(
				'currencies',
				'Fetch these currencies',
				Settings_Manager::get_setting('currencies'),
				array('Choose more currencies:' => array(
					'EUR' => 'EUR',
					'GBP' => 'GBP',
					'JPY' => 'JPY',
					'CAD' => 'CAD',
					'AUD' => 'AUD'
				)),
				__('Denote whoch currencies you want to display prices in throughout your website.',$this->slug)
			);
			$currency_choice->always_selected_values = array('USD' => 'USD');
			$currency_choice->always_selected_title = 'Default currency';
			$this->options_manager->add_option('settings',$currency_choice);

			$this->options_manager->add_option('settings', new Dropdown_Option(
				'refresh',
				__('Cache results', $this->slug),
				array(
					10 => '10 minutes',
					15 => '15 minutes',
					30 => '30 minutes',
					60 => '1 hour',
					90 => '90 minutes',
				),
				Settings_Manager::get_setting('refresh'),
				__('How long should we cache coin information before fetching again from the remote API?', $this->slug)
			));

			$this->options_manager->add_option('settings', new Dropdown_Option(
				'format',
				'Price format',
				array('point' => 'Decimal point', 'comma' => 'Decimal comma'),
				Settings_Manager::get_setting('format'),
				__('Which format should be used while outputting prices?')
			));

			$this->options_manager->add_option('coins', new Custom_Option(null,'coins-settings',array(
				'selected_coins' => Settings_Manager::get_setting('coins')
			)));

			$this->options_manager->add_option('status', new Custom_Option('System status','system-status', array()));

		}

	}
}
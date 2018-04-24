<?php

namespace MABEL_WPUC
{

	use MABEL_WPUC\Code\Controllers\Public_Controller;
	use MABEL_WPUC\Code\Controllers\Shortcode_Controller;
	use MABEL_WPUC\Code\Services\Coins_Service;
	use MABEL_WPUC\Code\Services\Cron_Service;
	use MABEL_WPUC\Core\Common\Managers\Config_Manager;
	use MABEL_WPUC\Core\Common\Managers\Language_Manager;
	use MABEL_WPUC\Core\Common\Managers\Settings_Manager;
	use MABEL_WPUC\Code\Controllers\Admin_Controller;

	if(!defined('ABSPATH')){die;}

	class WP_Ultimate_Crypto
	{
		/**
		 * @var Language_Manager language manager.
		 */
		protected $language_manager;

		/**
		 * Business_Hours_Indicator constructor.
		 *
		 * @param $dir string
		 * @param $url string
		 * @param $slug string
		 * @param $version string
		 */
		public function __construct($dir, $url, $plugin_base, $name, $version, $settings_key)
		{
			// Init meta info.
			Config_Manager::init($dir, $url, $plugin_base, $version, $settings_key, $name);
		}

		public function run() {

			// Init translations.
			$this->language_manager = new Language_Manager();

			// Init settings with defaults.
			Settings_Manager::init(array(
				'refresh' => 15,
				'currencies' => 'USD',
				'format' => 'point'
			));

			// Kick off admin page.
			if(is_admin())
				new Admin_Controller();

			// Cron config
			add_filter('cron_schedules', array($this,'add_cron_schedules'));
			register_activation_hook(Config_Manager::$plugin_base,array($this,'on_activation'));
			register_deactivation_hook(Config_Manager::$plugin_base,array($this,'on_deactivation'));
			// Actual cron task
			add_action(Cron_Service::$task_name, array($this, 'import_coins'));

			// Kick off public side of things.
			new Public_Controller();

			new Shortcode_Controller();
		}

		public function import_coins() {
			Coins_Service::import_coins();
		}

		public function add_cron_schedules($schedules){
			return Cron_Service::add_custom_schedules($schedules);
		}

		public function on_activation(){
			Cron_Service::create_task();
		}

		public function on_deactivation(){
			Cron_Service::unschedule_task();
		}

	}
}
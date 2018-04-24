<?php

namespace MABEL_WPUC\Code\Services {

	use MABEL_WPUC\Core\Common\Managers\Settings_Manager;

	class Cron_Service {

		public static $task_name = "wpuc_cron_hook";

		public static function unschedule_task() {

			$timestamp = wp_next_scheduled( self::$task_name );
			if($timestamp != false)
				wp_unschedule_event( $timestamp, self::$task_name );
		}

		public static function create_task() {

			self::unschedule_task();
			$refresh_rate = Settings_Manager::get_setting('refresh');

			if ( ! wp_next_scheduled( self::$task_name ) )
				wp_schedule_event( time(), 'wpuc_'.$refresh_rate.'min', self::$task_name );

		}

		public static function add_custom_schedules($schedules){

			if(!isset($schedules["wpuc_5min"])){
				$schedules["wpuc_5min"] = array(
					'interval' => 5*60,
					'display' => __('Once every 5 minutes')
				);
			}

			if(!isset($schedules["wpuc_10min"])){
				$schedules["wpuc_10min"] = array(
					'interval' => 10*60,
					'display' => __('Once every 10 minutes')
				);
			}

			if(!isset($schedules["wpuc_15min"])){
				$schedules["wpuc_15min"] = array(
					'interval' => 15*60,
					'display' => __('Once every 15 minutes')
				);
			}

			if(!isset($schedules["wpuc_30min"])){
				$schedules["wpuc_30min"] = array(
					'interval' => 30*60,
					'display' => __('Once every 30 minutes')
				);
			}

			if(!isset($schedules["wpuc_60min"])){
				$schedules["wpuc_60min"] = array(
					'interval' => 60*60,
					'display' => __('Once every hour')
				);
			}

			if(!isset($schedules["wpuc_90min"])){
				$schedules["wpuc_90min"] = array(
					'interval' => 90*60,
					'display' => __('Once every 90 minutes')
				);
			}

			return $schedules;
		}
	}
}
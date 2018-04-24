<?php

namespace MABEL_WPUC\Code\Controllers
{

	use MABEL_WPUC\Code\Models\Wheel_Model;
	use MABEL_WPUC\Code\Models\Wheels_VM;
	use MABEL_WPUC\Core\Common\Frontend;
	use MABEL_WPUC\Core\Common\Html;
	use MABEL_WPUC\Core\Common\Managers\Config_Manager;
	use MABEL_WPUC\Core\Common\Managers\Settings_Manager;

	if(!defined('ABSPATH')){die;}

	class Public_Controller extends Frontend
	{
		public function __construct()
		{
			parent::__construct();

			$this->add_style(Config_Manager::$slug,'public/css/public.min.css');

		}
	}
}
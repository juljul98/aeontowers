<?php

namespace MABEL_WPUC\Code\Models
{

	class ListGrid_Base_VM
	{
		public $show_ranking;
		public $coins;
		public $currency_symbol;

		public function __construct() {
			$this->show_ranking = false;
			$this->coins = array();
		}
	}
}
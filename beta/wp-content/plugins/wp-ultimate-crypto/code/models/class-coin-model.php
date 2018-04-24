<?php

namespace MABEL_WPUC\Code\Models {

	class Coin_Model {

		public $id;
		public $name;
		public $shorthand;
		public $change_1h;
		public $change_24h;
		public $change_7d;

		public $currencies = array();

	}

	class Currency_Model{
		public $currency;
		public $value;
	}
}
<?php

namespace MABEL_WPUC\Code\Models
{

	class WPCryptoText_VM
	{
		public $text;
		public $error;

		public function has_error() {
			return strlen($this->error) > 0;
		}
	}
}
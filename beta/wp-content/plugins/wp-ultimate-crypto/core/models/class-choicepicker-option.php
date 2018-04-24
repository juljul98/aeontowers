<?php

namespace MABEL_WPUC\Core\Models
{

	use MABEL_WPUC\Core\Common\Linq\Enumerable;

	class Choicepicker_Option extends Option
	{

		/**
		 * @var array
		 */
		public $possible_values;
		public $always_selected_values;
		public $always_selected_title;

		public function __construct( $id, $title, $selected_values,$values, $extra_info = null, $dependency = null )
		{
			parent::__construct($id,$selected_values,$title,$extra_info,$dependency);
			$this->possible_values = $values;
			$this->always_selected_values = array();
			return $this;
		}

		public function values_to_key_list() {

			if(sizeof($this->always_selected_values) === 0)
				return $this->value;

			$preselected_keys = join(';', Enumerable::from($this->always_selected_values)->select('$v,$k => $k')->toArray());

			return empty($preselected) ? $this->value : join(';',array_merge($preselected,explode(';',$this->value)));

		}

	}

}
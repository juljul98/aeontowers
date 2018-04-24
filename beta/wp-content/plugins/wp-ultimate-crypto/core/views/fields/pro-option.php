<?php
/** @var \MABEL_WPUC\Core\Models\Pro_option $option */
?>

<div class="pro-option-teaser">
	<?php _e($option->value? $option->value : "This option is available in the premium version."); ?>
</div>

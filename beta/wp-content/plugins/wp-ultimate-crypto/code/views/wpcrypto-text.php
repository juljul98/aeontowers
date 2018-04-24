<?php
/** @var \MABEL_WPUC\Code\Models\WPCryptoText_VM $model */

if($model->has_error()) {
	echo $model->error;
} else{
	echo '<span class="wpuc-txt">'.$model->text.'</span>';
}

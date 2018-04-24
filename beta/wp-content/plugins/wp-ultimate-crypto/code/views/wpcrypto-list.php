<?php
/** @var \MABEL_WPUC\Code\Models\WPCryptoList_VM $model */
?>
<div class="wpuc-coin-list">
	<?php
	foreach($model->coins as $coin) {
		?>

			<div class="wpuc-coin-list-row">
				<?php if($model->show_ranking){ ?>
					<div class="wpuc-coin-list-ranking">
						<?php echo $coin['ranking']; ?>
					</div>
				<?php } ?>
				<div class="wpuc-coin-list-icon">
					<img src="<?php echo $coin['icon']; ?>" width="28" height="28" alt="<?php echo $coin['name'] ?>" />
				</div>
				<div class="wpuc-coin-list-name">
					<span><?php echo $coin['name']; ?></span>
				</div>
				<div class="wpuc-coin-list-price">
					<span class="wpuc-coin-list-currency"><?php echo $model->currency_symbol; ?></span><span class="wpuc-coin-list-amount"><?php echo $coin['price']; ?></span>
				</div>
				<div class="wpuc-coin-list-change">
					<span class="wpuc-coin-list-percentage wpuc-coin-list-<?php echo $coin['change'] > 0 ? 'up' : 'down'; ?>">
						<?php echo $coin['change']; ?>%
					</span>
				</div>
			</div>

		<?php
	}
?>
</div>
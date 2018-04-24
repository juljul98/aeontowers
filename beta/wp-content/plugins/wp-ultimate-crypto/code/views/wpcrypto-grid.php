<?php
/** @var \MABEL_WPUC\Code\Models\WPCryptoGrid_VM $model */
?>
<div class="wpuc-coin-grid">
	<?php foreach($model->coins as $coin) { ?>

		<div class="wpuc-coin-grid-item" style="width:<?php echo ((100/$model->columns)); ?>%;">
			<div class="wpuc-grid-item-inner">
				<div class="wpuc-grid-item-coin">
					<img src="<?php echo $coin['icon']; ?>" alt="<?php echo $coin['name'] ?>" />
				</div>
				<div class="wpuc-grid-item-details">
					<div class="wpuc-grid-item-name">
						<span><?php echo $coin['name']; ?></span>
					</div>
					<div class="wpuc-grid-item-price">
						<span class="wpuc-grid-item-currency"><?php echo $model->currency_symbol; ?></span><span class="wpuc-grid-item-amount"><?php echo $coin['price']; ?></span>
					</div>
					<div class="wpuc-grid-item-info">
						<span><?php echo $coin['shorthand']; ?></span>
						<span class="wpuc-grid-item-percentage wpuc-grid-item-<?php echo $coin['change'] > 0 ? 'up' : 'down'; ?>">
							<?php echo $coin['change']; ?>%
						</span>
					</div>
				</div>
			</div>
		</div>

	<?php } ?>
</div>

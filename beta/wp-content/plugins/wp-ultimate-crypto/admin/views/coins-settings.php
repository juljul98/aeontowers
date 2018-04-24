<div class="wpuc-info-bubble">
	<p>
		Select the coins you'd like to use within your website. Coins you select here will be kept up-to-date in your database so
		that retreiving information will be faster than calling the external API.
	</p>
	<p>
		Only coins selected here can be used in any of our shortcodes.
	</p>
</div>

<input type="hidden" name="mb-wpuc-settings[coins]" class="wpuc-selected-coins" value="<?php echo $data['selected_coins']; ?>" />

<div class="wpuc-coins-filter">
	<input class="coin-search" type="text" placeholder="search availabel coins..." />
</div>

<div class="wpuc-coins-list">
	Loading available coins ...
</div>
<?php
// Fired when the plugin is uninstalled.
// If uninstall not called from WordPress, then exit.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

delete_option('mb-wpuc-settings');
delete_option('wpuc_coins');
delete_option('wpuc_currencies');
delete_transient('wpuc_coins');
delete_transient('wpuc_currencies');
delete_transient('wpuc_coins_timestamp');
delete_transient('wpuc_coin_ids');
?>
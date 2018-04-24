<?php
/*
 * Plugin Name: WP Ultimate Crypto
 * Plugin URI: https://studiowombat.com/plugin/ultimate-crypto/
 * Description: A collection of cryptocurrency shortcodes & widgets such as live pricing, converters, etc..
 * Version: 1.0.1
 * Author: StudioWombat
 * Author URI: https://studiowombat.com/
 * Text Domain: wp-ultimate-crypto
*/

if(!defined('ABSPATH')){die;}

/**
 * Auto loader for Plugin classes
 *
 * @param string $class_name Name of the class that shall be loaded
 */
function MABEL_WPUC_auto_loader ($class_name) {
	// Not loading a class from our plugin.
	if ( !is_int(strpos( $class_name, 'MABEL_WPUC')) )
		return;
	// Remove root namespace as we don't have that as a folder.
	$class_name = str_replace('MABEL_WPUC\\','',$class_name);
	$class_name = str_replace('\\','/',strtolower($class_name)) .'.php';
	// Get only the file name.
	$pos =  strrpos($class_name, '/');
	$file_name = is_int($pos) ? substr($class_name, $pos + 1) : $class_name;
	// Get only the path.
	$path = str_replace($file_name,'',$class_name);
	// Append 'class-' to the file name and replace _ with -
	$new_file_name = 'class-'.str_replace('_','-',$file_name);
	// Construct file path.
	$file_path = plugin_dir_path(__FILE__)  . str_replace('\\', DIRECTORY_SEPARATOR, $path . strtolower($new_file_name));

	if (file_exists($file_path))
		require_once($file_path);
}

spl_autoload_register('MABEL_WPUC_auto_loader');

function run_MABEL_WPUC()
{
	$plugin = new \MABEL_WPUC\WP_Ultimate_Crypto(
		plugin_dir_path( __FILE__ ),
		plugin_dir_url( __FILE__ ),
		plugin_basename( __FILE__ ),
		'Ultimate Crypto',
		'1.0.1',
		'mb-wpuc-settings'
	);
	$plugin->run();
}

run_MABEL_WPUC();
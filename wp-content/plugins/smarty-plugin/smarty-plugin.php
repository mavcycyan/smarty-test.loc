<?php
/*
 * Plugin Name:       Smarty Plugin
 * Plugin URI:        https://example.com/plugins/the-basics/
 * Description:       Handle the basics with this plugin.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      8.0
 * Author:            John Smith
 * Author URI:        https://author.example.com/
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Update URI:        https://example.com/my-plugin/
 * Text Domain:       smarty-plugin
 * Domain Path:       /languages
 */


include_once plugin_dir_path( __FILE__ ) . 'inc/custom-post-types.php';
include_once plugin_dir_path( __FILE__ ) . 'inc/custom-taxonomies.php';
include_once plugin_dir_path( __FILE__ ) . 'inc/acf-fields.php';
include_once plugin_dir_path( __FILE__ ) . 'inc/shortcodes.php';
include_once plugin_dir_path( __FILE__ ) . 'inc/ajax.php';
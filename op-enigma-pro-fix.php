<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * Dashboard. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              http://www.optimizepress.com/
 * @since             1.0.0
 * @package           Op_EnigmePro_Fix
 *
 * @wordpress-plugin
 * Plugin Name:       OptimizePress EnigmaPro theme fix
 * Plugin URI:        http://www.optimizepress.com/
 * Description:       Removes weblizar_scripts and weblizar_footer_js actions from LiveEditor pages
 * Version:           1.0.0
 * Author:            OptimizePress
 * Author URI:        http://www.optimizepress.com/
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       op-enigmapro-fix
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

function op_remove_enigmapro_js() {
    $checkIfLEPage = get_post_meta( url_to_postid( "http://".$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI'] ), '_optimizepress_pagebuilder', true );

    if ($checkIfLEPage || $_GET['page'] == 'optimizepress-page-builder' || defined('OP_LIVEEDITOR')){
        remove_action('wp_enqueue_scripts', 'weblizar_scripts',10);
        remove_action('wp_footer', 'weblizar_footer_js', 10);
    }
}

add_action('init', 'op_remove_enigmapro_js');
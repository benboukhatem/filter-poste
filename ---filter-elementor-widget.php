<?php

/**
 * Plugin Name: liste poste
 * Description: table widht filter .
 * Plugin URI:  https://elementor.com/
 * Version:     1.0.0
 * Author:      liste tab
 * Author URI:  https://developers.elementor.com/
 * Text Domain: elementor-liste-poste
 *
 * Elementor tested up to: 3.5.0
 * Elementor Pro tested up to: 3.5.0
 */
 
 if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Register filter Widget.
 *
 * Include widget file and register widget class.
 *
 * @since 1.0.0
 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
 * @return void
 */
function register_filter_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/filter-widget.php' );

	$widgets_manager->register( new \Elementor_filter_Widget() );

}
add_action( 'elementor/widgets/register', 'register_filter_widget' );
<?php

/**
 * Plugin Name: shared btn
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
 
 add_theme_support('post-thumbnails');
add_post_type_support( 'proctor-postTab', 'thumbnail' );  
 function wporg_custom_post_type() { 
		register_post_type('proctor-postTab',
			array(
				'labels'      => array(
					'name'          => __( 'poste tab', 'textdomain' ),
					'singular_name' => __( 'poste_tab', 'textdomain' ),
				),
				 'public'      => true,
					'has_archive' => true,
					'hierarchical' => true,
					'show_ui' => true,
					'show_in_menu' => true,
					'post_type' => "post",
					'show_in_nav_menus' => true,
					'publicly_queryable' => true,
					'exclude_from_search' => false,
					'map_meta_cap' => true,
					'query_var' => true,
					'can_export' => true,
					'rewrite' => true,
					'menu_position' => 8,
					'menu_icon'   => plugin_dir_url(__FILE__) . 'images/icon.png',
					'capability_type' => 'post',
					
					'supports' => array( 'title',  'editor' , 'author', 'thumbnail' , 'page-attributes')
				
			)
		);
	
	}
	add_action('init', 'wporg_custom_post_type');
	
//color--------------------------------------------





//----------------------------------------------------	
	
function register_filter_widget( $widgets_manager ) {

	require_once( __DIR__ . '/widgets/filter-widget.php' );

	$widgets_manager->register( new \Elementor_filter_Widget() );

}
add_action( 'elementor/widgets/register', 'register_filter_widget' );
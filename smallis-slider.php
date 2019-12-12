<?php
/*
 * Plugin Name:       Smallis Slider
 * Plugin URI:        https://github.com/venqka/Smallis-Slider
 * Description:       This plugin adds a slider to the Smallis Front page.
 * Version:           1.0.0
 * Author:            venqka
 * Author URI:        vensio.eu
 * Plugin Type: Piklist
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       smallis
 * Domain Path:       /languages
 */

function smallis_slider_enqueue() {

	if( is_front_page() ) {
		//enqueue slider styles
		wp_enqueue_style( 'smallis-slider-styles', plugin_dir_url( __FILE__ ) . 'style.css', array(), '1.0', false );

		//enqueue slick styles
		wp_enqueue_style( 'slick-styles', plugin_dir_url( __FILE__ ) . 'assets/lib/slick/slick.css', array(), '1.8.1', false );

		//Enqueue slider scripts
		wp_register_script( 'smallis-slider-scripts', plugin_dir_url( __FILE__ ) . 'scripts.js', array('jquery'), '1.0', false );

		wp_enqueue_script( 'smallis-slider-scripts', plugin_dir_url( __FILE__ ) . 'scripts.js', array('jquery'), '1.0', false );

		//Enqueue slick scripts
		wp_register_script( 'slick-scripts', plugin_dir_url( __FILE__ ) . 'assets/lib/slick/slick.js', array('jquery'), '1.8.1', false );

		wp_enqueue_script( 'slick-scripts', plugin_dir_url( __FILE__ ) . 'assets/lib/slick/slick.js', array('jquery'), '1.8.10', false );
	}

}
add_action( 'wp_enqueue_scripts', 'smallis_slider_enqueue' );

include( 'slider-post-type.php' );
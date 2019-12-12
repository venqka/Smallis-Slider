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
		wp_enqueue_style( 'slick-styles', plugin_dir_url( __FILE__ ) . 'assets/lib/slick/slick.css', array(), '', false );

		//enqueue slick styles
		wp_enqueue_style( 'slick-theme-styles', plugin_dir_url( __FILE__ ) . 'assets/lib/slick/slick-theme.css', array(), '', false );

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

function smallis_slider() {

	$slides_args = array(
		'post_type'			=>	'smallis-slider',
		'posts_per_page'	=>	-1,
	);
	$slider = NEW WP_Query( $slides_args );

	if( $slider->have_posts() ) {
		ob_start();
?>
			<div class="smallis-container">
				<div class="smallis-slider-container smallis-slider">
<?php			
					while( $slider->have_posts() ) {
						$slider->the_post();
?>
						<div class="smallis-slide" style="background-image: url(<?php echo the_post_thumbnail_url(); ?>)">
							<div class="smallis-slider-overlay">
								<div class="smallis-slide-title">
									<?php echo the_title( '<h3>', '</h3>' ); ?>
								</div>
								<div class="smallis-slide-content">
									<?php echo the_content(); ?>
								</div>
								<div class="smallis-slide-button-container">
<?php
									$smallis_slide_button_url = get_post_meta( get_the_ID(), 'slide-url', true );
									$smallis_slide_button_text = get_post_meta( get_the_ID(), 'button-text', true );

									if( !empty( $smallis_slide_button_url ) ) {
?>
										<a href="<?php echo $smallis_slide_button_url; ?>" rel="noopener noreferer" target="blank"><span class="smallis-slide-button"><?php echo $smallis_slide_button_text; ?></span></a>
<?php										
									}
?>
								</div>	
							</div>	
						</div>	
<?php
					}	
?>
				</div><!--smallis-slider-container -->	
			</div>	
<?php
		$smallis_slider = ob_get_clean();
		echo $smallis_slider;
	}	
}
add_action( 'smallis_home_before_content', 'smallis_slider' );
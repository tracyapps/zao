<?php
/**
 * Enqueue scripts and styles.
 */
function zaobank_scripts() {
	wp_enqueue_style('zaobank-styles', get_template_directory_uri() . '/_assets/css/styles.css', array(), ZAOBANK_VERSION );

	wp_enqueue_script('jquery', '//ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js', array(), null, true );
	wp_enqueue_script('jquery-ui', '//code.jquery.com/ui/1.13.3/jquery-ui.min.js', array(), null, true );
	wp_enqueue_script('zaobank-scripts', get_template_directory_uri() . '/_assets/js/scripts.js', array( 'jquery' ), ZAOBANK_VERSION, true );
	//wp_enqueue_script('font-awesome-kit', '//kit.fontawesome.com/dc8c838d72.js', array(), null, true );
	//wp_enqueue_script('a11y-slider', '//cdn.jsdelivr.net/npm/@splidejs/splide@4.1.4/dist/js/splide.min.js', array(), null, true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'zaobank_scripts' );
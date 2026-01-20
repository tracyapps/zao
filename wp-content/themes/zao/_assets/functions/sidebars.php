<?php

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function zaobank_widgets_init() {
	register_sidebar(
		array(
			'name'          => __( 'Footer', 'zaobank' ),
			'id'            => 'footer-main',
			'description'   => __( 'Add widgets here to appear in your footer.', 'zaobank' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);


}
add_action( 'widgets_init', 'zaobank_widgets_init' );

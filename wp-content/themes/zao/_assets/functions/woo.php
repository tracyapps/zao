<?php
/**
 *
 * functions for modifying woo functionality
 *
 */

 add_filter( 'woocommerce_single_product_image_thumbnail_html', 'zaobank_remove_product_link' );

 function zaobank_remove_product_link( $html ) {
   return strip_tags( $html, '<div><img>' );
 }
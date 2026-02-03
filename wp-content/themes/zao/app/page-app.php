<?php
/**
 * Template Name: ZAO Bank - App Page
 * Template Post Type: page
 *
 * Generic app page template that uses the app header/footer.
 * Use this for any app page - the shortcode in the page content
 * will be rendered with the app layout.
 *
 * @package zaobank
 */

if (!defined('ABSPATH')) {
	exit;
}

get_header('app');

while (have_posts()) :
	the_post();
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('zaobank-app-article'); ?>>
	<?php the_content(); ?>
</article>

<?php
endwhile;

get_footer('app');

<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package zaobank
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site_footer">
		<?php
		$footerNavProps = array(
			'theme_location' => 'footer-nav',
			'container' => false,
			'depth'		=> 1,
		);
		?>
		<nav class="footer_nav">
			<?php wp_nav_menu($footerNavProps); ?>
		</nav>
		<section class="footer_info">

			<div class="footer_text">
				<?php echo zaobank_options_footer_text(); ?>
			</div>
			<div class="footer_links">
				<?php zaobank_social_links( 'icon-', '', 'social-links', 'footer-social-links', true ); ?>
			</div>

		</section>


		<div class="copyright_container">
			<?php zaobank_copyright_text(); ?>
		</div>
	</footer>
</div><!-- #page -->
<?php wp_footer(); ?>

<div class="hidden svg-decoration-inject hide-this" aria-hidden="true">
	<?php include '_assets/svg/output/icons.svg'; ?>
</div>

</body>
</html>

<?php
/**
 * App Footer
 *
 * Minimal footer for the /app/ section.
 * Includes bottom navigation for mobile.
 *
 * @package zaobank
 */
?>
	</main><!-- #content -->

	<?php
	// Include bottom navigation (from theme override or plugin)
	if (function_exists('zaobank_bottom_nav')) {
		zaobank_bottom_nav();
	}
	?>

</div><!-- #page -->

<?php wp_footer(); ?>

<div class="hidden svg-decoration-inject hide-this" aria-hidden="true">
	<?php include '_assets/svg/output/icons.svg'; ?>
</div>

</body>
</html>

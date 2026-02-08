<?php
/**
 * Ignite The Spirit functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package zaobank
 */

if ( ! defined( 'ZAOBANK_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( 'ZAOBANK_VERSION', '0.1.5' );
}

if ( ! function_exists( 'zaobank_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function zaobank_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on It Gets Better, use a find and replace
		 * to change 'zaobank' to the name of your theme in all the template files.
		 */
	//	load_theme_textdomain( 'zaobank', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		add_image_size( 'featured-thumbnail', 225, 170 );

		register_nav_menus(
			array(
				'utility-nav' => __( 'Utility Navigation', 'zaobank'),
				'main-nav'		=> __( 'Main Nav', 'zaobank' ),
				'footer-nav' => __( 'Footer Menu', 'zaobank' )
			)
		);

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
			)
		);

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for responsive embedded content.
		add_theme_support( 'responsive-embeds' );

		// Remove support for block templates.
		remove_theme_support( 'block-templates' );

		show_admin_bar(false);

		// Adds support for Woo Support
		add_theme_support( 'woocommerce' );
	}
endif;
add_action( 'after_setup_theme', 'zaobank_setup' );


add_action( 'admin_init', 'zaobank_add_editor_styles' );
function zaobank_add_editor_styles() {
	add_theme_support( 'editor-styles' );
	add_editor_style( trailingslashit( get_template_directory_uri() ) . '_assets/css/editor-styles.css' );
}

add_action('wp_body_open', 'zaobank_add_dark_mode_checker', 5);

function zaobank_add_dark_mode_checker() { ?>
<script>
	(function() {
		// check the user's default dark mode / light mode settings,
		// but ONLY if the local storage "darkMode" is NOT already set
		if( localStorage.getItem("darkMode") === null ) {
			let mediaQueryObj = window.matchMedia('(prefers-color-scheme: dark)');
			let isDarkMode = mediaQueryObj.matches;

			if ( isDarkMode ) {
				localStorage.setItem("darkMode", "true");
			}
		}
	})();
	(function() {
		const darkMode = localStorage.darkMode === 'true';

		if (darkMode) {
			document.querySelector('body').classList.remove('theme-light');
			document.querySelector('body').classList.add('theme-dark');


			// activate the toggle
			document.addEventListener('DOMContentLoaded', () => {
				const $toggles = document.querySelectorAll('.dark-toggle input[type="checkbox"]');
				$toggles.forEach(($t) => {
					$t.checked = true;
				});
			});
		}
	})();

</script>
<?php }


/**
 * Sidebars/widgets.
 */
//require get_template_directory() . '/_assets/functions/sidebars.php';
/**
 * Enqueue (scripts/styles)
 */
require get_template_directory() . '/_assets/functions/enqueue.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/_assets/functions/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/_assets/functions/template-functions.php';

/**
 * Functions which relate to theme related enhancements.
 */
require get_template_directory() . '/_assets/functions/theme-helpers.php';

/**
 * Site options page and functions
 */
require get_template_directory() . '/_assets/functions/site-options.php';

/**
 * Functions for natigation
 */
require get_template_directory() . '/_assets/functions/nav.php';

/**
 * Functions for customizer
 */
require get_template_directory() . '/_assets/functions/customizer.php';

//require get_template_directory() . '/_assets/functions/wordpress-custom-navwalker.php';


/**
 * Functions for acf blocks
 */
require get_template_directory() . '/_assets/functions/acf.php';

/**
 * Imported ACF fields
 */
require get_template_directory() . '/_assets/functions/acf-import.php';

/**
 * Functions for Woo
 */
// require get_template_directory() . '/_assets/functions/woo.php';

/**
 * Functions for modifying core blocks
 */
require get_template_directory() . '/_assets/functions/block-mods.php';

/**
 * Debug tools
 */

if (WP_DEBUG) {
	require get_template_directory() . '/_assets/functions/tad-debug-tools.php';
}

/**
 * =============================================================================
 * ZAO BANK APP INTEGRATION
 * =============================================================================
 */

/**
 * Configure ZAOBank page slugs for /app/ structure.
 *
 * All timebank pages are children of the /app/ parent page.
 * This enables AAM to protect the entire section with a wildcard.
 */
add_filter('zaobank_page_slugs', function ($slugs) {
	return array(
		'dashboard'     => 'app/dashboard',
		'jobs'          => 'app/jobs',
		'job_form'      => 'app/new-job',
		'my_jobs'       => 'app/my-jobs',
		'community'     => 'app/community',
		'profile'       => 'app/profile',
		'profile_edit'  => 'app/profile-edit',
		'messages'      => 'app/messages',
		'more'          => 'app/more',
		'exchanges'     => 'app/exchanges',
		'appreciations' => 'app/appreciations',
		'moderation'    => 'app/moderation',
	);
});

/**
 * Add body classes for app section.
 */
add_filter('body_class', function ($classes) {
	if (function_exists('zaobank_is_app_section') && zaobank_is_app_section()) {
		$classes[] = 'zaobank-app-page';

		// Add specific template class
		if (function_exists('zaobank_current_template')) {
			$template = zaobank_current_template();
			if ($template) {
				$classes[] = 'zaobank-template-' . $template;
			}
		}
	}
	return $classes;
});

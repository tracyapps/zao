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
	<?php
	$content = get_the_content();
	$rendered = false;
	$template = function_exists('zaobank_current_template') ? zaobank_current_template() : false;

	if ($template) {
		the_content();
		$rendered = true;
	} elseif (function_exists('zaobank_render_template')) {
		$slugs = apply_filters('zaobank_page_slugs', array(
			'dashboard'     => 'timebank-dashboard',
			'jobs'          => 'timebank-jobs',
			'job_form'      => 'timebank-new-job',
			'my_jobs'       => 'timebank-my-jobs',
			'community'     => 'timebank-community',
			'profile'       => 'timebank-profile',
			'profile_edit'  => 'timebank-profile-edit',
			'messages'      => 'timebank-messages',
			'more'          => 'timebank-more',
			'exchanges'     => 'timebank-exchanges',
			'appreciations' => 'timebank-appreciations',
		));

		$template_map = array(
			'dashboard'     => 'dashboard',
			'jobs'          => 'jobs-list',
			'job_form'      => 'job-form',
			'my_jobs'       => 'my-jobs',
			'community'     => 'community',
			'profile'       => 'profile',
			'profile_edit'  => 'profile-edit',
			'messages'      => 'messages',
			'more'          => 'more',
			'exchanges'     => 'exchanges',
			'appreciations' => 'appreciations',
		);

		$current_path = trim(get_page_uri(get_the_ID()), '/');
		foreach ($slugs as $key => $slug) {
			if ($current_path === trim($slug, '/') && isset($template_map[$key])) {
				zaobank_render_template($template_map[$key]);
				$rendered = true;
				break;
			}
		}
	}

	if (!$rendered) {
		the_content();
	}
	?>
</article>

<?php
endwhile;

get_footer('app');

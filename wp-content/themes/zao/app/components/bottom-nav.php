<?php
/**
 * Bottom Navigation Component
 *
 * Fixed bottom navigation for mobile/tablet devices.
 * Hidden on desktop (1024px+).
 */

if (!defined('ABSPATH')) {
	exit;
}

$urls = ZAOBank_Shortcodes::get_page_urls();
$community_url = isset($urls['community']) ? $urls['community'] : (isset($urls['messages']) ? $urls['messages'] : '#');
$more_url = isset($urls['more']) ? $urls['more'] : (isset($urls['messages']) ? $urls['messages'] : '#');
$unread_count = ZAOBank_Shortcodes::get_unread_message_count();
$current_url = trailingslashit(get_permalink());

// Determine active state
$active = '';
foreach ($urls as $key => $url) {
	if (trailingslashit($url) === $current_url) {
		$active = $key;
		break;
	}
}

// Map subpages to their parent nav item.
$active_map = array(
	'my_jobs'       => 'jobs',
	'exchanges'     => 'jobs',
	'appreciations' => 'jobs',
	'messages'      => 'more',
	'profile_edit'  => 'more',
	'profile'       => 'more',
);
if (isset($active_map[$active])) {
	$active = $active_map[$active];
}
?>

<nav class="zaobank-bottom-nav" role="navigation" aria-label="<?php esc_attr_e('Main navigation', 'zaobank'); ?>">
	<div id="footer-vector-background">
			<svg id="footer-vector" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
				 viewBox="0 0 1323.6 79.32"

				 preserveAspectRatio="none"
			>
				<defs>
					<linearGradient id="header-linear-gradient-1" x1="0" y1="37.5" x2="1323.6" y2="37.5" gradientUnits="userSpaceOnUse">
						<stop offset="0" stop-color="var(--gradient-1-color-1)"/>
						<stop offset=".8" stop-color="var(--gradient-1-color-2)"/>
						<stop offset="1" stop-color="var(--gradient-1-color-3)"/>
					</linearGradient>
					<linearGradient id="header-linear-gradient-2" x1="0" y1="1117.2" x2="1500" y2="1020.7" gradientUnits="userSpaceOnUse">
						<stop offset="0" stop-color="var(--gradient-2-color-1)"/>
						<stop offset=".2" stop-color="var(--gradient-2-color-2)"/>
						<stop offset=".5" stop-color="var(--gradient-2-color-3)"/>
						<stop offset=".8" stop-color="var(--gradient-2-color-4)"/>
					</linearGradient>
					<linearGradient id="header-linear-gradient-3" x1="855" y1="350.1" x2="489.7" y2="-282.6" gradientUnits="userSpaceOnUse">
						<stop offset="0" stop-color="var(--gradient-3-color-1)"/>
						<stop offset=".2" stop-color="var(--gradient-3-color-2)"/>
						<stop offset=".4" stop-color="var(--gradient-3-color-3)"/>
						<stop offset=".6" stop-color="var(--gradient-3-color-4)"/>
						<stop offset=".8" stop-color="var(--gradient-3-color-5)"/>
						<stop offset="1" stop-color="var(--gradient-3-color-6)"/>
					</linearGradient>
				</defs>
				<polygon fill="var(--vector-shadow)" points="0 42.9 51.2 52.2 74.6 75.7 129.9 66.8 173.2 74.9 264.4 58.4 363.3 62.9 379.3 53.6 414.8 59.7 458.3 57.4 513.1 64.6 597.9 54 722.5 69.3 766.1 64.4 974.9 58.2 1024.8 67.3 1138.9 54.2 1323.6 79.3 1323.6 0 0 0 0 42.9" transform="translate(0 3)" opacity=".79"/>
				<path id="header-vector-1" d="M0-.03v42.89l173.16,32,160.49-29.19,81.11,13.89,163.74-7.99,143.57,17.75,191.07-22.33,111.59,20.25,298.89-34.81v-13.71l-591.43-2.82L515.39-.19,0-.03Z" fill="url(#header-linear-gradient-2)" opacity=".75"/>
				<path id="header-vector-3" d="M0-.03v30.48l41.08,11.35,33.51,33.88,126.88-20.51,161.79,7.68,24.99-14.83,124.63,16.45,178.44-22.3,75.37,22.46,366.98-11.47,189.93,26.16V0L0-.03Z" fill="url(#header-linear-gradient-3)" opacity=".51"/>
				<path id="header-vector-2" d="M1323.6,18.02v38.4l-21.31-6.71-169.43,3.46-112.51-9.28-104.44,2.8-283.5,6.84-244.77-8.89-142.89,2.72L0,42.87V13.29l1323.6,4.73Z" fill="url(#header-linear-gradient-2)" opacity=".45"/></svg>
		</div>
	<a href="<?php echo esc_url($urls['dashboard']); ?>"
	   class="zaobank-nav-item <?php echo $active === 'dashboard' ? 'active' : ''; ?>"
	   aria-label="<?php esc_attr_e('Dashboard', 'zaobank'); ?>">
		<svg class="zaobank-nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
			<path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/>
			<polyline points="9 22 9 12 15 12 15 22"/>
		</svg>
		<span class="zaobank-nav-label"><?php _e('Home', 'zaobank'); ?></span>
	</a>

	<a href="<?php echo esc_url($urls['jobs']); ?>"
	   class="zaobank-nav-item <?php echo $active === 'jobs' ? 'active' : ''; ?>"
	   aria-label="<?php esc_attr_e('Browse Jobs', 'zaobank'); ?>">
		<svg class="zaobank-nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
			<rect x="2" y="7" width="20" height="14" rx="2" ry="2"/>
			<path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/>
		</svg>
		<span class="zaobank-nav-label"><?php _e('Jobs', 'zaobank'); ?></span>
	</a>

	<a href="<?php echo esc_url($urls['job_form']); ?>"
	   class="zaobank-nav-item zaobank-nav-item-primary <?php echo $active === 'job_form' ? 'active' : ''; ?>"
	   aria-label="<?php esc_attr_e('Create New Job', 'zaobank'); ?>">
		<svg class="zaobank-nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
			<line x1="12" y1="5" x2="12" y2="19"/>
			<line x1="5" y1="12" x2="19" y2="12"/>
		</svg>
		<span class="zaobank-nav-label"><?php _e('New', 'zaobank'); ?></span>
	</a>

	<a href="<?php echo esc_url($community_url); ?>"
	   class="zaobank-nav-item <?php echo $active === 'community' ? 'active' : ''; ?>"
	   aria-label="<?php esc_attr_e('Community', 'zaobank'); ?>">
		<svg class="zaobank-nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
			<path d="M16 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/>
			<circle cx="8.5" cy="7" r="4"/>
			<path d="M23 21v-2a4 4 0 0 0-3-3.87"/>
			<path d="M16 3.13a4 4 0 0 1 0 7.75"/>
		</svg>
		<span class="zaobank-nav-label"><?php _e('Community', 'zaobank'); ?></span>
	</a>

	<a href="<?php echo esc_url($more_url); ?>"
	   class="zaobank-nav-item <?php echo $active === 'more' ? 'active' : ''; ?>"
	   aria-label="<?php esc_attr_e('More', 'zaobank'); ?>">
		<svg class="zaobank-nav-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
			<circle cx="5" cy="12" r="2"/>
			<circle cx="12" cy="12" r="2"/>
			<circle cx="19" cy="12" r="2"/>
		</svg>
		<span class="zaobank-nav-label"><?php _e('More', 'zaobank'); ?></span>
	</a>
</nav>

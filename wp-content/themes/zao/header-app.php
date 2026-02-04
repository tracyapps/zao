<?php
/**
 * App Header
 *
 * Simplified header for the /app/ section.
 * Uses minimal navigation since bottom-nav handles primary navigation.
 *
 * @package zaobank
 */

$urls = zaobank_get_urls();
$user = wp_get_current_user();
$unread_count = zaobank_unread_count();
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="default">
	<link rel="profile" href="https://gmpg.org/xfn/11">
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">

	<?php wp_head(); ?>
</head>

<body <?php body_class('zaobank-app theme-light'); ?>>
<?php wp_body_open(); ?>

<div id="page" class="zaobank-app-container sticky-container">
	<a href="#content" class="sr-only"><?php esc_html_e('Skip to content', 'zaobank'); ?></a>

	<header class="zaobank-app-header">
		<div class="zaobank-app-header-inner">
			<!-- Logo / Back to dashboard -->
			<div id="zaobank_logo_app_header">
				<a href="<?php echo esc_url($urls['dashboard']); ?>">
					<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 190.58 70.54"><defs><linearGradient id="ZAOBANK-logo-linear-gradient-1" x1="166.17" y1="43.29" x2="62.56" y2="-16.53" gradientUnits="userSpaceOnUse"><stop offset=".03" stop-color="#c74597"/><stop offset=".23" stop-color="#78b9e0"/><stop offset=".47" stop-color="#1e9fb0"/><stop offset=".71" stop-color="#af45ff"/><stop offset="1" stop-color="#ffd52b"/></linearGradient><linearGradient id="ZAOBANK-logo-linear-gradient-2" x1="-4208.79" y1="206.61" x2="-4105.54" y2="266.22" gradientTransform="translate(-4080.61 293.31) rotate(-180)" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="#006fab"/><stop offset=".29" stop-color="#9fdf00"/><stop offset=".54" stop-color="#ffa51e"/><stop offset=".81" stop-color="#d13636"/><stop offset="1" stop-color="#5d47d6"/></linearGradient></defs>
						<g id="zaobank-logo-shadow" opacity=".25">
							<path d="M190.16,2.02l-71.3,1.82L59.46,1l-7.96,9.42h-8.91v5.98h3.86l-8.72,10.33,16.05-2.96-11.2,8.39v5.98h31.28v-5.98h-21.07l14.57-10.9,18.25-3.37h.79s-10.44,20.25-10.44,20.25h7.84l2.97-5.9h16.59l2.97,5.9h7.88l-10.32-19.95,9.42.16c-.63,1.72-.94,3.68-.94,5.9,0,9.23,5.23,14.29,17.42,14.29s17.42-5.11,17.42-14.29c0-1.98-.26-3.76-.77-5.35l8.23.14-1.48,25.12L190.16,2.02ZM43.82,23.2l5.74-6.8h14.06l-5.58,4.18-14.22,2.62ZM100.74,26.94h-11.28l4.48-8.91,2.37.04,4.43,8.87ZM95.11,15.7h0s0,0,0,0h0ZM140.12,24.25c0,5.66-2.89,8.32-10.29,8.32s-10.29-2.61-10.29-8.32c0-2.52.57-4.42,1.85-5.76l17.12.28c1.11,1.33,1.62,3.14,1.62,5.48ZM126.66,16.21c.95-.13,2-.2,3.17-.2,1.48,0,2.76.11,3.89.32l-7.06-.11ZM145.42,16.51c-2.46-4.22-7.49-6.48-15.6-6.48s-12.76,2.08-15.31,5.98l-11.82-.19-2.79-5.4h-9.62l-2.66,5.15-2.19-.04-13.81,2.54,2.25-1.68v-5.98h-19.27l5.91-7,58.31,2.79,65.98-1.68-28.81,32.87,1.21-20.69-11.79-.19Z" />
							<path d="M140.76,45.76l6.46-4.74h-7.65l-7.01,5.1-6.97.31v-5.4h-5.04v5.62l-1.61.07v-5.69h-5.04v5.92l-7.71.34-5.68-6.26h-6.84v6.81l-7.1.31-3.68-7.12h-6.81l-4,7.75-6.88.3c.55-.89.86-1.89.86-2.9,0-2.89-1.37-5.16-5.83-5.16h-17.26v9.03l-6.06.27-.19-21.95L0,70.54l80.55-4.91,50.36,4.27,8.62-9.94.71.67h6.98l-4.61-4.23,9.67-11.15-11.52.51ZM48.02,44.66h10.39c1.37,0,2.6,0,2.6,2.02s-1.23,2.04-2.58,2.04h-10.42v-4.06ZM129.09,48.64l-3.5,2.55v-2.39l3.5-.15ZM113.9,49.31v6.45l-5.63-6.2,5.63-.25ZM98.71,45.92l1.47,1.62-1.47.06v-1.68ZM79.5,44.75l1.81,3.62-3.72.16,1.91-3.79ZM83.47,52.7h-7.98l.88-1.74,6.1-.27,1.01,2.01ZM62.25,54.66c0,2.07-1.23,2.07-2.58,2.07h-11.65v-4.15h11.65c1.34,0,2.58,0,2.58,2.07ZM129.91,67.44l-49.33-4.17-75.07,4.57,28.91-33.2.16,18.16,8.41-.37v8.2h17.93c4.45,0,6.39-2.41,6.39-5.72,0-1.41-.43-2.58-1.15-3.51l4.69-.21-4.86,9.43h5.55l2.1-4.17h11.74l2.1,4.17h5.57l-5.26-10.17,5.9-.26v10.43h5.04v-10.65l3.54-.16,9.82,10.81h6.86v-11.54l1.61-.07v11.61h5.04v-3.75l6.02-4.4,6.19,5.85-7.89,9.11ZM135.34,49.73l1.98-1.45,9.56-.42-6.02,6.94-5.53-5.07Z" />
						</g>
						<g id="zaobank-logo">
							<path id="arrow-top" d="M153.64,43.15l1.48-25.12-69.06-1.14-47.9,8.84L59.88,0l59.39,2.85,71.3-1.82-36.94,42.13ZM85.86,14.54l71.77,1.16-1.21,20.69L185.23,3.53l-65.98,1.68-58.31-2.79-16.7,19.78,41.62-7.66Z" fill="url(#ZAOBANK-logo-linear-gradient-1)"/>
							<path id="arrow-bottom" d="M.42,69.54L37.15,27.37l.19,21.95,115.36-5.07-21.37,24.65-50.36-4.27L.42,69.54ZM34.83,33.64L5.92,66.83l75.07-4.57,49.33,4.17,16.97-19.58-112.31,4.94-.16-18.16Z" fill="url(#ZAOBANK-logo-linear-gradient-2)"/>
							<path id="zaobank-background" d="M73.88,38.12h-31.28v-5.98l21.03-15.76h-21.03v-5.98h31.28v5.98l-21.07,15.76h21.07v5.98ZM83.83,38.12h-7.84l14.29-27.72h9.62l14.33,27.72h-7.88l-2.97-5.9h-16.59l-2.97,5.9ZM89.46,26.92h11.28l-5.62-11.25-5.66,11.25ZM112.41,24.23c0-9.19,5.23-14.22,17.42-14.22s17.42,5.07,17.42,14.22-5.27,14.29-17.42,14.29-17.42-5.07-17.42-14.29ZM119.53,24.23c0,5.7,2.89,8.32,10.29,8.32s10.29-2.65,10.29-8.32-2.85-8.24-10.29-8.24-10.29,2.57-10.29,8.24ZM67.3,54.9c0,3.31-1.93,5.72-6.39,5.72h-17.93v-19.61h17.26c4.45,0,5.83,2.27,5.83,5.16,0,1.37-.56,2.72-1.54,3.81,1.68,1.04,2.77,2.66,2.77,4.93ZM48.02,48.71h10.42c1.34,0,2.58,0,2.58-2.04s-1.23-2.02-2.6-2.02h-10.39v4.06ZM62.26,54.64c0-2.07-1.23-2.07-2.58-2.07h-11.65v4.15h11.65c1.34,0,2.58,0,2.58-2.07ZM82.89,41l10.14,19.61h-5.57l-2.1-4.17h-11.74l-2.1,4.17h-5.55l10.11-19.61h6.81ZM83.48,52.68l-3.98-7.96-4.01,7.96h7.98ZM113.9,55.74l-13.39-14.74h-6.84v19.61h5.04v-14.71l13.36,14.71h6.86v-19.61h-5.04v14.74ZM139.57,41l-13.98,10.17v-10.17h-5.04v19.61h5.04v-3.75l6.02-4.4,8.63,8.15h6.98l-11.88-10.9,11.88-8.71h-7.65Z"/>
							<path id="zaobank-foreground" d="M74.29,37.14h-31.28v-5.98l21.03-15.76h-21.03v-5.98h31.28v5.98l-21.07,15.76h21.07v5.98ZM84.25,37.14h-7.84l14.29-27.72h9.62l14.33,27.72h-7.88l-2.97-5.9h-16.59l-2.97,5.9ZM89.87,25.94h11.28l-5.62-11.25-5.66,11.25ZM112.82,23.25c0-9.19,5.23-14.22,17.42-14.22s17.42,5.07,17.42,14.22-5.27,14.29-17.42,14.29-17.42-5.07-17.42-14.29ZM119.95,23.25c0,5.7,2.89,8.32,10.29,8.32s10.29-2.65,10.29-8.32-2.85-8.24-10.29-8.24-10.29,2.57-10.29,8.24ZM67.71,53.92c0,3.31-1.93,5.72-6.39,5.72h-17.93v-19.61h17.26c4.45,0,5.83,2.27,5.83,5.16,0,1.37-.56,2.72-1.54,3.81,1.68,1.04,2.77,2.66,2.77,4.93ZM48.44,47.73h10.42c1.34,0,2.58,0,2.58-2.04s-1.23-2.02-2.6-2.02h-10.39v4.06ZM62.67,53.66c0-2.07-1.23-2.07-2.58-2.07h-11.65v4.15h11.65c1.34,0,2.58,0,2.58-2.07ZM83.31,40.02l10.14,19.61h-5.57l-2.1-4.17h-11.74l-2.1,4.17h-5.55l10.11-19.61h6.81ZM83.89,51.7l-3.98-7.96-4.01,7.96h7.98ZM114.31,54.76l-13.39-14.74h-6.84v19.61h5.04v-14.71l13.36,14.71h6.86v-19.61h-5.04v14.74ZM139.99,40.02l-13.98,10.17v-10.17h-5.04v19.61h5.04v-3.75l6.02-4.4,8.63,8.15h6.98l-11.88-10.9,11.88-8.71h-7.65Z" />
						</g>
					</svg>
				</a>
			</div>

			<!-- Right side actions -->
			<div class="zaobank-app-header-actions">
				<!-- Dark mode toggle -->
				<label class="darkmode_switch">
					<input class="switch__input" type="checkbox" role="switch">
					<svg class="switch__icon switch__icon--light" viewBox="0 0 12 12" width="12px" height="12px" aria-hidden="true">
						<g fill="none" stroke="#171717" stroke-width="1" stroke-linecap="round">
							<circle cx="6" cy="6" r="2" />
							<g stroke-dasharray="1.5 1.5">
								<polyline points="6 10,6 11.5" transform="rotate(0,6,6)" />
								<polyline points="6 10,6 11.5" transform="rotate(45,6,6)" />
								<polyline points="6 10,6 11.5" transform="rotate(90,6,6)" />
								<polyline points="6 10,6 11.5" transform="rotate(135,6,6)" />
								<polyline points="6 10,6 11.5" transform="rotate(180,6,6)" />
								<polyline points="6 10,6 11.5" transform="rotate(225,6,6)" />
								<polyline points="6 10,6 11.5" transform="rotate(270,6,6)" />
								<polyline points="6 10,6 11.5" transform="rotate(315,6,6)" />
							</g>
						</g>
					</svg>
					<svg class="switch__icon switch__icon--dark" viewBox="0 0 12 12" width="12px" height="12px" aria-hidden="true">
						<g fill="none" stroke="#ffffff" stroke-width="1" stroke-linejoin="round" transform="rotate(-45,6,6)">
							<path d="m9,10c-2.209,0-4-1.791-4-4s1.791-4,4-4c.304,0,.598.041.883.105-.995-.992-2.367-1.605-3.883-1.605C2.962.5.5,2.962.5,6s2.462,5.5,5.5,5.5c1.516,0,2.888-.613,3.883-1.605-.285.064-.578.105-.883.105Z"/>
						</g>
					</svg>
					<span class="switch__sr">Dark Mode</span>
				</label>

				<!-- Messages with badge -->
				<a href="<?php echo esc_url($urls['messages']); ?>" class="zaobank-header-icon-link" aria-label="<?php esc_attr_e('Messages', 'zaobank'); ?>">
					<svg viewBox="0 0 24 24" width="24" height="24" fill="none" stroke="currentColor" stroke-width="2">
						<path d="M21 15a2 2 0 0 1-2 2H7l-4 4V5a2 2 0 0 1 2-2h14a2 2 0 0 1 2 2z"/>
					</svg>
					<?php if ($unread_count > 0) : ?>
						<span class="zaobank-header-badge"><?php echo $unread_count > 99 ? '99+' : $unread_count; ?></span>
					<?php endif; ?>
				</a>

				<!-- User avatar / profile link -->
				<a href="<?php echo esc_url($urls['profile']); ?>" class="zaobank-header-avatar" aria-label="<?php esc_attr_e('Your profile', 'zaobank'); ?>">
					<?php echo get_avatar($user->ID, 32); ?>
				</a>
			</div>
		</div>
	</header>

	<main id="content" class="zaobank-app-main">

<?php
/**
 * Moderation Dashboard Template
 *
 * Users, Flags, and Settings management for moderators.
 *
 * @package zaobank
 */

if (!defined('ABSPATH')) {
	exit;
}

// Permission check
if (!function_exists('zaobank_has_mod_access') || !zaobank_has_mod_access()) {
	echo '<div class="zaobank-error">' . esc_html__('Access denied.', 'zaobank') . '</div>';
	return;
}

$urls = ZAOBank_Shortcodes::get_page_urls();
$current_view = isset($view) ? $view : (isset($_GET['view']) ? sanitize_key($_GET['view']) : 'users');
$moderation_url = isset($urls['moderation']) ? $urls['moderation'] : '';
$is_admin = current_user_can('manage_options');
?>

<div class="zaobank-container zaobank-moderation-page" data-component="moderation" data-view="<?php echo esc_attr($current_view); ?>">

	<header class="zaobank-page-header">
		<h1 class="zaobank-page-title"><?php _e('Moderation', 'zaobank'); ?></h1>
		<?php
		$tabs = array(
			array('label' => __('users', 'zaobank'), 'url' => $moderation_url, 'current' => ($current_view === 'users')),
			array('label' => __('flags', 'zaobank'), 'url' => $moderation_url . '?view=flags', 'current' => ($current_view === 'flags')),
			array('label' => __('settings', 'zaobank'), 'url' => $moderation_url . '?view=settings', 'current' => ($current_view === 'settings')),
		);
		include ZAOBANK_PLUGIN_DIR . 'public/templates/components/subpage-tabs.php';
		?>
	</header>

	<!-- Users Tab Panel -->
	<div class="zaobank-tab-panel <?php echo ($current_view === 'users') ? 'active' : ''; ?>" data-panel="users">
		<div class="zaobank-filter-bar">
			<div class="filter-row">
				<label class="moderation-search"><?php _e('Search', 'zaobank'); ?>
				<input type="search" class="zaobank-input" data-mod-filter="search"
					   placeholder="<?php esc_attr_e('Search users...', 'zaobank'); ?>"></label>

				<label class="moderation-role-filter"><?php _e('Role', 'zaobank'); ?>
				<select class="zaobank-select" data-mod-filter="role">
					<option value=""><?php _e('All roles', 'zaobank'); ?></option>
					<option value="member_limited"><?php _e('Limited (pending)', 'zaobank'); ?></option>
					<option value="member"><?php _e('Member (verified)', 'zaobank'); ?></option>
					<option value="leadership_team"><?php _e('Leadership', 'zaobank'); ?></option>
					<option value="administrator"><?php _e('Admin', 'zaobank'); ?></option>
				</select></label>
			</div>
		</div>

		<div class="zaobank-moderation-users-list" data-loading="true">
			<div class="zaobank-loading-state">
				<div class="zaobank-spinner"></div>
				<p><?php _e('Loading users...', 'zaobank'); ?></p>
			</div>
		</div>

		<div class="zaobank-mod-load-more" data-target="users" style="display: none;">
			<button type="button" class="zaobank-btn zaobank-btn-outline zaobank-btn-block" data-action="mod-load-more-users">
				<?php _e('Load More', 'zaobank'); ?>
			</button>
		</div>

		<div class="zaobank-empty-state" data-empty="mod-users" style="display: none;">
			<svg class="zaobank-empty-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
				<path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
				<circle cx="12" cy="7" r="4"/>
			</svg>
			<h3><?php _e('No users found', 'zaobank'); ?></h3>
			<p><?php _e('Try adjusting your search or filter.', 'zaobank'); ?></p>
		</div>
	</div>

	<!-- Flags Tab Panel -->
	<div class="zaobank-tab-panel <?php echo ($current_view === 'flags') ? 'active' : ''; ?>" data-panel="flags">
		<div class="zaobank-filter-bar">
			<div class="filter-row">
				<label class="moderation-status-filter"><?php _e('Status', 'zaobank'); ?>
				<select class="zaobank-select" data-mod-filter="flag-status">
					<option value="open"><?php _e('Open', 'zaobank'); ?></option>
					<option value="under_review"><?php _e('Under Review', 'zaobank'); ?></option>
					<option value="resolved"><?php _e('Resolved', 'zaobank'); ?></option>
				</select></label>

				<label class="moderation-type-filter"><?php _e('Type', 'zaobank'); ?>
				<select class="zaobank-select" data-mod-filter="flag-type">
					<option value=""><?php _e('All types', 'zaobank'); ?></option>
					<option value="job"><?php _e('Job', 'zaobank'); ?></option>
					<option value="message"><?php _e('Message', 'zaobank'); ?></option>
					<option value="user"><?php _e('User', 'zaobank'); ?></option>
					<option value="appreciation"><?php _e('Appreciation', 'zaobank'); ?></option>
				</select></label>
			</div>
		</div>

		<div class="zaobank-moderation-flags-list" data-loading="true">
			<div class="zaobank-loading-state">
				<div class="zaobank-spinner"></div>
				<p><?php _e('Loading flags...', 'zaobank'); ?></p>
			</div>
		</div>

		<div class="zaobank-mod-load-more" data-target="flags" style="display: none;">
			<button type="button" class="zaobank-btn zaobank-btn-outline zaobank-btn-block" data-action="mod-load-more-flags">
				<?php _e('Load More', 'zaobank'); ?>
			</button>
		</div>

		<div class="zaobank-empty-state" data-empty="mod-flags" style="display: none;">
			<svg class="zaobank-empty-icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5">
				<path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"/>
			</svg>
			<h3><?php _e('No flags found', 'zaobank'); ?></h3>
			<p><?php _e('No items match the current filter.', 'zaobank'); ?></p>
		</div>
	</div>

	<!-- Settings Tab Panel -->
	<div class="zaobank-tab-panel <?php echo ($current_view === 'settings') ? 'active' : ''; ?>" data-panel="settings">
		<div class="zaobank-card">
			<div class="zaobank-card-body">
				<h2 class="zaobank-section-title"><?php _e('Moderation Settings', 'zaobank'); ?></h2>

				<div class="zaobank-form-group">
					<label class="zaobank-label" for="mod-auto-downgrade"><?php _e('Auto-downgrade threshold', 'zaobank'); ?></label>
					<input type="number" id="mod-auto-downgrade" class="zaobank-input" data-setting="auto_downgrade_threshold" min="1" max="50">
					<p class="zaobank-form-hint"><?php _e('Number of open flags before a member is auto-downgraded to limited.', 'zaobank'); ?></p>
				</div>

				<div class="zaobank-form-group">
					<label class="zaobank-label" for="mod-flag-threshold"><?php _e('Flag visibility threshold', 'zaobank'); ?></label>
					<input type="number" id="mod-flag-threshold" class="zaobank-input" data-setting="flag_threshold" min="1" max="50">
					<p class="zaobank-form-hint"><?php _e('Number of flags before content is auto-hidden.', 'zaobank'); ?></p>
				</div>

				<div class="zaobank-form-group">
					<label class="zaobank-checkbox-label">
						<input type="checkbox" data-setting="auto_hide_flagged">
						<span><?php _e('Automatically hide flagged content', 'zaobank'); ?></span>
					</label>
				</div>

				<button type="button" class="zaobank-btn zaobank-btn-primary zaobank-save-mod-settings">
					<?php _e('Save Settings', 'zaobank'); ?>
				</button>

				<div class="zaobank-mod-settings-status" style="display: none;"></div>
			</div>
		</div>
	</div>

</div>

<?php include ZAOBANK_PLUGIN_DIR . 'public/templates/components/bottom-nav.php'; ?>

<!-- User Card Template -->
<script type="text/template" id="zaobank-mod-user-card-template">
<div class="zaobank-card zaobank-mod-user-card" data-user-id="{{id}}">
	<div class="zaobank-card-body">
		<div class="zaobank-mod-user-row">
			<div class="zaobank-mod-user-header">
				<img src="{{avatar_url}}" alt="" class="zaobank-avatar">
				<div class="zaobank-mod-user-info">
					<a href="<?php echo esc_url($urls['profile']); ?>?user_id={{id}}" class="zaobank-mod-user-name">{{display_name}}</a>
					<span class="zaobank-mod-user-email">{{email}}</span>
					<span class="zaobank-mod-user-date"><?php _e('Joined:', 'zaobank'); ?> {{registered_date}}</span>
				</div>
			</div>
			<div class="zaobank-mod-user-actions">
				{{#if flag_count}}
				<span class="zaobank-badge zaobank-badge-warning">{{flag_count}} <?php _e('flags', 'zaobank'); ?></span>
				{{/if}}
				<select class="zaobank-select zaobank-mod-role-select" data-user-id="{{id}}" data-current-role="{{role}}">
					<option value="member_limited" {{#if is_limited}}selected{{/if}}><?php _e('Limited', 'zaobank'); ?></option>
					<option value="member" {{#if is_member}}selected{{/if}}><?php _e('Member', 'zaobank'); ?></option>
					{{#if show_leadership}}
					<option value="leadership_team" {{#if is_leadership}}selected{{/if}}><?php _e('Leadership', 'zaobank'); ?></option>
					{{/if}}
				</select>
			</div>
		</div>
	</div>
</div>
</script>

<!-- Flag Card Template -->
<script type="text/template" id="zaobank-mod-flag-card-template">
<div class="zaobank-card zaobank-mod-flag-card" data-flag-id="{{id}}">
	<div class="zaobank-card-body">
		<div class="zaobank-mod-flag-header">
			<span class="zaobank-badge zaobank-badge-{{status_class}}">{{status_label}}</span>
			<span class="zaobank-mod-flag-type">{{flagged_item_type}}</span>
			<span class="zaobank-mod-flag-date">{{created_at}}</span>
		</div>
		<div class="zaobank-mod-flag-details">
			<p><strong><?php _e('Reason:', 'zaobank'); ?></strong> {{reason_label}}</p>
			{{#if context_note}}
			<p><strong><?php _e('Context:', 'zaobank'); ?></strong> {{context_note}}</p>
			{{/if}}
			<p><strong><?php _e('Reporter:', 'zaobank'); ?></strong> {{reporter_name}}</p>
			{{#if flagged_user_name}}
			<p><strong><?php _e('Flagged user:', 'zaobank'); ?></strong>
				<a href="<?php echo esc_url($urls['profile']); ?>?user_id={{flagged_user_id}}">{{flagged_user_name}}</a>
			</p>
			{{/if}}
			{{#if item_preview}}
			<div class="zaobank-mod-flag-preview">{{item_preview}}</div>
			{{/if}}
		</div>
		<div class="zaobank-mod-flag-actions">
			{{#if can_review}}
			<button type="button" class="zaobank-btn zaobank-btn-outline zaobank-btn-sm" data-action="mod-flag-review" data-flag-id="{{id}}">
				<?php _e('Mark Under Review', 'zaobank'); ?>
			</button>
			{{/if}}
			{{#if can_resolve}}
			<button type="button" class="zaobank-btn zaobank-btn-primary zaobank-btn-sm" data-action="mod-flag-resolve" data-flag-id="{{id}}">
				<?php _e('Resolve', 'zaobank'); ?>
			</button>
			<button type="button" class="zaobank-btn zaobank-btn-ghost zaobank-btn-sm" data-action="mod-flag-restore" data-flag-id="{{id}}">
				<?php _e('Restore Content', 'zaobank'); ?>
			</button>
			{{/if}}
		</div>
		<div class="zaobank-mod-flag-resolve-form" hidden>
			<div class="zaobank-form-group">
				<label class="zaobank-label"><?php _e('Resolution note', 'zaobank'); ?></label>
				<textarea class="zaobank-textarea" rows="2" placeholder="<?php esc_attr_e('Add a note about the resolution...', 'zaobank'); ?>"></textarea>
			</div>
			<div class="zaobank-form-actions">
				<button type="button" class="zaobank-btn zaobank-btn-primary zaobank-btn-sm" data-action="mod-flag-confirm-resolve">
					<?php _e('Confirm', 'zaobank'); ?>
				</button>
				<button type="button" class="zaobank-btn zaobank-btn-ghost zaobank-btn-sm" data-action="mod-flag-cancel-resolve">
					<?php _e('Cancel', 'zaobank'); ?>
				</button>
			</div>
		</div>
	</div>
</div>
</script>

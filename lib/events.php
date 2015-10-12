<?php

namespace Beck24\MemberSelfDelete;

/**
 * set up admin/page links
 */
function pagesetup() {
	if (elgg_get_context() == 'admin' && elgg_is_admin_logged_in() && elgg_get_plugin_setting('feedback', PLUGIN_ID) == "yes") {
		elgg_register_admin_menu_item('administer', 'member_selfdelete/reasons', 'users');
	}

	if (elgg_get_context() == 'settings' && elgg_is_logged_in() && !elgg_is_admin_logged_in()) {
		$item = new \ElggMenuItem('member_selfdelete', elgg_echo('member_selfdelete:delete:account'), 'selfdelete');
		elgg_register_menu_item('page', $item);
	}
}
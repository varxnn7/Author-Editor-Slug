<?php
/**
 * Author Slug Editor Uninstall Functions.
 *
 * @package Author_Slug_Editor
 * @subpackage Uninstall
 *
 * @author Varun Kukreja
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Make sure we're uninstalling.
if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

// Delete all the options.
delete_option( 'vk_edit_author_slug' );
delete_option( '_vk_ase_author_base' );
delete_option( '_vk_ase_db_version' );
delete_option( '_vk_ase_default_user_nicename' );
delete_option( '_vk_ase_do_auto_update' );
delete_option( '_vk_ase_do_role_based' );
delete_option( '_vk_ase_old_options' );
delete_option( '_vk_ase_role_slugs' );
delete_option( '_vk_ase_remove_front' );

// Final flush for good measure.
update_option( 'rewrite_rules', '' );

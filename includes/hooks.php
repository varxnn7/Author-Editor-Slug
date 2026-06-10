<?php
/**
 * Author Slug Editor Filters & Actions.
 *
 * @package Author_Slug_Editor
 * @subpackage Hooks
 *
 * @author Varun Kukreja
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

// Admin.
if ( is_admin() ) {

	// Activation.
	add_action( 'vk_ase_activation', 'vk_ase_install' );
	add_action( 'vk_ase_activation', 'vk_ase_flush_rewrite_rules' );

	// Deactivation.
	add_action( 'vk_ase_deactivation', 'vk_ase_flush_rewrite_rules' );

	// Upgrade.
	add_action( 'admin_init', 'vk_ase_upgrade', 999 );

	// Nicename Actions.
	add_action( 'edit_user_profile', 'vk_ase_show_user_nicename' );
	add_action( 'show_user_profile', 'vk_ase_show_user_nicename' );
	add_action( 'user_profile_update_errors', 'vk_ase_update_user_nicename', 20, 3 );
	add_action( 'admin_enqueue_scripts', 'vk_ase_show_user_nicename_scripts' );

	// Nicename column filters.
	add_filter( 'manage_users_columns', 'vk_ase_author_slug_column' );
	add_filter( 'manage_users_custom_column', 'vk_ase_author_slug_custom_column', 10, 3 );

	// Settings.
	add_action( 'admin_menu', 'vk_ase_add_settings_menu' );
	add_action( 'admin_init', 'vk_ase_register_admin_settings' );
	add_filter( 'plugin_action_links', 'vk_ase_add_settings_link', 10, 2 );

	// Settings updated.
	add_action( 'admin_action_update', 'vk_ase_settings_updated' );
	add_action( 'vk_ase_settings_updated', 'vk_ase_flush_rewrite_rules' );
}

// Nicename auto-update actions.
add_action( 'profile_update', 'vk_ase_auto_update_user_nicename' );
add_action( 'user_register', 'vk_ase_auto_update_user_nicename' );

// Author permalink filtering for role-based author bases.
add_filter( 'author_link', 'vk_ase_author_link', 20, 2 );

// Filter author rewrite rules.
add_filter( 'author_rewrite_rules', 'vk_ase_author_rewrite_rules' );

// Add role-based author templates.
add_filter( 'author_template', 'vk_ase_template_include' );

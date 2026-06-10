<?php

/**
 * Plugin Name:       Author Slug Editor
 * Plugin URI:        https://github.com/thebrandonallen/edit-author-slug/
 * Description:       Allows an Admin (or capable user) to edit the author slug of a user, and change the Author Base. <em>i.e. - (WordPress default structure) http://example.com/author/username/ (Plugin allows) http://example.com/ninja/master-ninja/</em>
 * Author:            Varun Kukreja
 * Author URI:        https://github.com/thebrandonallen/
 * Text Domain:       author-slug-editor
 * Domain Path:       /languages
 * Version:           1.9.2
 * Requires at least: 5.8
 * Requires PHP:      7.4
 * License:           GPLv2 or later
 * License URI:       https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
 *
 * Copyright (C) 2009-2025  Varun Kukreja
 *
 * This program is free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License along
 * with this program; if not, write to the Free Software Foundation, Inc.,
 * 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 *
 * @package Author_Slug_Editor
 * @subpackage Main
 * @author Varun Kukreja
 * @version 1.9.2
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

// Load the plugin class file.
require 'includes/classes/class-vk-ase.php';

/**
 * Runs on Edit Author Slug activation.
 *
 * @since 0.7.0
 *
 * @return void
 */
function vk_ase_activation()
{

	/**
	 * Fires on Edit Author Slug activation.
	 *
	 * @since 0.7.0
	 */
	do_action('vk_ase_activation');
}
register_activation_hook(__FILE__, 'vk_ase_activation');

/**
 * Runs on Edit Author Slug deactivation.
 *
 * @since 0.7.0
 *
 * @return void
 */
function vk_ase_deactivation()
{

	/**
	 * Fires on Edit Author Slug deactivation.
	 *
	 * @since 0.7.0
	 */
	do_action('vk_ase_deactivation');
}
register_deactivation_hook(__FILE__, 'vk_ase_deactivation');

/**
 * The main function responsible for returning the one true VK_ASE
 * Instance to functions everywhere.
 *
 * Use this function like you would a global variable, except without needing
 * to declare the global.
 *
 * Example: <?php $vk_ase = vk_ase(); ?>
 *
 * @return VK_ASE The one true VK_ASE Instance.
 */
function vk_ase()
{
	return VK_ASE::instance();
}

/**
 * Initialize Edit Author Slug.
 *
 * @since 1.7.0
 */
function vk_ase_init()
{

	// Initialize the plugin.
	$eas = vk_ase();
	$eas->setup_actions();

	/**
	 * Fires after Edit Author Slug has been loaded and initialized.
	 *
	 * @since 1.7.0
	 */
	do_action('vk_eas_loaded');
}
add_action('plugins_loaded', 'vk_ase_init');

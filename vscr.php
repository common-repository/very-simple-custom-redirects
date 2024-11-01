<?php
/*
 * Plugin Name: VS Custom Redirects
 * Description: With this lightweight plugin you can set a custom page redirect for the default Login, Logout, Register and Lost Password feature.
 * Version: 3.0
 * Author: Guido
 * Author URI: https://www.guido.site
 * License: GPLv3
 * License URI: https://www.gnu.org/licenses/gpl-3.0.html
 * Requires PHP: 7.0
 * Requires at least: 5.0
 * Text Domain: very-simple-custom-redirects
 */

// disable direct access
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

// add settings link
function vscr_action_links( $links ) {
	$settingslink = array( '<a href="'.admin_url( 'options-general.php?page=vscr' ).'">'.__('Settings', 'very-simple-custom-redirects').'</a>', );
	return array_merge( $links, $settingslink );
}
add_filter( 'plugin_action_links_' . plugin_basename(__FILE__), 'vscr_action_links' );

// redirect on login
function vscr_login_redirect( $redirect_to, $requested_redirect_to, $user ) {
	$vscr_admin_login = get_option( 'vscr-setting-1' );
	$vscr_editor_login = get_option( 'vscr-setting-2' );
	$vscr_author_login = get_option( 'vscr-setting-3' );
	$vscr_contributor_login = get_option( 'vscr-setting-4' );
	$vscr_subscriber_login = get_option( 'vscr-setting-5' );
	$default_roles = array('administrator', 'editor', 'author', 'contributor', 'subscriber');
	if ( isset($user->roles[0]) && (in_array($user->roles[0], $default_roles)) ) {
		if ( $user->roles[0] === 'administrator' ) {
			if ( !empty( $vscr_admin_login ) ) {
				if ($vscr_admin_login == 'home') {
					$redirect_to = home_url();
				} else {
					$redirect_to = home_url('/?page_id='.$vscr_admin_login.'');
				}
			}
		} elseif ( $user->roles[0] === 'editor' ) {
			if ( !empty( $vscr_editor_login ) ) {
				if ($vscr_editor_login == 'home') {
					$redirect_to = home_url();
				} else {
					$redirect_to = home_url('/?page_id='.$vscr_editor_login.'');
				}
			}
		} elseif ( $user->roles[0] === 'author' ) {
			if ( !empty( $vscr_author_login ) ) {
				if ($vscr_author_login == 'home') {
					$redirect_to = home_url();
				} else {
					$redirect_to = home_url('/?page_id='.$vscr_author_login.'');
				}
			}
		} elseif ( $user->roles[0] === 'contributor' ) {
			if ( !empty( $vscr_contributor_login ) ) {
				if ($vscr_contributor_login == 'home') {
					$redirect_to = home_url();
				} else {
					$redirect_to = home_url('/?page_id='.$vscr_contributor_login.'');
				}
			}
		} elseif ( $user->roles[0] === 'subscriber' ) {
			if ( !empty( $vscr_subscriber_login ) ) {
				if ($vscr_subscriber_login == 'home') {
					$redirect_to = home_url();
				} else {
					$redirect_to = home_url('/?page_id='.$vscr_subscriber_login.'');
				}
			}
		}
	}
	return esc_url($redirect_to);
}
add_filter( 'login_redirect', 'vscr_login_redirect', 10, 3 );

// redirect on logout
function vscr_logout_redirect( $redirect_to, $requested_redirect_to, $user ) {
	$vscr_admin_logout = get_option( 'vscr-setting-6' );
	$vscr_editor_logout = get_option( 'vscr-setting-7' );
	$vscr_author_logout = get_option( 'vscr-setting-8' );
	$vscr_contributor_logout = get_option( 'vscr-setting-9' );
	$vscr_subscriber_logout = get_option( 'vscr-setting-10' );
	$default_roles = array('administrator', 'editor', 'author', 'contributor', 'subscriber');
	if ( isset($user->roles[0]) && (in_array($user->roles[0], $default_roles)) ) {
		if ( $user->roles[0] === 'administrator' ) {
			if ( !empty( $vscr_admin_logout ) ) {
				if ($vscr_admin_logout == 'home') {
					$redirect_to = home_url();
				} else {
					$redirect_to = home_url('/?page_id='.$vscr_admin_logout.'');
				}
			}
		} elseif ( $user->roles[0] === 'editor' ) {
			if ( !empty( $vscr_editor_logout ) ) {
				if ($vscr_editor_logout == 'home') {
					$redirect_to = home_url();
				} else {
					$redirect_to = home_url('/?page_id='.$vscr_editor_logout.'');
				}
			}
		} elseif ( $user->roles[0] === 'author' ) {
			if ( !empty( $vscr_author_logout ) ) {
				if ($vscr_author_logout == 'home') {
					$redirect_to = home_url();
				} else {
					$redirect_to = home_url('/?page_id='.$vscr_author_logout.'');
				}
			}
		} elseif ( $user->roles[0] === 'contributor' ) {
			if ( !empty( $vscr_contributor_logout ) ) {
				if ($vscr_contributor_logout == 'home') {
					$redirect_to = home_url();
				} else {
					$redirect_to = home_url('/?page_id='.$vscr_contributor_logout.'');
				}
			}
		} elseif ( $user->roles[0] === 'subscriber' ) {
			if ( !empty( $vscr_subscriber_logout ) ) {
				if ($vscr_subscriber_logout == 'home') {
					$redirect_to = home_url();
				} else {
					$redirect_to = home_url('/?page_id='.$vscr_subscriber_logout.'');
				}
			}
		}
	}
	return esc_url($redirect_to);
}
add_filter( 'logout_redirect', 'vscr_logout_redirect', 10, 3 );

// redirect lost password link
function vscr_lost_password_page( $lostpassword_url, $redirect ) {
	$vscr_password_page = get_option( 'vscr-setting-11' );
	if (!empty( $vscr_password_page ) && is_numeric( $vscr_password_page ) ) {
		$lostpassword_url = home_url( '/?page_id='.$vscr_password_page.'' );
	}
	return esc_url($lostpassword_url);
}
add_filter( 'lostpassword_url', 'vscr_lost_password_page', 10, 2 );

// redirect register link
function vscr_register_page( $register_url ) {
	$vscr_register_page = get_option( 'vscr-setting-12' );
	if (!empty( $vscr_register_page ) && is_numeric( $vscr_register_page ) ) {
		$register_url = home_url( '/?page_id='.$vscr_register_page.'' );
	}
	return esc_url($register_url);
}
add_filter( 'register_url', 'vscr_register_page', 10, 1 );

// include options file
include 'vscr-options.php';

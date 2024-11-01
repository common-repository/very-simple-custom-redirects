<?php
// exit if uninstall is not called
if ( !defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit();
}

$keep = get_option( 'vscr-setting-13' );
if ( $keep != 'yes' ) {
	// set global
	global $wpdb;

	// delete options
	$wpdb->query( "DELETE FROM {$wpdb->options} WHERE option_name LIKE 'vscr-setting%'" );
}

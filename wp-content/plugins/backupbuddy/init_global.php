<?php // This code runs everywhere.



// Make localization happen.
if ( ! defined( 'PB_STANDALONE' ) ) {
	load_plugin_textdomain( 'it-l10n-backupbuddy', false, dirname( plugin_basename( __FILE__ ) ) . '/lang' );
}



/********** ACTIONS (global) **********/
pb_backupbuddy::add_action( array( 'pb_backupbuddy-cron_scheduled_backup', 'process_scheduled_backup' ), 10, 5 ); // Scheduled backup.



/********** AJAX (global) **********/



/********** CRON (global) **********/
pb_backupbuddy::add_cron( 'process_backup', 10, 1 ); // Normal (manual) backup. Normal backups use cron system for scheduling each step when in modern mode. Classic mode skips this and runs all in one PHP process.
pb_backupbuddy::add_cron( 'final_cleanup', 10, 1 ); // Cleanup after backup.
pb_backupbuddy::add_cron( 'remote_send', 10, 5 ); // Manual remote destination sending.
pb_backupbuddy::add_cron( 'destination_send', 10, 3 ); // Manual remote destination sending.

// Remote destination copying. Eventually combine into one function to pass to individual remote destination classes to process.
pb_backupbuddy::add_cron( 'process_s3_copy', 10, 6 );
pb_backupbuddy::add_cron( 'process_remote_copy', 10, 3 );
pb_backupbuddy::add_cron( 'process_dropbox_copy', 10, 2 );
pb_backupbuddy::add_cron( 'process_rackspace_copy', 10, 5 );
pb_backupbuddy::add_cron( 'process_ftp_copy', 10, 7 );
pb_backupbuddy::add_cron( 'housekeeping', 10, 0 );
pb_backupbuddy::add_cron( 'process_destination_copy', 10, 3 ); // New copy mechanism.


/********** FILTERS (global) **********/
pb_backupbuddy::add_filter( 'cron_schedules' ); // Add schedule periods such as bimonthly, etc into cron. By default passes 1 param at priority 10.
if ( '1' == pb_backupbuddy::$options['disable_https_local_ssl_verify'] ) {
	$disable_local_ssl_verify_anon_function = create_function( '', 'return false;' );
	add_filter( 'https_local_ssl_verify', $disable_local_ssl_verify_anon_function, 100 );
}



/********** OTHER (global) **********/


// WP-CLI tool support for command line access to BackupBuddy. http://wp-cli.org/
if ( defined( 'WP_CLI' ) && WP_CLI ) {
	include( pb_backupbuddy::plugin_path() . '/classes/wp-cli.php' );
}


// TODO: In the future when WordPress handles this for us, remove on WP versions where it is no longer needed.
function backupbuddy_clean_transients() {
	backupbuddy_transient_delete( true );
}
function backupbuddy_clear_transients() {
	backupbuddy_transient_delete( false );
}
function backupbuddy_transient_delete( $expired ) {
	global $_wp_using_ext_object_cache;
	if ( !$_wp_using_ext_object_cache ) {
		global $wpdb;
		// Build required SQL
		$sql = "SELECT option_name FROM $wpdb->options WHERE option_name LIKE '_transient_timeout%'";
		if ( $expired ) {
			$time = time();
			$sql .=  " AND option_value < $time";
		}
		// Get all transients
		$transients = $wpdb->get_col( $sql );
		// Loop through each transient and delete them
		foreach( $transients as $transient ) { $deletion = delete_transient( str_replace( '_transient_timeout_', '', $transient ) ); }
		// Optimize the table after the deletions
		$wpdb->query( "OPTIMIZE TABLE $wpdb->options" );
	}
}
add_action( 'wp_scheduled_delete', 'backupbuddy_clean_transients' );
add_action( 'after_db_upgrade', 'backupbuddy_clear_transients' );


function backupbuddy_register_sync_verbs( $api ) {
	$verbs = array(
		'backupbuddy-run-backup'		=> 'Ithemes_Sync_Verb_Backupbuddy_Run_Backup',
		'backupbuddy-list-profiles'		=> 'Ithemes_Sync_Verb_Backupbuddy_List_Profiles',
		'backupbuddy-list-schedules'	=> 'Ithemes_Sync_Verb_Backupbuddy_List_Schedules',
		'backupbuddy-get-overview'		=> 'Ithemes_Sync_Verb_Backupbuddy_Get_Overview',
	);
	foreach( $verbs as $name => $class ) {
		$api->register( $name, $class, pb_backupbuddy::plugin_path() . "/classes/ithemes-sync/$name.php" );
	}
	
	require_once( pb_backupbuddy::plugin_path() . "/classes/ithemes-sync/backupbuddy-get-overview.php" );
	$apple = new Ithemes_Sync_Verb_Backupbuddy_Get_Overview;
	print_r( $apple->run( array() ) );
}
add_action( 'ithemes_sync_register_verbs', 'backupbuddy_register_sync_verbs' );


<?php
function plugin_information( $plugin_slug, $data ) {
	$plugin_path = $data['path'];
	?>
	
	<textarea readonly="readonly" rows="7" cols="65" wrap="off" style="width: 100%;"><?php
		//echo "Version History:\n\n";
		readfile( $plugin_path . '/history.txt' );
	?></textarea>
	<script type="text/javascript">
		jQuery(document).ready(function() {
			jQuery("#pluginbuddy_<?php echo $plugin_slug; ?>_debugtoggle").click(function() {
				jQuery("#pluginbuddy_<?php echo $plugin_slug; ?>_debugtoggle_div").slideToggle();
			});
		});
	</script>
	<?php
	if ( pb_backupbuddy::_POST( 'reset_defaults' ) == $plugin_slug ) {
		if ( call_user_func(  'pb_' . $plugin_slug . '::reset_options', true ) === true ) {
			pb_backupbuddy::alert( 'Plugin settings have been reset to defaults for plugin `' . $data['name'] . '`.' );
		} else {
			pb_backupbuddy::alert( 'Unable to reset plugin settings. Verify you are running the latest version.' );
		}
	}
	?>
	
	<?php
} // end plugin_information().



// User forced cleanup.
if ( pb_backupbuddy::_GET( 'cleanup_now' ) != '' ) {
	pb_backupbuddy::alert( 'Performing cleanup procedures now.' );
	backupbuddy_core::periodic_cleanup( 0 ); // clean up everything.
}



// Reset log.
if ( pb_backupbuddy::_GET( 'reset_log' ) != '' ) {
	if ( file_exists( $log_file ) ) {
		@unlink( $log_file );
	}
	if ( file_exists( $log_file ) ) { // Didnt unlink.
		pb_backupbuddy::alert( 'Unable to clear log file. Please verify permissions on file `' . $log_file . '`.' );
	} else { // Unlinked.
		pb_backupbuddy::alert( 'Cleared log file.' );
	}
}



// Reset disalerts.
if ( pb_backupbuddy::_GET( 'reset_disalerts' ) != '' ) {
	pb_backupbuddy::$options['disalerts'] = array();
	pb_backupbuddy::save();
	
	pb_backupbuddy::alert( 'Dismissed alerts have been reset. They may now be visible again.' );
}
?>



<h3><?php _e( 'Troubleshooting Log', 'it-l10n-backupbuddy' ); ?></h3>
By default only errors are logged. Enable Full Logging on the <a href="?page=pb_backupbuddy_settings&tab=1">Advanced Settings</a> tab.

<?php
$log_file = WP_CONTENT_DIR . '/uploads/pb_' . self::settings( 'slug' ) . '/log-' . self::$options['log_serial'] . '.txt';

echo '<textarea readonly="readonly" style="width: 100%;" wrap="off" cols="65" rows="7">';
if ( file_exists( $log_file ) ) {
	readfile( $log_file );
} else {
	echo __('Nothing has been logged.', 'it-l10n-backupbuddy' );
}
echo '</textarea>';
echo '<a href="' . pb_backupbuddy::page_url() . '&reset_log=true&tab=2" class="button secondary-button">' . __('Clear Log', 'it-l10n-backupbuddy' ) . '</a>';
?>



<br><br>
<h3><?php _e( 'Version History', 'it-l10n-backupbuddy' ); ?></h3>
<?php
plugin_information( pb_backupbuddy::settings( 'slug' ), array( 'name' => pb_backupbuddy::settings( 'name' ), 'path' => pb_backupbuddy::plugin_path() ) );
?>



<br style="clear: both;"><br>
<h3><?php _e( 'Other', 'it-l10n-backupbuddy' ); ?></h3>
<div>
	<a href="<?php echo pb_backupbuddy::page_url(); ?>&cleanup_now=true&tab=2" class="button secondary-button"><?php _e('Cleanup Temporary Files Now', 'it-l10n-backupbuddy' );?>*</a>
	&nbsp;
	<a href="<?php echo pb_backupbuddy::page_url(); ?>&reset_disalerts=true&tab=2" class="button secondary-button"><?php _e('Reset Dismissed Alerts (' . count( pb_backupbuddy::$options['disalerts'] ) . ')', 'it-l10n-backupbuddy' );?></a>
	&nbsp;
</div>
<br style="clear: both;"><br>
<span class="description"><?php _e( '* Temporary files are normally automatically cleaned up on a regularly scheduled basis.', 'it-l10n-backupbuddy' ); ?></span>



<br><br><br>

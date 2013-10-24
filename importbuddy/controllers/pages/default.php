<?php
if ( ! defined( 'PB_IMPORTBUDDY' ) || ( true !== PB_IMPORTBUDDY ) ) {
	die( '<html></html>' );
}



/****** BEGIN AUTHENTICATION *****/
require_once( ABSPATH . 'importbuddy/classes/auth.php' );
Auth::check();
/****** END AUTHENTICATION *****/



$mode = 'html';



// Register PHP shutdown function to help catch and log fatal PHP errors during backup.
register_shutdown_function( 'shutdown_function' );
//error_reporting( E_ERROR | E_WARNING | E_PARSE | E_NOTICE ); // HIGH

/*	shutdown_function()
 *	
 *	Used for catching fatal PHP errors during backup to write to log for debugging.
 *	
 *	@return		null
 */
function shutdown_function() {
	
	
	// Get error message.
	// Error types: http://php.net/manual/en/errorfunc.constants.php
	$e = error_get_last();
	if ( $e === NULL ) { // No error of any kind.
		return;
	} else { // Some type of error.
		if ( !is_array( $e ) || ( $e['type'] != E_ERROR ) && ( $e['type'] != E_USER_ERROR ) ) { // Return if not a fatal error.
			//echo '<!-- ' . print_r( $e, true ) . ' -->' . "\n";
			return;
		}
	}
	
	
	// Calculate log directory.
	if ( defined( 'PB_STANDALONE' ) && PB_STANDALONE === true ) {
		$log_directory = ABSPATH . 'importbuddy/';
	} else {
		$log_directory = pb_backupbuddy::$options['log_directory'];
	}
	$main_file = $log_directory . 'log-' . pb_backupbuddy::$options['log_serial'] . '.txt';
	
	
	// Determine if writing to a serial log.
	if ( pb_backupbuddy::$_status_serial != '' ) {
		$serial = pb_backupbuddy::$_status_serial;
		$serial_file = $log_directory . 'status-' . $serial . '_' . pb_backupbuddy::$options['log_serial'] . '.txt';
		$write_serial = true;
	} else {
		$write_serial = false;
	}
	
	
	// Format error message.
	$e_string = '----- FATAL ERROR ----- A fatal PHP error was encountered: ';
	foreach( (array)$e as $e_line_title => $e_line ) {
		$e_string .= $e_line_title . ' => ' . $e_line . "; ";
	}
	$e_string = rtrim( $e_string, '; ' ) . '.';
	
	// Write to log.
	@file_put_contents( $main_file, $e_string, FILE_APPEND );
	
	// IMPORTBUDDY
	$status = pb_backupbuddy::$format->date( time() ) . "\t" .
				sprintf( "%01.2f", round( microtime( true ) - pb_backupbuddy::$start_time, 2 ) ) . "\t" .
				sprintf( "%01.2f", round( memory_get_peak_usage() / 1048576, 2 ) ) . "\t" .
				'error' . "\t\t" .
				str_replace( chr(9), '   ', $e_string )
			;
	$status = str_replace( '\\', '/', $status );
	echo '<script type="text/javascript">pb_status_append("' . str_replace( '"', '&quot;', $status ) . '");</script>';
	
} // End shutdown_function.



/********** AJAX **********/

$ajax = '';
if ( pb_backupbuddy::_POST( 'ajax' ) != '' ) {
	$ajax = pb_backupbuddy::_POST( 'ajax' );
} elseif ( pb_backupbuddy::_GET( 'ajax' ) != '' ) {
	$ajax = pb_backupbuddy::_GET( 'ajax' );
}
if ( $ajax != '' ) {	
	
	Auth::require_authentication(); // Die if not logged in.
	
	$page = ABSPATH . 'importbuddy/controllers/ajax/' . $ajax . '.php';
	if ( file_exists( $page ) ) {
		require_once( $page );
	} else {
		echo '{Error: Invalid AJAX action `' . htmlentities( $ajax ) . '`.}';
	}
	
/********** PAGES **********/
} elseif ( ( pb_backupbuddy::_GET( 'step' ) != '' ) && is_numeric( pb_backupbuddy::_GET( 'step' ) ) ) {
	
	$step = pb_backupbuddy::_GET( 'step' );
	if ( $step > 1 ) {
		Auth::require_authentication(); // Die if not logged in.
	}
	
	$page = ABSPATH . 'importbuddy/controllers/pages/' . pb_backupbuddy::_GET( 'step' ) . '.php';
	if ( file_exists( $page ) ) {
		$step = pb_backupbuddy::_GET( 'step' );
		echo '<!-- Starting step ' . htmlentities( pb_backupbuddy::_GET( 'step' ) ) . '. Page: `' . basename( $page ) . '`. -->';
		require_once( $page );
		pb_backupbuddy::status( 'details', 'Finished step ' . htmlentities( pb_backupbuddy::_GET( 'step' ) ) . '.' );
	} else {
		echo '{Error: Invalid page `' . htmlentities( pb_backupbuddy::_GET( 'step' ) ) . '.php' . '`.}';
		die();
	}
	
/********** ASSUME DEFAULT PAGE **********/
} else {
	require_once( '1.php' );
}
?>
<?php
/**
 * Logger class used in the Themebeez Demo Importer plugin
 */

// Include files.
if ( ! class_exists( 'TT_Importer_Logger' ) ) {

	require TT_ABSPATH. 'includes/demo-importer/importer/class-et-importer-logger.php';
}

if ( ! class_exists( 'TT_Importer_Logger_CLI' ) ) {

	require TT_ABSPATH. 'includes/demo-importer/importer/class-et-importer-logger-cli.php';
}


class TT_Logger extends TT_Importer_Logger_CLI {

	/**
	 * Variable for front-end error display.
	 */
	public $error_output = '';

	/**
	 * Overwritten log function from TT_Importer_Logger_CLI.
	 *
	 * Logs with an arbitrary level.
	 *
	 * @param mixed $level level of reporting.
	 * @param string $message log message.
	 * @param array $context context to the log message.
	 */
	public function log( $level, $message, array $context = array() ) {

		// Save error messages for front-end display.
		$this->error_output( $level, $message, $context = array() );

		if ( $this->level_to_numeric( $level ) < $this->level_to_numeric( $this->min_level ) ) {
			return;
		}

		printf(
			'[%s] %s' . PHP_EOL,
			strtoupper( $level ),
			$message
		);
	}


	/**
	 * Save messages for error output.
	 * Only the messages greater then Error.
	 *
	 * @param mixed $level level of reporting.
	 * @param string $message log message.
	 * @param array $context context to the log message.
	 */
	public function error_output( $level, $message, array $context = array() ) {
		if ( $this->level_to_numeric( $level ) < $this->level_to_numeric( 'error' ) ) {
			return;
		}

		$this->error_output .= sprintf(
			'[%s] %s<br>',
			strtoupper( $level ),
			$message
		);
	}
}
<?php
if (!defined('FaabBB'))
	exit();

// Import LoggingLevel.
include(CORE_FOLDER . DS . 'LoggingLevel' . PHP_SUFFIX);

/**
 * A {@link CoreLogger} object is used by the {@link Core} to log messages.
 * The CoreLogger class stores the logs into the given log file(s).
 * Each log has a level, from the lowest level; <code>FINE</code>. To the highest level <code>SEVERE</code>
 * By using the {@link CoreLogger}, be sure you only log {@link Core} related messages.
 * 
 * @category Core Logging
 * @version Version 3.006 ALPHA
 * @copyright Copyright &copy; 2011, FaabTech
 * @author Fabian M.
 */
class CoreLogger {

	/**
	 * A boolean which is <code>true</code> when the {@link CoreLogger} is initialized,
	 * 	and <code>false</code> when not.
	 */
	private static $init = false;


	/**
	 * Initialize the {@link CoreLogger}.
	 */
	public static function init() {
		if (self::$init) 
			return;
		if (!is_writeable(CORE_LOG_FILE) && file_exists(CORE_LOG_FILE)) {
			die("Failed to initialize the CoreLogger. Core log file isn't writeable.");
		}
		if (!file_exists(CORE_LOG_FILE) 
			|| filesize(CORE_LOG_FILE) == 0 
			|| filesize(CORE_LOG_FILE) > 10000) {
				
			$f = @fopen(CORE_LOG_FILE, 'w') or die("Failed to initialize CoreLogger.");
			fwrite($f, "<?php exit(); ?>\n");
			fclose($f);
		}

		self::$init = true;
	}
	/**
	 * Logs a <code>FINE</code> message.
	 *
	 * @param $msg The message to log.
	 */
	public static function fine($msg) {
		self::log(CoreLoggingLevel::FINE, $msg, 2);
	}

	/**
	 * Logs a <code>CONFIG</code> message.
	 *
	 * @param $msg The message to log.
	 */
	public static function config($msg) {
		self::log(CoreLoggingLevel::CONFIG, $msg, 2);
	}

	/**
	 * Logs a <code>INFO</code> message.
	 *
	 * @param $msg The message to log.
	 */
	public static function info($msg) {
		self::log(CoreLoggingLevel::INFO, $msg, 2);
	}

	/**
	 * Logs a <code>WARNING</code> message.
	 *
	 * @param $msg The message to log.
	 */
	public static function warning($msg) {
		self::log(CoreLoggingLevel::WARNING, $msg, 2);
	}

	/**
	 * Logs a <code>SEVERE</code> message.
	 *
	 * @param $msg The message to log.
	 */
	public static function severe($msg) {
		self::log(CoreLoggingLevel::SEVERE, $msg, 2);
	}

	/**
	 * Log a message.
	 * 
	 * @param $level The {@link CoreLoggingLevel} of this message.
	 * @param $msg The message to log.
	 */
	public static function log($level, $msg, $index = null) {
		$f = fopen(CORE_LOG_FILE, 'a');
		if (!$f) {
			self::warning("Failed to log message: " . $msg);
		}
		$backtrace = debug_backtrace();

		$log = date("M m, Y G:i:s A") . ' ' . (isset($backtrace[$index == null ? 1 : $index]['class']) ? 
			$backtrace[$index == null ? 1 : $index]['class'] : 'null') . ' ' . 
			$backtrace[$index == null ? 1 : $index]['function'] . "\n";
		fwrite($f, $log);
		$log = $level . ': ' . $msg . "\n";
		fwrite($f, $log);
		fclose($f);

	}



}

CoreLogger::init();

?>
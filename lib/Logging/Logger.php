<?php
namespace Logging;

if (!defined('FaabBB'))
	die;
	
use Logging\OutputHandler as OutputHandler;
use Language\StackTrace as StackTrace;

/**
 * A {@link Logger} object is used to log messages for a specific system
 * 	or application component.
 *
 * @category logging
 * @version 3.010
 * @since 3.010
 * @copyright Copyright &copy; 2011, FaabTech
 * @author Fabian M.
 */
class Logger {
	/**
	 * Array with saved {@link Logger} instances.
	 */
	protected static $loggers = array();

	/**
	 * The name of this {@link Logger}.
	 */
	protected $name = "";

	/**
	 * The {@link Handler}s of this logger.
	 */
	protected $handlers = array();

	/**
	 * The {@link Level#value} of this {@link Logger}
	 */
	protected $levelValue = 800;

	/**
	 * Get a {@link Logger} by name.
	 *
	 * @since 3.010
	 * @param $name The name of the {@link Logger} to get.
	 * @return the {@link Logger} instance.
	 */
	public static function getLogger($name) {
		if (isset(self::$loggers[$name]))
			return self::$logger[$name];
		$logger = new Logger($name);
		self::$loggers[$name] = $logger;
		return $logger;
	}

	/**
	 * Creates a new {@link Logger} instance.
	 *
	 * @since 3.010
	 * @param $name The name of this {@link Logger}.
	 */
	public function __construct($name) {
		$this->name = $name;
		$this->levelValue = Level::$INFO['value'];
	}

	/**
	 * Add a {@link Handler} to this {@link Logger}.
	 *
	 * @since 3.010
	 * @param $handler The {@link Handler} to add.
	 */
	public function addHandler($handler) {
		array_push($this->handlers, $handler);
	}

	/**
	 * Get the {@link Handler}s of this {@link Logger}.
	 *
	 * @since 3.010
	 * @return the {@link Handler}s of this {@link Logger}.
	 */
	public function getHandlers() {
		return $this->handlers;
	}

	/**
	 * Set the {@link Level} of this {@link Logger}.
	 *
	 * @since 3.010
	 * @param $Level The {@link Level} to set.
	 */
	public function setLevel($level) {
		$this->levelValue = $level['value'];
	}

	/**
	 * Get the {@link Level} of this {@link Logger}.
	 *
	 * @since 3.010
	 * @return the {@link Level} of this {@link Logger}.
	 */
	public function getLevel() {
		return $this->levelValue;
	}

	/**
	 * Log a {@link LogRecord}.
	 * All the other logging methods in this class call through this method to actually perform any logging.
	 * Subclasses can override this single method to capture all log activity.
	 *
	 * @param record The {@link LogRecord} to be published.
	 */
	protected function log($record, $msg = null) {
		if ($msg == null) {
			// String is given.
			if (is_string($record)) {
				$s = new StackTrace(1, 0);
				$record = new LogRecord(Level::$INFO, $record, $s->getStackFrames());
			}
			$l = $record->getLevel();
			if ($l['value'] < $this->levelValue ||
				$this->levelValue == Level::$OFF['value']) {
				return;
			}
			
			foreach ($this->handlers as $handler) {
				$handler->publish($record);
			}
		} else {
			$s = new StackTrace(2, 0);
			$this->log(new LogRecord($record, $msg, $s->getStackFrames()));
		}
	}

	/**
	 * Log a {@link Level#SEVERE} message.
	 * If the logger is currently enabled for the {@link Level#SEVERE} message level then the given message is
	 * 	forwarded to all the registered output {@link Handler} objects.
	 *
	 * @param msg The string message (or a key in the message catalog)
	 */
	public function severe($msg) {
		$l = Level::$SEVERE;
		if ($l['value'] < $this->levelValue) {
			return; 
		}

		$this->log(Level::$SEVERE, $msg);
	}

	/**
	 * Log a {@link Level#WARNING} message.
	 * If the logger is currently enabled for the {@link Level#WARNING} message level then the given message is
	 * 	forwarded to all the registered output {@link Handler} objects.
	 *
	 * @param msg The string message (or a key in the message catalog)
	 */
	public function warning($msg) {
		$l = Level::$WARNING;
		if ($l['value'] < $this->levelValue) {
			return; 
		}

		$this->log(Level::$WARNING, $msg);
	}
	/**
	 * Log a {@link Level#INFO} message.
	 * If the logger is currently enabled for the {@link Level#INFO} message level then the given message is
	 * 	forwarded to all the registered output {@link Handler} objects.
	 *
	 * @param msg The string message (or a key in the message catalog)
	 */
	public function info($msg) {
		$l = Level::$INFO;
		if ($l['value'] < $this->levelValue) {
			return; 
		}

		$this->log(Level::$INFO, $msg);
	}
	/**
	 * Log a {@link Level#CONFIG} message.
	 * If the logger is currently enabled for the {@link Level#CONFIG} message level then the given message is
	 * 	forwarded to all the registered output {@link Handler} objects.
	 *
	 * @param msg The string message (or a key in the message catalog)
	 */
	public function config($msg) {
		$l = Level::$CONFIG;
		if ($l['value'] < $this->levelValue) {
			return; 
		}

		$this->log(Level::$CONFIG, $msg);
	}
	/**
	 * Log a {@link Level#FINE} message.
	 * If the logger is currently enabled for the {@link Level#FINE} message level then the given message is
	 * 	forwarded to all the registered output {@link Handler} objects.
	 *
	 * @param msg The string message (or a key in the message catalog)
	 */
	public function fine($msg) {
		$l = Level::$FINE;
		if ($l['value'] < $this->levelValue) {
			return; 
		}

		$this->log(Level::$FINE, $msg);
	}
	/**
	 * Log a {@link Level#FINER} message.
	 * If the logger is currently enabled for the {@link Level#FINER} message level then the given message is
	 * 	forwarded to all the registered output {@link Handler} objects.
	 *
	 * @param msg The string message (or a key in the message catalog)
	 */
	public function finer($msg) {
		$l = Level::$FINER;
		if ($l['value'] < $this->levelValue) {
			return; 
		}

		$this->log(Level::$FINER, $msg);
	}

	/**
	 * Log a {@link Level#FINEST} message.
	 * If the logger is currently enabled for the {@link Level#FINEST} message level then the given message is
	 * 	forwarded to all the registered output {@link Handler} objects.
	 *
	 * @param msg The string message (or a key in the message catalog)
	 */
	public function finest($msg) {
		$l = Level::$FINEST;
		if ($l['value'] < $this->levelValue) {
			return; 
		}

		$this->log(Level::$FINEST, $msg);
	}


}
?>

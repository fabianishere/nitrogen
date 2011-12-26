<?php 
namespace Logging;

if (!defined('FaabBB'))
	die;
	
use Logging\Level as Level;
use Language\Stacktrace as Stacktrace;
	
/**
 * {@link LogRecord} objects are used to pass logging requests between the logging framework and individual log Handlers.
 * When a {@link LogRecord} is passed into the logging framework it logically belongs to the framework 
 * 	and should no longer be used or updated by the client application.
 * 
 * @category logging
 * @version 3.010
 * @since 3.010
 * @copyright Copyright &copy; 2011, FaabTech
 * @author Fabian M.
 */
class LogRecord {
	/**
	 * The {@Link Level} of this {@link LogRecord}.
	 */
	protected $level = array('name' => 'INFO', 'value' => 800);
	
	/**
	 * The message of this {@link LogRecord}.
	 */
	protected $message = "";
	
	/**
	 * The {@link StackFrame}s of this {@link LogRecord}.
	 */
	protected $stackframes = array();
	/**
	 * Constructs a new {@link LogRecord}.
	 * 
	 * @since 3.010
	 * @param $level The {@link Level} of this {@link LogRecord}.
	 * @param $msg The message of this {@link LogRecord}.
	 * @param $stackframes The {@link StackFrame}s of this {@link LogRecord}.
	 */	
	public function __construct($level, $msg, $stackframes = array()) {
		if (!is_array($level) || !is_array($stackframes)) {
			return;
		}
		
		$this->level = $level;
		$this->message = $msg;
		$this->stackframes = $stackframes;
	}
	
	/**
	 * Get the {@link Level} of this {@link LogRecord}.
	 * 
	 * @since 3.010
	 * @return The {@link Level} of this {@link LogRecord}.
	 */
	public function getLevel() {
		return $this->level;
	}
	
	/**
	 * Set the {@link Level} of this {@link LogRecord}.
	 * 
	 * @since 3.010
	 * @param $level The {@link Level} to set.
	 */
	public function setLevel($level) {
		!is_array($level) or ($this->level = $level);
	}
	
	/**
	 * Get the message of this {@link LogRecord}.
	 * 
	 * @since 3.010
	 * @return The message of this {@link LogRecord}.
	 */
	public function getMessage() {
		return $this->message;
	}
	
	/**
	 * Set the message of this {@link LogRecord}.
	 * 
	 * @since 3.010
	 * @param $msg The message to set.
	 */
	public function setMessage($msg) {
		$this->msg = $msg;
	}
	
	/**
	 * Get the {@link StackFrame}s of this {@link LogRecord}.
	 * 
	 * @since 3.010
	 * @return The {@link StackFrame}s of this {@link LogRecord}.
	 */
	public function getStackFrames() {
		return $this->stackframes;
	}
	
	/**
	 * Set the {@link StackFrame}s of this {@link LogRecord}.
	 * 
	 * @since 3.010
	 * @param $stackframes The {@link StackFrame}s to set.
	 */
	public function setStackFrames($stackframes) {
		!is_array($stackframes) or ($this->stackframes = $stackframes);
	}
	
	
	
	
}
?>
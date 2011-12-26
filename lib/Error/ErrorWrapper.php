<?php
namespace Error;

if (!defined('FaabBB'))
	die;
	
/**
 * The {@link ErrorWrapper} is a wrapper for an error in 
 * 	PHP. 
 * The {@link ErrorWrapper} is used by the {@link AbstractErrorHandler}.
 *
 * @category core
 * @version 3.010
 * @since 3.010
 * @copyright Copyright &copy; 2011, FaabTech
 * @author Fabian M.
 */
class ErrorWrapper {
	
	/**
	 * Constructs a new {@link ErrorWrapper}.
	 * 
	 * @param $level The level of this error.
	 * @param $message The message of this error.
	 * @param $file The file where the error occured.
	 * @param $line The line number where the error occured.
	 */
	public function __construct($level = 0, $message = "", $file = "", $line = 0) {
		$this->level = $level;
		$this->message = $message;
		$this->file = $file;
		$this->line = $line;
	}
	/**
	 * The level of this error.
	 */
	protected $level = 0;

	/**
	 * Returns the level of this error.
	 * 
	 * @since 3.010 
	 * @return The level of this error.
	 */
	public function getLevel() {
		return $this->level;
	}

	/**
	 * The message of this error.
	 */
	protected $message = "";

	/**
	 * Returns the message of this error.
	 * 
	 * @since 3.010 
	 * @return The message of this error.
	 */
	public function getMessage() {
		return $this->message;
	}

	/**
	 * The file where the error occured.
 	 */
	protected $file = "";

	/**
	 * Returns the file where the error occured.
	 * 
	 * @since 3.010 
	 * @return The file where the error occured.
	 */
	public function getFile() {
		return $this->file;
	}
	
	/**
	 * The line number where the error occured.
	 */
	protected $line = 0;

	/**
	 * Returns the line number where the error occured.
	 * 
	 * @since 3.010 
	 * @return The line number where the error occured.
	 */
	public function getLine() {
		return $this->line;
	}
	
}

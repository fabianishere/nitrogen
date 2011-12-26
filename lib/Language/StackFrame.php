<?php 
namespace Language;

if (!defined('FaabBB'))
	die;
	
/**
 * A {@link StackFrame} is a frame in a {@link StackTrace},	
 * 	it contains the current function name, current line number,
 * 	current file name and the current class name.
 * 
 * @category core
 * @version 3.010
 * @since 3.010
 * @copyright Copyright &copy; 2011, FaabTech
 * @author Fabian M.
 */
class StackFrame { 
	/**
	 * The stack frame array of this {@link StackFrame}.
	 */
	protected $stackFrameArray = array();
	
	/**
	 * Constructs a new {@link StackFrame}.
	 * 
	 * @since 3.010
	 * @param $stackFrameArray The stack frame array.
	 */
	public function __construct($stackFrameArray) {
		$this->stackFrameArray = $stackFrameArray;
	}
	
	/**
	 * Returns the current function name.
	 * 
	 * @since 3.010
	 * @return the current function name.
	 */
	public function getFunctionName() {
		return isset($this->stackFrameArray['function']) ? 
			$this->stackFrameArray['function'] : null;
	}
	
	/**
	 * Returns the current line number.
	 * 
	 * @since 3.010
	 * @return the current line number.
	 */
	public function getLine() {
		return isset($this->stackFrameArray['line']) ? 
			$this->stackFrameArray['line'] : -1;
	}
	
	/**
	 * Returns the current file name.
	 * 
	 * @since 3.010
	 * @return the current file name.
	 */
	public function getFileName() {
		return isset($this->stackFrameArray['file']) ? 
			$this->stackFrameArray['file'] : null;
	}
	
	/**
	 * Returns the current class name.
	 * 
	 * @since 3.010
	 * @return the current class name.
	 */
	public function getClassName() {
		return isset($this->stackFrameArray['class']) ? 
			$this->stackFrameArray['class'] : null;
	}
	
}

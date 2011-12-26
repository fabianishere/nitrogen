<?php
namespace Language;

if (!defined('FaabBB'))
	die;

use Language\StackFrame as StackFrame;

/**
 * The {@link StackTrace} class provides an object oriented StackTrace for
 * 	PHP.
 *
 * @category core
 * @version 3.010
 * @since 3.010
 * @copyright Copyright &copy; 2011, FaabTech
 * @author Fabian M.
 */
class StackTrace {
	/**
	 * The backtrace array of this {@link StackTrace} object.
	 */
	protected $backtrace = array();

	/**
	 * Array with {@link StackFrame}s of this {@link StackTrace}.
	 */
	protected $stackFrames = array();
	/**
	 * Constructs a new {@link StackTrace} instance.
	 *
	 * @since 3.010
	 * @param $skip The amount of stack frames to skip at beginning.
	 * @param $limit The amount of stack frames that will be returned.
	 * 	<note>Be aware that $limit = $limit + $skip</note>
	 */
	public function __construct($skip = 0, $limit = 0) {
		$backtrace = debug_backtrace($limit);

		// Remove the call to this class.
		array_shift($backtrace);
		for ($i = 0; $i < $skip; $i++) {
			if ($i >= count($backtrace))
				break;
			array_shift($backtrace);
		}

		$this->backtrace = $backtrace;

		foreach($backtrace as $frame) {
			array_push($this->stackFrames, new StackFrame($frame));
		}
	}

	/**
	 * Get the {@link StackFrame}s of this {@link StackTrace}.
	 *
	 * @since 3.010
	 * @param $skip The amount of frames to skip first.
	 * @param $limit The amount of frames that should be returned.
	 * @return the {@link StackFrame}s of this {@link StackTrace}.
	 */
	public function getStackFrames($skip = 0, $limit = 0) {
		return $limit == 0 ? array_slice($this->stackFrames, $skip) : 
			array_slice($this->stackFrames, $skip, $limit);
	}


}
?>

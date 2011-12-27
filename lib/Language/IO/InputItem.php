<?php
namespace Language\IO;

if (!defined('FaabBB'))
	die;

/**
 * The {@link InputItem} class is a item of the {@link InputManager}
 * 	and represents a variable.
 * When the type of {@link InputItem#value} isn't the same
 * 	as requested, it'll throw an error.
 * TODO: Correct error handling.
 *
 * @category io
 * @version 3.010
 * @since 3.010
 * @copyright Copyright &copy; 2011, FaabTech
 * @author Fabian M.
 */
class InputItem {

	/**
	 * The value of this {@link InputItem}.	
	 */
	protected $value = null;

	/**
	 * Construct a new {@link InputItem}.	
	 * 
	 * @param $value The value of this {@link InputItem}.
	 */	
	public function __construct($value) {
		$this->value = $value;
	}

	/** 
	 * Get the string value of this {@link InputItem}.
	 * 
 	 * @since 3.010
	 * @return the String value of this {@link InputItem}.
	 */
	public function toString() {
		if (!is_string($this->value))
			return "";
		return $value;
	}

	/** 
	 * Get the boolean value of this {@link InputItem}.
	 * 
 	 * @since 3.010
	 * @return the boolean value of this {@link InputItem}.
	 */
	public function toBoolean() {
		if (!is_bool($this->value))
			return "";
		return $value;
	}

	/** 
	 * Get the number value of this {@link InputItem}.
	 * 
 	 * @since 3.010
	 * @return the number value of this {@link InputItem}.
	 */
	public function getNumber() {
		if (!is_numeric($this->value))
			return "";
		return $value;
	}

	/** 
	 * Get the array value of this {@link InputItem}.
	 * 
 	 * @since 3.010
	 * @return the array value of this {@link InputItem}.
	 */
	public function toBoolean() {
		if (!is_array($this->value))
			return "";
		return $value;
	}
}

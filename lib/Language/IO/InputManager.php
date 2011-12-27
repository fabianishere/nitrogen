<?php
namespace Language\IO;

if (!defined('FaabBB'))
	die;

/**
 * The {@link InputManager} class provides object oriented access to
 * 	to input variables from any {@link Request}.
 *
 * @category io
 * @version 3.010
 * @since 3.010
 * @copyright Copyright &copy; 2011, FaabTech
 * @author Fabian M.
 */
class InputManager {
	/**
	 * The {@link InputItem}s that are parsed by this {@link InputManager}.	
	 */
	protected $items = array();

	/**
	 * Get a {@link InputItem} by name from the 
	 * 	{@link InputManager#items} array.
	 * 
	 * @since 3.010
	 * @param $name The name of the {@link InputItem} to get.
	 * @return The value of this {@link InputItem}.
	 */
	public function get($name) {
		// TODO: Proper error handling when item doesn't exits.
		return isset($items[$name]) ?
			$items[$name] : false;
	}
}

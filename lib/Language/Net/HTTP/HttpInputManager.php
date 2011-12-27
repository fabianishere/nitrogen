<?php
namespace Language\Net\HTTP;

if (!defined('FaabBB'))
	die;

use Language\IO\InputManager as InputManager;
use Language\IO\InputItem as InputItem;

/**
 * The {@link HttpInputManager} class provides object oriented access to
 * 	to input variables from the {@link HttpRequest}.
 *
 * @category io
 * @version 3.010
 * @since 3.010
 * @copyright Copyright &copy; 2011, FaabTech
 * @author Fabian M.
 */
class HttpInputManager extends InputManager {

	/**
	 * Constructs a new {@link HttpInputManager}.
	 *
	 * @param $items The items of this {@link HttpInputManager}.	
 	 */
	public function __construct($items) {
		foreach($items as $item) {
			$this->items[] = new InputItem($items);
		}
	}
}

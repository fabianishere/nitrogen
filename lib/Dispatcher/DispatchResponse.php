<?php
namespace Dispatcher;

if (!defined('FaabBB'))
	die;

/**
 * The {@link DispatcherResponse} data class is the class that's returned
 * 	by the {@link Dispatcher#dispatch} method.
 * It contains data like name and action.
 *
 * @category dispatcher
 * @version 3.010
 * @since 3.010
 * @copyright Copyright &copy; 2011, FaabTech
 * @author Fabian M.
 */
class DispatchResponse {
	/**
 	 * Constructs a new {@link DispatchResponse} instance.
	 *
	 * @since 3.010
	 * @param $name The name that's found by the 
	 * 	{@link Dispatcher}.
	 * @param $action The action that's found by the 
	 * 	{@link Dispatcher}.	
	 */
	public function __construct($name = 'default', $action = 'default') {
		$this->name = $name;
		$this->action = $action;
	}
	/**
	 * The name that's found by the {@link Dispatcher}.
	 * <note>Field should be <string>default</string>, 
	 *	when no name is given.</note>
 	 */
	public $name = "default";

	/**
	 * The action that's found by the {@link Dispatcher}.
	 * <note>Field should be <string>default</string>, 
	 *	when no action is given.</note>
 	 */
	public $action = "default";
}

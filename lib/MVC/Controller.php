<?php
namespace MVC;

if (!defined('FaabBB'))
	die;

/**
 * The {@link Controller} provides a blueprint for a controller in FaabBB.
 * By using the {@link Controller}, you'll seperate the business logic from the 
 *  layout.
 * Actions are defined as function that starts with "action_" as name.
 *  When no action is given, the default will be used: <code>$this->action_default();</code>
 *
 * @category mvc
 * @version 3.010
 * @since 3.010
 * @copyright Copyright &copy; 2011, FaabTech
 * @author Fabian M.
 */
class Controller {
	/**
	 * The {@link Application} that is using this {@link Controller}.
	 */
	protected $application = null;
	
	/**
 	 * Constructs a new {@link Controller}.
	 *
	 * @param $application The {@link Application} of this {@link Controller}.
 	 */ 
	public function __construct($application) {
		$this->application = $application;
	}

	/**
	 * The default action that's called when no action
	 *  	is given.
	 */
	public function action_default() {

	}

}

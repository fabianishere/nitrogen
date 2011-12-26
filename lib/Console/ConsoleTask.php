<?php 
namespace Console;

if (!defined('FaabBB'))
	die;

use Task\Task as Task;

/**
 * The {@link ConsoleTask} class is the class that 
 * 	parse and handle the command line arguments.
 *
 * @category console
 * @version 3.010
 * @since 3.010
 * @copyright Copyright &copy; 2011, FaabTech
 * @author Fabian M.
 */
class ConsoleTask extends Task {
	/**
	 * Starts this task.
	 *
	 * @since 3.010
	 * @param $application The {@link Application} that tries to start
	 * 	this {@link Task}.
	 */
	public function start($application, $args) {
		// Parse Args.
	}
}

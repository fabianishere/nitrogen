<?php 
namespace Task;

if (!defined('FaabBB'))
	die;

/**
 * The {@link Task} class is a blueprint for a task in 
 * 	FaabBB.
 *
 * @category core
 * @version 3.010
 * @since 3.010
 * @copyright Copyright &copy; 2011, FaabTech
 * @author Fabian M.
 */
abstract class Task {
	/**
	 * Starts this task.
	 *
	 * @since 3.010
	 * @param $application The {@link Application} that tries to start
	 * 	this {@link Task}.
	 * @param $args Arguments of this {@link Task}.
	 */
	public abstract function start($application, $request, $response, $args);
}

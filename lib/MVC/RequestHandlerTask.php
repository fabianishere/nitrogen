<?php
namespace MVC;

if (!defined('FaabBB'))
	die;

use Task\Task as Task;

/**
 * The {@link RequestHandlerTask} handles incomming HTTP requests.
 *
 * @category mvc
 * @version 3.010
 * @since 3.010
 * @copyright Copyright &copy; 2011, FaabTech
 * @author Fabian M.
 */
class RequestHandlerTask extends Task {
	
	public function start($application, $request, $response, $args) {
		echo 'Task invoked.';
	}
}

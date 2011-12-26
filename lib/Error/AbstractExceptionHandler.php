<?php 
namespace Error;

if (!defined('FaabBB'))
	die;
	
/**
 * The {@link AbstractExceptionHandler} is a blueprint for a
 * 	exception handler.
 * It handles uncaught exceptions.
 * 
 * @category core
 * @version 3.010
 * @since 3.010
 * @copyright Copyright &copy; 2011, FaabTech
 * @author Fabian M.
 */
abstract class AbstractExceptionManager {
	/**
	 * Handles an uncaught exception.
	 * 	
	 * @since 3.010
	 * @param $error The uncaught exception to handle. 
	 */
	public function handle($exception);
}
 ?>

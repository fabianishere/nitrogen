<?php 
namespace Error;

if (!defined('FaabBB'))
	die;
	
/**
 * The {@link AbstractErrorHandler} is a blueprint for a
 * 	error handler.
 * It handles PHP errors.
 * 
 * @category core
 * @version 3.010
 * @since 3.010
 * @copyright Copyright &copy; 2011, FaabTech
 * @author Fabian M.
 */
abstract class AbstractErrorManager {
	/**
	 * Handles a PHP error.
	 * 	
	 * @since 3.010
	 * @param $error The PHP error to handle. 
	 */
	public function handle($error);
}
 ?>

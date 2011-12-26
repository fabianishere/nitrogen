<?php
namespace Dispatcher;

if (!defined('FaabBB'))
	die;

/**
 * The {@link DispatchListener} interface provides an interface for 
 * 	handling tasks after dispatching.
 *
 * @category dispatcher
 * @version 3.010
 * @since 3.010
 * @copyright Copyright &copy; 2011, FaabTech
 * @author Fabian M.
 */ 
interface DispatchListener {
	
	/**
	 * The {@link DispatchListener#handle} method allows users 
	 * 	to handle and process the {@link DispatchResponse} class.
	 *
	 * @since 3.010
	 * @param $response The {@link DispatchResponse} to handle and process.
	 */
	public function handle($response) {
	
	}
}

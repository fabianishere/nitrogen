<?php
namespace Dispatcher;

if (!defined('FaabBB'))
	die;

/**
 * The {@link Dispatcher} class dispatches the given
 * 	{@link HttpRequest} and translates it into a 
 * 	{@link DispatcherResponse}.
 *
 * @category dispatcher
 * @version 3.010
 * @since 3.010
 * @copyright Copyright &copy; 2011, FaabTech
 * @author Fabian M.
 */
class Dispatcher {

	/**
	 * Dispatches the given {@link HttpRequest} 
	 * 	and translates it into a 
 	 * 	{@link DispatcherResponse}..
	 *
	 * @since 3.010
	 * @param $request The {@link HttpRequest} to dispatch.
	 */
	public function dispatch($request) {

		return new DispatchResponse();
	}
}

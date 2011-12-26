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
	 * Array with registered {@link DispatchListener}s.
	 */
	protected $listeners = array();
	
	/**	
	 * Registers a {@link DispatchListener}.
	 *
	 * @since 3.010
	 * @param $listener The {@link DispatchListener} to register.
	 */
	public function addListener($listener) {
		if ($listener instanceof DispatchListener)
			array_push($this->listeners, $listener);
	}

	/**
	 * Invokes all {@link DispatchListener}s that are in 
	 * 	the {@link Dispatcher#listeners} array.
	 * 	
	 * @since 3.010
	 * @param $response The {@link DispatcherResponse}.
	 * @return $response
 	 */
	public function invoke($response) {
		if (!$response instanceof DispatcherResponse)
			return null;
		for ($this->listeners as $listener) {
			$listener->handle($response);

		return $response;
	}


	/**
	 * Dispatches the given {@link HttpRequest} 
	 * 	and translates it into a 
 	 * 	{@link DispatcherResponse}..
	 *
	 * @since 3.010
	 * @param $request The {@link HttpRequest} to dispatch.
	 */
	public function dispatch($request) {

		return $this->invoke(new DispatchResponse());
	}
}

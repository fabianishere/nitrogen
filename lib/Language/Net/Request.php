<?php
namespace Language\Net;

if (!defined('FaabBB'))
	die;

/**
 * The {@link Request} class provides a blueprint
 *  	for a incomming request.
 *
 * @category io
 * @version 3.010
 * @since 3.010
 * @copyright Copyright &copy; 2011, FaabTech
 * @author Fabian M.
 */
abstract class Request {
	/**
	 * The content of this {@link Request}.	
	 */ 
	protected $content = "";
	
	/**
	 * The length of the content of this {@link Request}.
	 */
	protected $length = 0;

	/**
	 * Returns the content of this {@link Request}.
	 *
	 * @since 3.010
	 * @return The content of this {@link Request}.
	 */
	public function getContent() {
		return $this->content;
	}

	/**
	 * Returns the length of the content of this {@link Request}.
	 *
	 * @since 3.010
	 * @return The length of the content of this {@link Request}.
	 */
	public function getLength() {
		return $this->length;
	}
	
}

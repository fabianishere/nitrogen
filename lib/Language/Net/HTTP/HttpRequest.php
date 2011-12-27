<?php
namespace Language\Net\HTTP;

if (!defined('FaabBB'))
	die;

use Language\Net\Request as Request;

/**
 * The {@link HttpRequest} class provides a object oriented
 * 	wrapper for a HTTP request in PHP.
 *
 * @category io
 * @version 3.010
 * @since 3.010
 * @copyright Copyright &copy; 2011, FaabTech
 * @author Fabian M.
 */
class HttpRequest extends Request {
	/**
	 * The method of this {@link HttpRequest}.
	 */
	protected $method = "GET";

	/**
	 * The request-URI of this {@link HttpRequest}.
	 */
	protected $requestURI = "";

	/**
	 * The name and revision of the information protocol via 
	 * 	which the page was requested of this {@link HttpRequest}.
	 */
	protected $protocol = "HTTP/1.0";

	/**
	 * The GET variables of this {@link HttpRequest}.
	 */ 
	protected $get = null;

	/**
	 * The POST variables of this {@link HttpRequest}.
	 */
	protected $post = null;

	/**
	 * The COOKIE variables of this {@link HttpRequest}.
	 */
	protected $cookies = null;


	/**
	 * Constructs a new {@link HttpRequest}.
	 * 
	 * @param $method The method of this {@link HttpRequest}.
	 * @param $requestURI The request-URI of this {@link HttpRequest}.
	 * @param $protocol The protocol of the {@link HttpRequest}.
	 * @param $get The GET variables of this {@link HttpRequest}.
	 * @param $post The POST variables of this {@link HttpRequest}.
	 * @param $cookies The COOKIE variables of this {@link HttpRequest}.
 	 */
	public function __construct($method = "GET", $requestURI = "", 
		$protocol = "HTTP/1.0", $arguments = array(), $post = array(), 
	 	$cookies = array()) {

		$this->method = $method;
		$this->requestURI = $requestURI;
		$this->protocol = $protocol;
		$this->get = new HttpInputManager($arguments);
		$this->post = new HttpInputManager($post);
		$this->cookies = new HttpInputManager($cookies);
	}

	/**
	 * Returns the method of this {@link HttpRequest}.
	 * 
	 * @version 3.010
	 * @return The method of this {@link HttpRequest}.
	 */
	public function getMethod() {
		return $this->method;
	}

	/**
	 * Returns the request-URI of this {@link HttpRequest}.
	 * 
	 * @version 3.010
	 * @return The request-URI of this {@link HttpRequest}.
	 */
	public function getRequestURI() {
		return $this->requestURI;
	}

	/**
	 * Returns the protocol of this {@link HttpRequest}.
	 * 
	 * @version 3.010
	 * @return The protocol of this {@link HttpRequest}.
	 */
	public function getProtocol() {
		return $this->protocol;
	}
	

	/**
  	 * Returns the GET variables of this {@link HttpRequest}.
	 *
 	 * @since 3.010
	 * @return The GET variables of this {@link HttpRequest}.
	 */
	public function getGetVariables() {
		$this->get;
	}

	/**
  	 * Returns the POST variables of this {@link HttpRequest}.
	 *
 	 * @since 3.010
	 * @return The POST variables of this {@link HttpRequest}.
	 */
	public function getPostVariables() {
		$this->post;
	}

	/**
  	 * Returns the COOKIE variables of this {@link HttpRequest}.
	 *
 	 * @since 3.010
	 * @return The COOKIE variables of this {@link HttpRequest}.
	 */
	public function getCookies() {
		$this->cookies;
	}


}

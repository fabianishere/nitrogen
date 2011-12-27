<?php
namespace Language\Net\HTTP;

if (!defined('FaabBB'))
	die;

/**
 * The Method property of a {@link HttpRequest} indicates the method to be 
 *	performed on the resource identified by the Request-URI. 
 * The method is case-sensitive.
 * 
 * @category http
 * @version 3.010
 * @since 3.010
 * @copyright Copyright &copy; 2011, FaabTech
 * @author Fabian M.
 */
class Method {
	/**
	 * The GET method of a {@link HttpRequest}.
	 */
	public static $GET = "GET";
	
	/**
	 * The POST method of a {@link HttpRequest}.
	 */
	public static $POST = "POST";
}

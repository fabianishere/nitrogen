<?php 
namespace Language;

if (!defined('FaabBB'))
	die;
use Language\Net\HTTP\HttpRequest as HttpRequest;
/**
 * Every FaabBB application has a single instance of class {@link Runtime} that 
 *	allows the application to interface with the environment in 
 * 	which the application is running
 *
 * @category language
 * @version 3.010
 * @since 3.010
 * @copyright Copyright &copy; 2011, FaabTech
 * @author Fabian M.
 */
class Runtime {
	
	/**
	 * Array with properties of this {@link Runtime}.
	 */
	protected $properties = array();

	/**
	 * The {@link HttpRequest} of this {@link Runtime}.	
	 */
	protected $request = null;

	/**
	 * Constructs a new {@link Runtime} instance.
	 */
	public function __construct() {
		$this->properties = $_SERVER;
		$this->request = new HttpRequest($this->properties['REQUEST_METHOD'],
			$this->properties['REQUEST_URI'], 
			$this->properties['SERVER_PROTOCOL'],
			$_GET, $_POST, $_COOKIE);
	}

	/**
	 * Returns the filename of the currently executing script.	
	 *
	 * @since 3.010
	 * @return The filename of the currently executing script.
	 */
	public function getSelf() {
		return $this->properties['PHP_SELF'];
	}
	
	/**
	 * Returns the array of arguments passed to the script. When the script 
	 * 	is run on the command line, 
	 *	this gives C-style access to the command line parameters. 
	 * When called via the GET method, this will contain the query string.
	 *
 	 * @since 3.010
	 * @return The array of arguments passed to the script.
 	 */
	public function getArguments() {
		return $this->properties['args'];
	}

	/**
	 * Returns the document root directory under which the current script is executing.
	 * 
 	 * @since 3.010
	 * @return The document root directory under which the current script is executing.
	 */
	public function getRoot() {
		return $this->properties['DOCUMENT_ROOT'];
	}

	/**
	 * Returns the current {@link HttpRequest} of this {@link Runtime}.
	 *
	 * @since 3.010
	 * @return The current {@link HttpRequest} of this {@link Runtime}.
 	 */ 
	public function getRequest() {
		return $this->request;
	}
}

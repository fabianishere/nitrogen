<?php 
namespace Error;

if (!defined('FaabBB'))
	die;
	
/**
 * The {@link AbstractErrorFactory} class provides
 * 	the {@link AbstractErrorHandler} and {@link AbstractExceptionHandler}
 * 	for the core.
 *  
 * @category error
 * @version 3.010
 * @since 3.010
 * @copyright Copyright &copy; 2011, FaabTech
 * @author Fabian M.
 */
abstract class AbstractErrorManager {
	
	/**
	 * Constructs a new {@link AbstractErrorManager}.
	 *
	 * @param $errorHandler The {@link AbstractErrorHandler} of this class.
	 * @param $exceptionHandler The {@link AbstractExceptionHandler} of this class.
	 */
	public function __construct($errorHandler = null, $exceptionHandler = null) {
		$this->errorHandler = $errorHandler;
		$this->exceptionHandler = $exceptionHandler;
	}
	
	/**
	 * The {@link AbstractErrorHandler} of this class.
	 */
	protected $errorHandler = null;

	/**
	 * The {@link AbstractExceptionHandler} of this class.
	 */
	protected $exceptionHandler = null;

	/**
	 * Returns the {@link AbstractErrorHandler} of this class.
	 *
	 * @since 3.010
	 * @return the {@link AbstractErrorHandler} of this class.
	 */
	public function getErrorHandler() {
		return $this->errorHandler;
	}

	/**
	 * Returns the {@link AbstractExceptionHandler} of this class.
	 *
	 * @since 3.010
	 * @return the {@link AbstractExceptionHandler} of this class.
	 */
	public function getExceptionHandler() {
		return $this->exceptionHandler;
	}
	
	
}
?>

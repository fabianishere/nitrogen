<?php 
namespace Logging;

if (!defined('FaabBB'))
	die;
	
use Logging\Formatter as Formatter;
	
/**
 * A {@link Handler} takes log messages from the {@link Logger} and
 * 	exports them.
 * 
 * 
 * @category logging
 * @version 3.010
 * @since 3.010
 * @copyright Copyright &copy; 2011, FaabTech
 * @author Fabian M.
 */
abstract class Handler {
	
	/**
	 * The {@link Formatter} of this {@link Handler}.
	 */	
	protected $formatter;
	
	/**
	 * Set the {@link Formatter} of this {@link Handler}.
	 * 
	 * @since 3.010
	 * @param $formatter The {@link ErrorFormatter} to set.
	 */
	public function setFormatter($formatter) {
		!($formatter instanceof Formatter) or $this->formatter = $formatter;
	}
	
	/**
	 * Get the {@link Formatter} of this {@link Handler}.
	 * 
	 * @since 3.010
	 * @return the {@link Formatter} of this {@link Handler}.
	 */
	public function getFormatter() {
		return $this->formatter;
	}
	
	/**
	 * Publish the given {@link LogRecord}.
	 * 
	 * @since 3.010
	 * @param $logRecord The {@link LogRecord} to publish.
	 */
	public abstract function publish($logRecord);

}
 ?>
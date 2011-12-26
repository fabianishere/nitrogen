<?php 
namespace Logging;

if (!defined('FaabBB'))
	die;
	
use Logging\Handler as Handler;
use Logging\Formatter as Formatter;
use Logging\SimpleFormatter as SimpleFormatter;
	
/**
 * The {@link ConsoleHandler} is the default {@link Handler} that outputs all 
 * 	{@link LogRecord}s to STDIO.
 * 
 * 
 * @category logging
 * @version 3.010
 * @since 3.010
 * @copyright Copyright &copy; 2011, FaabTech
 * @author Fabian M.
 */
class ConsoleHandler {
	
	/**
	 * Creates a new {@link OutputHandler} instance.
	 */
	public function __construct() {
		$this->formatter = new SimpleFormatter();
	}
	
	/**
	 * Publish the given {@link LogRecord}.
	 * 
	 * @since 3.010
	 * @param $logRecord The {@link LogRecord} to publish.
	 */
	public function publish($logRecord) {
		echo $this->formatter->format($logRecord);
	}

}
 ?>

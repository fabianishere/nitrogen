<?php 
namespace Logging;

if (!defined('FaabBB'))
	die;
	
/**
 * The {@link Formatter} is a blueprint for a formatter.
 * 
 * @category logging
 * @version 3.010
 * @since 3.010
 * @copyright Copyright &copy; 2011, FaabTech
 * @author Fabian M.
 */
interface Formatter {
	
	/**
	 * Formats the given {@link LogRecord}
	 * 
	 * @since 3.010
	 * @param $logRecord The {@link LogRecord} to format.
	 */
	public function format($logRecord);

}
 ?>
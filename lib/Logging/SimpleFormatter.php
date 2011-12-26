<?php 
namespace Logging;

if (!defined('FaabBB'))
	die;
	
use Logging\Formatter as Formatter;
	
/**
 * The {@link SimpleFormatter} formats {@link LogRecord}s in
 * 	messages like this:
 * 	
 * 	<code>
 * 		Dec 6, 2011 4:20:10 PM myClass doSomething 
 * 		SEVERE: this is severe 
 *  </code>
 * 
 * @category logging
 * @version 3.010
 * @since 3.010
 * @copyright Copyright &copy; 2011, FaabTech
 * @author Fabian M.
 */
class SimpleFormatter implements Formatter {
	
	/**
	 * Formats the given {@link LogRecord}
	 * 
	 * @since 3.010
	 * @param $logRecord The {@link LogRecord} to format.
	 */
	public function format($logRecord) {
		$stackFrames = $logRecord->getStackFrames();
		$stackFrame = $stackFrames[0];
		$className = isset($stackFrame) ? $stackFrame->getClassName() : "";
		$functionName = isset($stackFrame) ? $stackFrame->getFunctionName() : "";
		$level = $logRecord->getLevel();
		
		
		$str = gmdate(DATE_RFC822) . ' ' . $className . ' ' .
			$functionName . "\n" . $level['name'] . ': ' . $logRecord->getMessage() .
				"\n"; 
			
		return $str;
	}

}
 ?>
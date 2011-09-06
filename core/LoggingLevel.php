<?php
if (!defined('FaabBB'))
	exit();

/**
 * The {@link CoreLoggingLevel} class defines a set of standard logging levels.
 * You should use the pre-defined level constants such as <code>CoreLoggingLevel::SEVERE</code>
 * The levels in descending order are: 
 * <ul>
 *  <li>SEVERE (highest value)</li>
 *  <li>WARNING</li>
 *  <li>INFO</li>
 *  <li>CONFIG</li> 
 *  <li>FINE (lowest value)</li>
 * </ul>
 * 
 * @category Core Logging
 * @version Version 3.006 ALPHA
 * @copyright Copyright &copy; 2011, FaabTech
 * @author Fabian M.
 */
 class CoreLoggingLevel {
 	
 	/**
 	 * CONFIG is a message level for static configuration messages.
 	 */
 	 const CONFIG = 'CONFIG';
 	 
 	 /**
 	  * FINE is a message level providing tracing information.
 	  */
 	 const FINE = 'FINE';
 	 
 	 /**
 	  * INFO is a message level for informational messages.
 	  */
 	 const INFO = 'INFO';
 	 
 	 /**
 	  * SEVERE is a message level indicating a serious failure.
 	  */
 	 const SEVERE = 'SEVERE';
 	 
 	 /**
 	  * WARNING is a message level indicating a potential problem.
 	  */
 	 const WARNING = 'WARNING';
 	 
 
 	 
 }

?>
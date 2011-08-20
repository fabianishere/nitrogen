<?php
if (!defined('FaabBB'))
	exit();
	
include_once(CLASSES_FOLDER . DS . 'php' . DS .
	'lang' . DS . 'Object' . PHP_SUFFIX);
include_once(CLASSES_FOLDER . DS  . 'org' . DS . 'faabtech' . DS .
	'mvc' . DS .  'MVCBootstrap' . PHP_SUFFIX);

/**
 * The {@link FaabBB} class is the <code>main</code> class of the FaabBB application,
 * 	<b>not</b> the <code>core</code>.
 * 
 * @version Version 3.009 ALPHA
 * @copyright Copyright &copy; 2011, FaabTech
 * @author Fabian M.
 */
class FaabBB extends Object {
	
	/**
	 * Main execution method.
	 * @param args The arguments.
	 */
	public static function main($args) {
		MVCBootstrap::init();
	}
	
}
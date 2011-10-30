<?php
namespace org\faabtech\faabbb;

if (!defined('FaabBB'))
	exit();

use php\lang\Object as Object;

/**
 *
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
		echo "My simple application.";
	}

}

?>
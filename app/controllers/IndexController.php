<?php
if (!defined('FaabBB'))
	exit();

use org\faabtech\faabbb\mvc\Controller as Controller;

/**
 * The first written FaabBB {@link Controller}.
 *
 * @category Examples
 * @version Version 3.009 ALPHA
 * @copyright Copyright &copy; 2011, FaabTech
 * @author Fabian M.
 */
class IndexController extends Controller {

	public $aliases = 'index';

	function defaultAction() {
		$str = new String("!! Hello world !!");
		echo $str->toUppercase();
	}

}



?>
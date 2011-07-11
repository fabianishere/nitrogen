<?php 
include(dirname(__FILE__) . "/Core.class.php");

if (!defined('FaabBB'))
	exit();
	
/** @Deprecated */
abstract class Page extends Core {
	
	/**
	 * The import block.
	 * Imports will be added here.
	 */
	function load() {}
	
	/**
	 * Main execution method of the program.
	 */
	function main() {}

	
}
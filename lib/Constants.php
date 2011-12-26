<?php 
if (!defined('FaabBB'))
	die;

/**
 * The {@link Constants} class contains constant variables 
 * 	with a constant value that never can be changed at runtime.
 * We are not using the 'const' keyword neither the 'define' function,
 *  since class properties are faster.
 *  
 * @category core
 * @version 3.010
 * @since 3.010
 * @copyright Copyright &copy; 2011, FaabTech
 * @author Fabian M.
 */
class Constants { 
	/**
	 * The name of this product.
	 */
	public static $PRODUCT = "FaabBB Framework";
	
	/**
	 * The version of this product.
	 */
	public static $VERSION = "3.010";
	
	/**
	 * The description of this product.
	 */
	public static $DESCRIPTION = "Webdevelopment framework written in PHP.";
	
}

?>

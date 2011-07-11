<?php 
if (!defined('FaabBB'))
	exit();
/**
 * A PrintStream adds functionality to another output stream, 
 * namely the ability to print representations of various data values conveniently. 
 * @author Fabian M.
 */
abstract class PrintSteam extends Object {
	
	/**
	 * Print a message
	 * @param $str the message to print
	 */
	abstract function printn($str);
	
	/**
	 * Print a message
	 * @param $str the message to print
	 */
	abstract function println($str);
	
	/**
	 * Print a message
	 * @param $str the message to print
	 */
	abstract function printf($str);
	
	/**
	 * Print a message
	 * @param $str the message to print
	 */
	abstract function printr($str);
	
}
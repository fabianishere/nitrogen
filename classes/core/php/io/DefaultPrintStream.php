<?php 
if (!defined('FaabBB'))
	exit();
/**
 * Default printsteam.
 * @author Fabian M.
 */
class DefaultPrintStream extends PrintSteam {
	 	
	   
		/** @Override */
	 	public function println($str) {
	 			echo $str . '<br />';
	 	}
	 	
  	  
		/** @Override */
	 	public function printn($str) {
	 			print($str);
	 	}
	 	
       
		/** @Override */
	 	public function printf($str) {
	 			printf($str);
	 	}
	 	
		/** @Override */
	 	public function printr($str) {
	 			print_r($str);
	 	}

}
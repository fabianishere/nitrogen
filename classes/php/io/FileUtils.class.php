<?php 
/** 
 * Copyright (c) 2011 FaabTech <faabtech.com>
 *
 * More information about FaabBB may be found on these websites:
 *    http://faabtech.com/faabbb
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 *
 */


class FileUtils {
	
	/**
	 * Get array with files in directory.
	 * @param $directory the directory 
	 * @return array with files.
	 */
	static function getDirectoryList ($directory) {

   	 	// create an array to hold directory list
   	 	$results = array();
	
    	// create a handler for the directory
    	$handler = opendir($directory);
    	
    	if (!$handler)
    		return NULL;

    	// open directory and walk through the filenames
    	while ($file = readdir($handler)) 
			if ($file != "." && $file != "..") 
        		$results[] = $directory . "/" . $file;
    
      

    

    	// tidy up: close the handler
    	closedir($handler);

    	// done!
    	return $results;
	}
	
	/**
	 * Get contents
	 * @param $file the file
	 * @return contents
	 */
	static function getContents($file) {
		if (!file_exists($file)) 
			System::systemDie(array('File doesnt exists: ' . $file));
		return file_get_contents($file);
	}
}
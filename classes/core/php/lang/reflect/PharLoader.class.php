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

if (!defined('FaabBB'))
	exit();
	
/**
 * Loader for PHP archive files.
 * @author Fabian M.
 */
class PharLoader {
	
	/**
	 * Loads a new Phar File.
	 * @param $file The archive to load.
	 */
	public static function load($file) {
		if (!($file instanceof File))
		    return;
		$zip = zip_open($file->getPath());
		if (!$zip)
			return;
		while ($zip_entry = zip_read($zip)) {
			$name = zip_entry_name($zip_entry);
    		$info = pathinfo($name);
    		if ($info['extension'] != 'php')
    			continue;

    		$tmpfname = tempnam(sys_get_temp_dir(), ".paf");

			$handle = fopen($tmpfname, "w");
    		if (!$handle)
    			Core::terminate();
		 	if (zip_entry_open($zip, $zip_entry)) {
      				$contents = zip_entry_read($zip_entry, zip_entry_filesize($zip_entry));
      				zip_entry_close($zip_entry);
      				if (!(fwrite($handle, $contents))) 
     					Core::terminate();
     				include($tmpfname);
     				fclose($handle);
 				unlink($tmpfname);
    
      			}
    		
		}
		zip_close($zip);
	}
	
}
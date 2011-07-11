<?php 
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
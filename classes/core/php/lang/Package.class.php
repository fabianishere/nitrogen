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
 * Represents a package, used for importing. 
 * @author Fabian M.
 */
class Package {
	
	
	/**
	 * The absolute path of this package.
	 */
	private $path = '';
	


	
	/**
	 * Constructs a new package.
	 * @param $path The path of this package.
	 * @param $str  A String representation of this Package.
	 */
	function __construct($path) {
		$this->path = $path;
	}
	
	/**
	 * Get a file in the package.
	 * @param $name the name of this file.
	 * @return a new package instance.
	 */
	function __get($name) {
		if ($name == "path")
			return;
		$file = $this->path . '/' . $name;
		// Does the file exists?
		if (!file_exists($file . '.class.php') && !file_exists($file)) {
			Core::terminate();
		}
		
		$file = file_exists($file . '.class.php') ? $file . '.class.php' : $file;
		
		return new Package($file);
	}
	
	/**
	 * Returns the path of the file.
	 * @return the path.
	 */
	function getPath() {
		return $this->path;
	}
	
}
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

/**
 * Represents a package, used for importing. 
 * @author Fabian M.
 */
class Package {
	
	
	/**
	 * The path of this package.
	 */
	private $path = '';
	
	/**
	 * Constructs a new package.
	 * @param path the path of this package.
	 */
	function __construct($path) {
		$this->path = $path . '/';	
	}
	
	/**
	 * Get a file in the package.
	 * @param $get the name of this file.
	 * @return a new package instance.
	 */
	function __get($get) {
		$file = $this->path . $get;
		// Does the file exists?
		if (!file_exists($filename . '.class.php') && !file_exists($filename)) {
			System::systemDie(array('File ' . $file . ' doesn\'t exists.'));
		}
		
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
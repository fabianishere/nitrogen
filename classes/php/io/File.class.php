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
 * Represents a file.
 * @author Fabian M.
 */
class File {
	
	/**
	 * The path to the file.
	 */
	private $path;
	
	/**
	 * Information of this file.
	 */
	private $info;
	
	/**
	 * Constructs a new file.
	 * @param path The the path the file.
	 */
	public function __construct($path) {
		$this->path = $path;
		$this->info = pathinfo($path);
	}
	
  	/**
  	 * Tests whether the file or directory denoted by this abstract pathname exists.
  	 * @return <code>true</code> when the file exists,
  	 * 	<code>false</code> when the file doesn't exists.
  	 */
	public function exists() {
		return file_exists($this->path);
	}
	
	/**
	 * Returns the absolute pathname string of this abstract pathname.
	 * @return $path
	 */
	public function getPath() {
		return $this->path;
	}
	
	/** @Override */
	public function __toString() {
		return $this->path;
	}
	
	/**
	 * Returns the extension string of this abstract pathname.
	 * @return The extension.
	 */
	public function getExtension() {
		return $this->$info['extension'];
	}
	
	/**
	 * Returns the dirname string of this abstract pathname.
	 * @return The dirname.
	 */
	public function getDirname() {
		return $this->$info['dirname'];
	}
    /**
	 * Returns the basename string of this abstract pathname.
	 * @return The basename.
	 */
	public function getBasename() {
		return $this->$info['basename'];
	}
    /**
	 * Returns the filename string of this abstract pathname.
	 * @return The filename.
	 * @since 5.2.0
	 */
	public function getFilename() {
		return $this->$info['filename'];
	}

}
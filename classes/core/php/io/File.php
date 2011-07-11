<?php 
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
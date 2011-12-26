<?php 
namespace Logging;

if (!defined('FaabBB'))
	die;
	
use Logging\Handler as Handler;
use Logging\Formatter as Formatter;
use Logging\SimpleFormatter as SimpleFormatter;
	
/**
 * The {@link FileHandler} exports the {@link LogRecord} to the
 * 	given file.
 * 
 * 
 * @category logging
 * @version 3.010
 * @since 3.010
 * @copyright Copyright &copy; 2011, FaabTech
 * @author Fabian M.
 */
class FileHandler {
	
	/**
	 * The file of this {@link FileHandler}.
	 */
	protected $file = "";
	
	/**
	 * The max size of the file.
	 */
	protected $maxSize = 1000;
	
	/**
	 * The file stream for this file.
	 */
	protected $fileStream = null;
		
	/**
	 * Creates a new {@link FileHandler} instance.
	 */
	public function __construct($file, $maxSize = 1000) {
		$this->formatter = new SimpleFormatter();
		$this->file = $file;
		$this->maxSize = $maxSize;
		$this->fileStream = fopen($file, (!is_readable($file) || filesize($file)
			> $maxSize ? 'w+' : 'a+'));
	}
	
	/**
	 * Publish the given {@link LogRecord}.
	 * 
	 * @since 3.010
	 * @param $logRecord The {@link LogRecord} to publish.
	 */
	public function publish($logRecord) {
		if ($this->fileStream)
			fwrite($this->fileStream, $this->formatter->format($logRecord));
	}

}
 ?>
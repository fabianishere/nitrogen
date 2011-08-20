<?php
if (!defined('FaabBB')) 
	exit();
	
/**
 * The {@link CoreConfiguration} will load the configuration file ("$root/data/core.ini.php"),
 * 	read it and parses it. After that, the settings will be defined as constants. When no configuration file exists,
 * 	we'll load the default configuration.
 * 
 * @category Core configuration.
 * @version Version 3.009 ALPHA
 * @copyright Copyright &copy; 2011, FaabTech
 * @author Fabian M.
 */
class CoreConfiguration {
	
	/**
	 * Contains all the found keys and values.
	 */
	private $list;
	
	/**
	 * The {@link CoreConfiguration} instance.
	 */
	private static $instance = null;
	
	/**
	 * Get the {@link CoreConfiguration} instance.
	 */
	public static function getInstance() {
		return self::$instance == null ? self::$instance = new CoreConfiguration() 
			: self::$instance;
	}
	
	/**
	 * Initializes the {@link CoreConfiguration} class.
	 */
	public function init() {
		if (!file_exists(CONFIGURATION_FOLDER)) {
			CoreLogger::info("No configuration folder found.");
			return;
		}
		
	
		$iterator = new DirectoryIterator(CONFIGURATION_FOLDER);
		
		foreach($iterator as $file) {
			if ($file->isFile()) {
				$info = pathinfo(CONFIGURATION_FOLDER . DS . $file);
				if ($info['extension'] != 'php')
					continue;
				$this->parse(CONFIGURATION_FOLDER . DS . $file);
			}
		}
	}
	
	/**
	 * Parses <code>$file</code>.
	 */
	private function parse($file) {
		$exists = file_exists($file);
		
		if ($exists) {
			CoreLogger::info("Found configuration file: " . $file);
			CoreLogger::info("Parsing configuration file.");
			$content = file_get_contents($file);	
			$key = null;
			$value = null;
			$inKey = true;
			$inValue = false;
			$split = explode("\n", $content);
			
			
			foreach($split as $line) {
				if ((substr($line, 0, 1) == ";") || empty($line)) {
					continue;
				} else {
					foreach(str_split($line) as $char) {
						if ($inKey && !$inValue && $char != ' ') {
							if ($key == null)
								$key = "";
							$key .= $char;
						} else if($inKey && !$inValue && $char == ' ') { 
							$inKey = false;
						} else if (!$inKey && !$inValue && $char == '=') { 
							$inValue = true;
						} else if (!$inKey && $inValue && $char != ' ') {
							if ($value == null)
								$value = "";
							$value .= $char;
						} else {
							continue;
						}
					}
					if ($value != null) {
						if (!defined($key)) {
							CoreLogger::config($key . "=" . $value);
							$this->list[$key] = $value;
						}
						
					}
					$key = null;
					$value = null;
					$inKey = true;
					$inValue = false;
				}
			}
			
		} 
		CoreLogger::info("Configuration file " . $file . " loaded.");
	}
	
	public function __get($key) {
		return isset($this->list[$key]) ? $this->list[$key] : null;
	}
	
}


?>
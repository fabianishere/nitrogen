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
	 * Initializes the {@link CoreConfiguration} class
	 */
	public function init() {
		$exists = file_exists(CONFIGURATION_FILE);
		
		if ($exists) {
			CoreLogger::info("Found configuration file: " . CONFIGURATION_FILE);
			CoreLogger::info("Parsing configuration file.");
			$content = file_get_contents(CONFIGURATION_FILE);	
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
							CoreLogger::info("Constant: " . $key . "=" . $value);
							$this->list[$key] = $value;
						}
						
					}
					$key = null;
					$value = null;
					$inKey = true;
					$inValue = false;
				}
			}
		} else {
			CoreLogger::warning("No configuration file found, loading default configuration.");
			include(CORE_FOLDER . DS . 'DefaultCoreConfiguration' . PHP_SUFFIX);
			return;
		}
		CoreLogger::info("Configuration loaded.");
	}
	
	public function __get($key) {
		return $this->list[$key];
	}
	
}


?>
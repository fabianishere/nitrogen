<?php 
namespace Core;

if (!defined('FaabBB'))
	die;
	
define('CORE_CONFIGURATION_FILE', LIB_FOLDER . '/Data/config.ini');
define('CORE_LOG_FILE', LIB_FOLDER . '/Data/core.log');
	
use \Constants as Constants;

use Language\Runtime as Runtime;

use Configuration\ConfigurationManager as ConfigurationManager;
use Configuration\ConfigurationException as ConfigurationException;

use Logging\Logger as Logger;
use Logging\FileHandler as FileHandler;

use MVC\RequestHandlerTask as RequestHandlerTask;
	
/**
 * The {@link Application} class is a container for
 * 	multiple classes.
 * 
 * 
 * @category core
 * @version 3.010
 * @since 3.010
 * @copyright Copyright &copy; 2011, FaabTech
 * @author Fabian M.
 */
class Application {
	
	/**
	 * {@link Runtime} of this application.
	 */	
	protected $runtime = null;

	/**
	 * {@link Task}s of this {@link Application}.
	 */
	protected $tasks = array();
	
	/**
	 * The {@link ConfigurationManager} of this class.
	 */
	protected $config = array();
	
	/**
	 * The {@link Logger} of this class.
	 */
	protected $logger = null;
	
	/**
	 * Initializes the {@link Application} class.
	 * 
	 * @since 3.010
	 * @return A new {@link Application} instance.
	 */
	public static function init() {
		return new Application();
	}
	
	/**
	 * Returns the {@link Runtime} of this class.
	 * 
  	 * @since 3.010
	 * @return The {@link Runtime} of this class.
	 */
	public function getRuntime() {
		return $this->runtime;
 	}

	/**
	 * Returns the {@link ConfigurationManager} of this class.
	 * 
  	 * @since 3.010
	 * @return The {@link ConfigurationManager} of this class.
	 */
	public function getConfiguration() {
		return $this->config;
 	}
	
	
	/**
	 * Constructs a new {@link Application} instance.
	 */
	public function __construct($logging = true) {
		$this->runtime = new Runtime();
		$this->logger = new Logger("core");
		if ($logging)
			$this->logger->addHandler(new FileHandler(CORE_LOG_FILE));
		$this->logger->info(Constants::$PRODUCT . ' version ' . 
			Constants::$VERSION . "\n" . Constants::$DESCRIPTION);
	}
	
	/**
	 * Starts the {@link Task} by the given name.
	 *
	 * @since 3.010
 	 * @param $name The name of the {@link Task} to start.
	 * @param $args The arguments to give to this {@link Task}.
	 */
	public function launch($name = "default", $args = array()) {
		!isset($this->tasks[$name]) or
			$this->tasks[$name]->start($this, $this->runtime->getRequest(),
				null, $args); 
	}
	/**
	 * Bind the given {@link Task} to the given
	 * 	name.
	 * Manager
	 * @since 3.010
	 * @param $name The name of this task.
	 * @param $task The {@link Task} to set.
	 */
	public function bind($name, $value) {
		if (is_string($name)) {
			$this->tasks[$name] = $value;
		} else if (is_array($name) && is_array($value)) {
			for ($i = 0; $i < count($name); $i++) {
				$this->tasks[$name[i]] = $value[i];
			}
		}
	}
	
	/**
	 * Configure this {@link Application} instance using the given
	 * 	{@link ConfigurationManager}.
	 * 
	 * @since 3.010
	 * @param $configurationManager The {@link ConfigurationManager} to configure
	 * 	this application with.
	 */
	public function configure($configurationManager = null) {
		if ($configurationManager == null ||
			$configurationManager instanceof ConfigurationManager) {

			$configurationManager = 
				new ConfigurationManager(CORE_CONFIGURATION_FILE);
		}
		$this->config = $configurationManager;
		
		// Configure the application here.
		!isset($this->config['cli_task']) or $this->bind('cli', 
			new $this->config['cli_task']);
		isset($this->config['default_task']) ? $this->bind('default', 
			new $this->config['default_task']) : 
		$this->bind('default', new RequestHandlerTask());
	}
	
}
?>

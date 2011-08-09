<?php
/**
 * Contains <code>core</code> configuration, like contant variables.
 * When defining a constant, remember they are constantly the same, so you 
 * 	may not change the the value at runtime. 
 */

define('FaabBB_VERSION', '3.006 ALPHA');
define('CORE_LOG_FILE', CORE_FOLDER .  DS . '..' . DS . 'data' . DS . 'logs' . DS . 'core.log');
define('CORE_LIBRARY_FOLDER', CORE_FOLDER . DS . 'lib');
define('ERROR_HANDLING_METHOD', "CoreErrorHandler::onError");
define('EXCEPTION_HANDLING_METHOD', "CoreErrorHandler::onException");
define('SHUTDOWN_HANDLING_METHOD', "CoreErrorHandler::onShutdown");
define('DEVELOPER_MODE', true)

?>
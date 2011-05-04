<?php

/** 
 * Copyright (c) 2010 Fabian M <fabian.m@faabtech.com>
 *
 * More information about FaabBB may be found on these websites:
 *     http://faabtech.com/faabbb
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

System::registerImport("sources/xmlscript/class.php");
System::registerClass("php.io.File");


class Plugin {
	
	/**
	 * File
	 */
	private $file;
	
	/**
	 * Hooks
	 */
	private $hooks;
	
	/**
	 * XML
	 */
	private $xml;
	
	/**
	 * The XMLScript functions
	 */
	private $xmlfunctions;
	

	
	/**
	 * The constructor.
	 */ 
	function __construct($file) {
		$this->file = $file;
		libxml_use_internal_errors(true);
		$this->xml = simplexml_load_file($this->file);
		$errors = array();
		if (!$this->xml) {
   			foreach(libxml_get_errors() as $error) 
   				$errors[count($errors) + 1] = $error->message;
   			System::systemDie($errors);
		}
		
	
   				
   		
   		
   		
	}
	
	/**
	 * Is Plugin?
	 * @return <code>true</code> if this is a plugin otherwise <code>false</code>
	 */
	function isPlugin() {
			return $this->xml->plugin == null ? false : true;
	}
	/**
	 * Get the xml
	 * @return the xml
	 */
	 function getXML() {
		 return $this->xml; 
	 }
	 
	 
	 /**
	  * Get name
	  * @return the name
	  */
	 function getName() {
		return $this->xml->product->name == NULL ? "" : $this->xml->product->name;
	 }
	 
	 /**
	  * Get author
	  * @return the author
	  */
	 function getAuthor() {
		return $this->xml->product->author == NULL ? "" : $this->xml->product->author;
	 }
	 
	 /**
	  * Get description
	  * @return the description
	  */
	 function getDescription() {
		return $this->xml->product->description == NULL ? "" : $this->xml->product->description;
	 }
	
     /**
	  * Get version
	  * @return the version
	  */
	 function getVersion() {
		return $this->xml->product->version == NULL ? "" : $this->xml->product->version;
	 }
	 
	 /**
	  * Get hooks
	  * @return array with hooks
	  */
	 function getHooks() {
	 	/**
	 	 * Does the xml contains any hook
	 	 */
	 	if ($this->xml->plugin->hooks == null)
	 		return array();
	 	/**
	 	 * $hooks
	 	 * Array contains the hooks
	 	 * @var array
	 	 */
	 	$hooks = array();
	 	
	 	if (is_array($this->xml->plugin->hooks->hook)) 
	 		return array($this->xml->plugin->hooks->hook);
	 	/**
	 	 * Foreach loop
	 	 */
	 	foreach($this->xml->plugin->hooks->hook as $hook => $hookValue) {
	 		/**
	 		 * Add to hooks array
	 		 */
	 		
	 		$hooks[count($hooks) + 1 ] = $hookValue;
	 	}
	 	/**
	 	 * Return the hooks
	 	 */
	 	return $hooks;
	 }
	 
	 /**
	  * Get the includes
	  * Gives an array with includes
	  * @return array with includes.
	  */
	 function getIncludes() {
	 	/**
	 	 * Does the xml contains any include
	 	 */
	 	if ($this->xml->plugin->includes == null)
	 		return array();
	 	/**
	 	 * $includes
	 	 * Array contains the includes
	 	 * @var array
	 	 */
	 	$includes = array();
	 	
	 	if (is_array($this->xml->plugin->includes->include)) 
	 		return array($this->xml->plugin->includes->include);
	 	/**
	 	 * Foreach loop
	 	 */
	 	foreach($this->xml->plugin->includes->include as $include => $includeValue) {
	 		/**
	 		 * Add to includes array
	 		 */
	 		
	 		$includes[count($includes) + 1 ] = $includeValue;
	 	}
	 	/**
	 	 * Return the includes
	 	 */
	 	return $includes;	
	 }
	 
	 
	 
	 /**
	  * Parse the includes
	  */
	function parseIncludes() {
	 	/**
	 	 * Handle every include
	 	 */
	 	foreach($this->getIncludes() as $include) {
	 		if (!file_exists(dirname(System::$file) . "/sources/xmlscript/" . $include))
	 			die('File not found '. $include);
	 		
	 		include_once((dirname(System::$file) . "/sources/xmlscript/" . $include));
	 		$className = pathinfo($include);
	 		eval($className['filename']. "::construct();");
	 		$this->registerFunction(strtolower($className['filename']), eval(" return new " . $className['filename'] . "();"));
	 	}
	 }
	 
	 /**
	  * Parse the hooks
	  */
	 function parseHooks() {
	 	foreach($this->getHooks() as $hook) {
	 		$this->registerHook((string) $hook, (string) $hook->attributes()->as);
	 	
	 	}
	 	
	 }
	 
	 /**
	  * Register a function 
	  * @param funcName the function's name
	  * @param handler the handler
	  */
	 function registerFunction($funcName, $handler) {
	 	if (!$handler instanceof XMLClass) 
	 		return;
	 	
	 	$this->xmlfunctions[$funcName] = $handler;
	 }
	 
	 /**
	  * Register a hook
	  * registers the hook to the hook array
	  * @param $hookName the name of the hook
	  * @param $name the name
	  */
	 function registerHook($hookName, $name) {
	 	$this->hooks[$hookName][$name] = $name;
	 }
	
	 
	 /**
	  * Doit?
	  * @param $hookName the name of the hook
	  * @return false or true
	  */
	 function doit($hookName) {
	 	foreach($this->xml->plugin->hooks->hook as $hook) {
	 		if ($hook->getName() == $hookName) {
	 			return (boolean) $hook->attributes()->doit == NULL ? true : $hook->attributes()->doit;
	 		}
	 	}
	 }
	 
	 /**
	  * Run a hook
	  * runs the hook.
	  */
	 function runHook($hookName) {
	 	if (!is_array($this->xml->plugin->hook))
	 		return;
	 	foreach($this->xml->plugin->hook as $hook) {
	 		if (!isset($this->hooks[$hookName]))
	 			continue;
	 		foreach ($this->hooks[$hookName] as $name2) 
	 				$this->handleBody($hook);
	 	}
	 }
	 
	 /**
	  * Hanldes the hook
	  */
	function handleBody($hook) {
	 	foreach($hook->children() as $child) {
	 		if (!isset($this->xmlfunctions[$child->getName()])) {
	 			echo 'Function '.$child->getName().' not found.';
	 			return;
	 		}
	 		$functions = $this->xmlfunctions;
	 		$xmlclass = $functions[$child->getName()];
	 		
	 		$xmlclass::exec($child);
	 	}
	 }
	
	
}

class Plugins {
	
	/**
	 * Our registered plugins
	 */
	private static $plugins = array();
	

	/**
	 * Register plugin 
	 * @param $file the plugin file
	 */
	static function registerPlugin($file) {
		self::$plugins[ count (self::$plugins) ] = new Plugin($file); 
	}	
	
	/**
	 * Load plugins from directory
	 */
	static function loadPlugins() {
		$files = FileUtils::getDirectoryList(System::getSources() . "/plugins");
		foreach($files as $file) 
			self::registerPlugin($file);
	}
	/**
	 * Run plugins by name
	 * @param hook the hookname
	 */
	static function runHook($hook) {
		foreach(self::$plugins as $plugin) {
				if (!$plugin->isPlugin())
					continue;
				$plugin->runHook($hook);
		}
		
	}
	
	/**
	 * Parse 
	 */
	static function parse() {
		foreach(self::$plugins as $plugin) {
				if (!$plugin->isPlugin())
					continue;
				$plugin->parseIncludes();
				$plugin->parseHooks();
		}
		
	}
	
	
	
}

 
 
?>
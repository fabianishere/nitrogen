<?php
/**
 * Copyright (c) 2010 FaabTech <faabtech.com>
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


 

class TemplateManager {
	
	/**
	 * Is the page loaded ?
	 */
	private static $loaded = false;
	
	/**
	 * The path of our current theme.
	 */
	private static $path = '';
	
	/**
	 * The page variable
	 */
	public static $page = NULL;
	
	/**
	 * The array with resources
	 */
	private static $resources = array();
	
	/**
	 * Our currently title
	 */
	private static $title = '';
	
	/**
	 * Is the page loaded
	 * @return <code>true</code> if the page is loaded, else <code>false</code>
	 */
	static function isLoaded() {
		return self::$loaded;
	}

	/**
 	 * Die with theme
 	 * @param $errors array with errors
 	 */
 	static function themeDie($errors) {
	  		 self::loadTemplate('misc');
			 self::main_above('Error');
			 Plugins::runHook("template::themedie_start");
			 echo '
					<div class="article" style="margin-left:auto;margin-right: auto;">
					<div class="article-header">Error</div>
					<div class="article-content">We found the following errors:<br /> <ul>';
					
					foreach($errors as $error) {
						echo '<li>'.$error.'</li>';
					}
			 echo '
					</ul></div>
				</div>
					';
			self::main_below();
			Plugins::runHook("template::themedie_end");
			die;	
 	}


   /**
 	* Load the template
 	* @param $page the pagename
 	*/
	static function loadTemplate($page) {
		self::$path = 'themes/default';
		$xml = XMLParser::loadFile("themes/default/index.tpl");
		self::$page = new Template($xml);
		self::$loaded = true;
	}

   /**
 	* Get Metatags 
 	*/
 	static function getMetaTags() {
	 
	 		return '<meta name="description" content="Test" />
			 	  <meta name="keywords" content="Forum Software, forum, web, board, bb, bulletin board" />
              	  <meta name="author" content="FaabBB" />
             	  <meta http-equiv="Content-Type" content="text/html;charset=ISO-8859-1" />';
 	}

   /**
	* Load main_above
 	* @param $pageTitle the title
 	* @return main_above
    */
	static function main_above($pageTitle) {
		//Run hook
		Plugins::runHook("template::main_above_start");
		self::$page->template_main_above($pageTitle);
		// Run hook
		Plugins::runHook("template::main_above_end");
	}
	/**
 	* Load main_below
 	* @return main_below
 	*/
	static function main_below()  {
		//Run hook
		Plugins::runHook("template::main_below_start");
		self::$page->template_main_below();
		//Run hook
		Plugins::runHook("template::main_below_end");
	}
	
	/**
	 * Get resources
	 * @return array with resources
	 */
	static function getResources() {
		return self::$resources;
	}
	
	/**
	 * Add resource
	 * @param $resource the resource to add
	 */
	static function addResources($resource) {
		if (!$resource instanceof String)
			System::systemDie(array('Resource must be an instance of String'));
		self::$resources[ count(self::$resources) ] = $resource;
	}
	
	/**
	 * Get resource path
	 * @return the resource path
	 */
	static function getResourcePath() {
		return self::$path;
	}
	
	/**
	 * Set the resource path
	 * @param $path the path to set
	 */
	static function setResourcesPath($path) {
		self::$path = $path;
	}
	
	/**
	 * Get title
	 * @return the title
	 */
	static function getTitle() {
		return self::$title;
	}
	
	/**
	 * Set the title
	 * @param $title the title to set
	 */
	static function setTitle($title) {
		self::$title = $title;
	}
	
	/**
	 * Get the HTML Layout
	 * @return new XMLParser instance
	 */
	static function getHtmlLayout() {
		$xml = XMLParser::loadFile(self::getResourcePath() . '/' . System::$_DATA['HTML_LAYOUT']);
		return $xml;
	}
	

	/**
	 * Get the Forum board layout
	 * @return new XMLParser instance
	 */
	static function getForumBoardLayout() {
		
		$xml = XMLParser::loadFile(self::getResourcePath() . '/' . System::$_DATA['FORUM_BOARD_LAYOUT']);
		return $xml;
	}

}

class Template {
	
	/**
	 * The XMLParser instance
	 */
	private $xmlparser;
	
	/**
	 * The constructor of this class
	 * @param xmlparser the XML Parser
	 */
	function __construct($xmlparser) {
		if (!$xmlparser instanceof XMLParser)
			System::systemDie(array('The argrument of the Template class Constructor must be an instaceof the XMLParser class.'));
		$this->xmlparser = $xmlparser;
		
		// Our plugins
		Plugins::registerPlugin($xmlparser->getFile());

	}
	
	/**
	 * Get the XMLParser
	 * @return the XMLParser
	 */
	function getXMLParser() {
		return $this->xmlparser;
	}
	
	/**
	 * Get content
	 * @param $title the title of our page.
	 * @return the content
	 */
	private function getContent($title) {
		// Our HTML Layout
		$xml = TemplateManager::getHtmlLayout();
		// Set the title
		TemplateManager::setTitle($title);
		// Our variables
		$xml->addVariables(array('title' => $title, 
								 'head' => XMLUtils::getBody($this->xmlparser->getXML()->template->head), 
								 'body' => XMLUtils::getBody($this->xmlparser->getXML()->template->body),
								 'meta' => TemplateManager::getMetaTags() 
							));
		return $xml;
	}
	
	
	/**
	 * Load the main_above
	 * @param $title the title of our page.
	 */
	function template_main_above($title) {
		// Get content
		$content = $this->getContent($title);
		// Split
		$split = explode('{mark: forums_body}', XMLUtils::getBody($content->getXML()->layout));
		// Split lenght 2?
		if (count($split) != 2)
			System::systemDie(array('Error while parsing template. The template should contains a mark called "forums_body"'));
			
		// Print above
		System::$out->println($split[0]);
	}
	
	
	/**
	 * Load the main_above
	 * @param $title the title of our page.
	 */
	function template_main_below() {
		// Get content
		$content = $this->getContent('');
		// Split
		$split = explode('{mark: forums_body}', XMLUtils::getBody($content->getXML()->layout));
		// Split lenght 2?
		if (count($split) != 2)
			System::systemDie(array('Error while parsing template. The template should contains a mark called "forums_body"'));
			
		// Print below
		System::$out->println($split[1]);
	
				
	}
	
}



?>
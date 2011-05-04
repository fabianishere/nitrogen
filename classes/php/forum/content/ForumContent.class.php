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

class ForumContent {
	
	
	/**
	 * Create an Article
	 * @param $title the article title
	 * @param $content the article content
	 */
	static function createArticle($title, $content) {
		$xml = simplexml_load_file(TemplateManager::getResourcePath() . '/' . System::$_DATA['ARTICLE_LAYOUT']);
		$errors = array();
		if (!$xml) {
   			foreach(libxml_get_errors() as $error) 
   				$errors[count($errors) + 1] = $error->message;
   			System::systemDie($errors);
		}
		$post_layout = XMLUtils::getBody($xml->layout);
		$post_layout = str_replace('{var: title}', $title , $post_layout);
		$post_layout = str_replace('{var: content}', $content , $post_layout);
		echo $post_layout;
	}
	
	
	/**
	 * Show main-board
	 */
	static function showMainBoard() {
		// Our section
		$section = new Section(0);
		//Loop the boards
		foreach($section->getChilds() as $child) {
	
			// Our HTML
			$html = TemplateManager::getForumBoardLayout();
			// Register vars
			$html->addVariables(array('title' => $child->getName()));
			// Filter
			$html->getXML();
			// Get the board template
			$boardLayout = $html->getMark("board");
	
			// The board template
			$boardTemplate = XMLParser::loadString($boardLayout, array('title' => $child->getName()));
			// Forum layout
			$forumLayout = $boardTemplate->getMark("forum");
			// Split the board
			$split = explode('{mark: board_body}', $boardTemplate->getXML()->asXML());
			// Length 2?
			if (count($split) != 2)
				System::systemDie(array('Error while parse template'));
			
			if ( $boardLayout == NULL || $forumLayout == NULL )
				System::systemDie(array('Corrupt forum_board_layout.xml'));
		
			// Print index 0
			System::$out->println($split[0]);
			
			// Childs of the childs
			foreach($child->getChilds() as $forum) {
				$lastpost = self::getLastPost($forum);
				$forumTemplate = XMLParser::loadString($forumLayout, array(
																			'name' => $forum->getName(),
																			'desc' => $forum->getDescription(),
																			'posts' => (string) $forum->getPosts(),
																			'threads' => (string) $forum->getThreadCount(),
																			'url' => $lastpost['url'],
																			'title' => $lastpost['title'],
																			'username' => $lastpost['username'],
																			'lastposturl' => $lastpost['lastposterurl'],
																			'date' => $lastpost['date'],
																			)
																			);
				if(!$forum->containPosts())
					$forumTemplate = $forumTemplate->replaceMark('last_post', 'Never');															
				// Print the forum
				System::$out->println($forumTemplate->asXML());
			}
	
			// Print index 1
			System::$out->println($split[1]);
		}
		
	}
	
	
	/**
	 * Get last post
	 * @param section the section to get the last post.
	 */
	private static function getLastPost($section) {
		if (!$section instanceof Section) 
			return "";
		return array('url' => 'TODO', 'title' => $section->getLastPostTitle(), 'username' => $section->getLastPoster(), 'lastposterurl' => 'TODO', 'date' => $section->getLastPost()->getDateLine());
	}
			

}
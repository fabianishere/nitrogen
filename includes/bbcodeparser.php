<?php 
/*
 *   Copyright (C) 2010 Faab234 (FaabDesign)
 *
 *   This program is free software: you can redistribute it and/or modify
 * 	 it under the terms of the GNU General Public License as published by
 *   the Free Software Foundation, either version 3 of the License, or
 *   (at your option) any later version.
 *
 *   This program is distributed in the hope that it will be useful,
 *   but WITHOUT ANY WARRANTY; without even the implied warranty of
 *   MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 *   GNU General Public License for more details.
 */
 
/*
 * Array with BBCodes		
 * Not done
 */

$bbCodes = array();


function br($string){
    $string = str_replace("\r\n", "<br />", $string);
    if(preg_match_all('/\<pre class="\ brush:(.*?);\" \>(.*?)\<\/pre\>/', $string, $match)){
        foreach($match as $a){
            foreach($a as $b){
				
            $string = preg_replace('/\<pre class="\ brush:(.*?);\"\>'.$b.'<\/pre\>/', "<pre class=\"brush: $1;\">".str_replace("<br />", "\n", $b)."</pre>", $string);
            }
        }
    }
return $string;
}

function parse($text) {
	// Striptslashes, specialchars, ect
                         		$text = stripslashes($text);
                                $text = htmlspecialchars($text, ENT_QUOTES);
                                $text = nl2br($text);
								return $text;

}

function parseBB($text) {
	$smileys = array('angelnot', 'angry', 'blush', 'cencored', 'confused', 'cry', 'decayed', 'disgusted', 'doubt', 'fear', 'grin', 'happy', 'hmm'
, 'hypocrite', 'innocent', 'itsok', 'lock', 'love', 'pout', 'rolleyes', 'sad', 'shifty', 'shock', 'sulk', 'sunglasses', 'sweatingbullets', 'tongue', 'veryhappy', 'whistling','wink', 'worried', 'wry');


  								
							   	/*
								 * Replacing Every BBcode to html.
								 */
								
                                $text = htmlspecialchars($text);
								$text = str_replace('\r\n', '<br />', $text);
                               	$text = str_replace('\\\r\\\n', '&#13;', $text);
								$text = stripslashes($text);

						
								
								 // Bold
                                $text = preg_replace('#\[b\](.+)\[/b\]#isU', '<b>$1</b>', $text);
								// I
                                $text = preg_replace('#\[i\](.+)\[/i\]#isU', '<i>$1</i>', $text);
								// Underline
                                $text = preg_replace('#\[u\](.+)\[/u\]#isU', '<u>$1</u>', $text);
                               
							   	// IMG
                                $text = preg_replace('#\[img\](.+)\[/img\]#isU', '<img src="$1" />', $text);
								
								//Youtube
								$text = preg_replace('#\[youtube\](.+)\[/youtube\]#isU', '<object width="480" height="385"><param name="movie" value="http://www.youtube.com/v/$1?fs=1&showsearch=0&rel=0&amp;hl=nl_NL"></param><param name="allowFullScreen" value="true"></param><param name="allowscriptaccess" value="always"></param><embed src="http://www.youtube.com/v/$1?fs=1&showsearch=0&rel=0&amp;hl=nl_NL" type="application/x-shockwave-flash" allowscriptaccess="always" allowfullscreen="true" width="480" height="385"></embed></object>', $text);
								// IMG
                                $text = preg_replace('#\[url=http://(.+)](.+)\[/url\]#isU', '<a target="blank" href="$1">$2</a>', $text);
								$text = preg_replace('#\[url=(.+)](.+)\[/url\]#isU', '<a target="blank" href="http://$1">$2</a>', $text);
								
								// left
                                $text = preg_replace('#\[center\](.+)\[/center\]#isU', '<div align="center">$1</div>', $text);
								
								 $text = preg_replace('#\[left\](.+)\[/left\]#isU', '<div align="left">$1</div>', $text);
								 
								 $text = preg_replace('#\[right\](.+)\[/right\]#isU', '<div align="right">$1</div>', $text);
								 
								  $text = preg_replace('#\[code=(.+)\](.+)\[/code\]#isU', '<pre class=" brush:$1;">$2</pre>', $text);
								  $text = preg_replace('#\[quote\](.+)\[/quote\]#isU', '<blockquote><p>$1</p></blockquote>', $text);
								   $text = preg_replace('#\[quote=(.+);(.+)\](.+)\[/quote\]#isU', '<blockquote><p>$3</p>-<a href="http://'.scriptUrl.'/threads/$2">$1</a></blockquote>', $text);
								    $text = preg_replace('#\[quote=(.+)\](.+)\[/quote\]#isU', '<blockquote><p>$2</p>-$1</blockquote>', $text);
									
									foreach($smileys as $s) {
									$text = str_replace(':'.$s.':', '<img src="http://'.scriptUrl.'/smileys/'.$s.'.gif" alt="'.$s.'" title="'.$s.'" />', $text);		
									}
								
								
								$text = br($text);
								return $text;

}


?>
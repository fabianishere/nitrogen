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
 	
	function error($title, $headtitle, $content) {
	loadTemplate('misc');
	main_above($title);
 
 	echo'
		<div id="content">
		<div class="article" style="margin-left:auto;
	margin-right: auto;">
	<div id="article-header">'.$headtitle.'</div>
	<div id="article-content">'.$content.'</div>
	</div>
	';
	main_below();

}
	
	?>
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

	require('includes.php');
	getStandardIncludes();
	require('config.php');
	loadTemplate('misc');
		
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);
	
	main_above('Logout');
	echo '

	
		<div class="article" style="margin-left:auto;
	margin-right: auto;">
	<div class="article-header">Logout</div>
	<div class="article-content">Logout success.</div>
	</div>
	';

	
	main_below();

	
	
?>

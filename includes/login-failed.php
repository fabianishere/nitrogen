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
	
	include('checkuser.php');
		
 
	
	loadTemplate('misc');
	
	main_above('Login Failed');
	
	echo '
	
		<div class="article" style="margin-left:auto;
	margin-right: auto;">
	<div class="article-header">Login</div>
	<div class="article-content"><div id="errorMsg">
        <h3>Ooops! An Error!</h3>
          <ol><li>Wrong Username or Password</li></ol>
		  </div>
		  
		  <form id="loginForm" name="loginForm" class="uniForm" method="post" action="login.php">
  <table width="300" border="0" align="center" cellpadding="2" cellspacing="0">
    <tr>
      <td width="112"><b>Username</b></td>
      <td width="188"><input name="login" type="text" class="textfield" id="login" /></td>
    </tr>
    <tr>
      <td><b>Password</b></td>
      <td><input name="password" type="password" class="textfield" id="password" /></td>
    </tr>
    <tr>
      <td>&nbsp;</td>
      <td><input type="submit" name="Submit" value="Login" /></td>
    </tr>
  </table>
</form></div>
	</div>
	';
main_below();

	
	?>
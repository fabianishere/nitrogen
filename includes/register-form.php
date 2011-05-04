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
 	loadTemplate('misc');
 	main_above('Register');

		
		
 	echo '
	<script type="text/javascript">function reloadCaptcha() {
		document.getElementById(\'imagereg\').src = document.getElementById(\'imagereg\').src  + \'#\';	
	}</script>
		<div class="article" style="margin-left:auto;
	margin-right: auto;width: 70%;">
	<div class="article-header">Register at '.siteName.'</div>
	<div class="article-content">';
	if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
		echo '
		<div id="errorMsg" class="uniForm">
        <h3>Ooops! An Error!</h3>
          <ol>';
       
         
		foreach($_SESSION['ERRMSG_ARR'] as $msg) {
			echo '<li>',$msg,'</li>'; 
		}
		echo '</ol>
      </div>';
		unset($_SESSION['ERRMSG_ARR']);
	}
echo '<form id="loginForm" name="loginForm" method="post" action="register.php" class="uniForm">
	<table class="tborder" cellpadding="4" cellspacing="1" border="0" width="100%" align="center">
<tbody>
<tr>
	<td class="panelsurround" align="center">
	<div class="panel">
		<div style="width:630px" align="left">
		
			<div class="smallfont" style="margin-bottom:3px">
				In order to be able to post messages on the '.siteName.' forums, you must first register.<br>
				Please enter your desired user name, your email address and other required details in the form below.
			</div>
			
			<div class="smallfont" style="margin-bottom:3px">
				<strong>User Name</strong>:<br>
				<input type="text" class="bginput" name="login" size="50" maxlength="15" value="">
			</div>
			
			<fieldset class="fieldset">
				<legend>Password</legend>
				<table cellpadding="0" cellspacing="3" border="0" width="400">
				<tbody><tr>
					<td colspan="2">Please enter a password for your user account. Note that passwords are case-sensitive.</td>
				</tr>
				<tr>
					<td>
						Password:<br>
						<input type="password" class="bginput" name="password" size="25" maxlength="50" value="">
					</td>
					<td>
						Confirm Password:<br>
						<input type="password" class="bginput" name="cpassword" size="25" maxlength="50" value="">
					</td>
				</tr>
				</tbody></table>
			</fieldset>
			
			<fieldset class="fieldset">
				<legend>Email Address</legend>
				<table cellpadding="0" cellspacing="3" border="0" width="400">
				<tbody><tr>
					<td colspan="2">Please enter a valid email address for yourself.</td>
				</tr>
				<tr>
					<td>
						Email Address:<br>
						<input type="text" class="bginput" name="email" size="25" maxlength="50" value="" dir="ltr">
					</td>
					<td>
						Confirm Email Address:<br>
						<input type="text" class="bginput" name="cemail" size="25" maxlength="50" value="" dir="ltr">
					</td>
				</tr>
				
				</tbody></table>
			</fieldset>
			<fieldset class="fieldset">
				<legend>Personal Info</legend>
				<table cellpadding="0" cellspacing="3" border="0" width="400">
				<tbody><tr>
					<td colspan="2">Please enter your personal info</td>
				</tr>
				<tr>
					<td>
						First Name:<br>
						<input type="text" class="bginput" name="fname" size="25" maxlength="50" value="" dir="ltr">
					</td>
					<td>
						Last Name:<br>
						<input type="text" class="bginput" name="lname" size="25" maxlength="50" value="" dir="ltr">
					</td>
				</tr>
				<td colspan="2">Please enter your Birthday</td>
				<tr> 
				<td>
						Day:<br>
						<select name="birthday">';
						$month_names = array("January","February","March","April","May","June","July","August","September","October","November","December");
							for ($i = 1; $i < 32; $i++) {
							echo ' <option value="'.$i.'">'.$i.'</option>
  							';	
						}
						echo '</select>
					</td>
					
					<td>
						Month:<br>
						<select name="birthmonth">';
						$month_names = array("January","February","March","April","May","June","July","August","September","October","November","December");
							for ($i = 0; $i < 12; $i++) {
							echo ' <option value="'.($i + 1).'">'.$month_names[$i].'</option>
  							';	
						}
						echo '</select>
					</td>
					<td>
						Year:<br>
						<select name="birthyear">
						';
						
						for ($i = 1950; $i < date("Y") + 1; $i++) {
							echo ' <option value="'.$i.'">'.$i.'</option>
  							';	
						}
 							echo '
						</select>
					</td>
					
				</tr>
				
				</tbody></table>
			</fieldset>
			<fieldset class="fieldset">
	<legend>Image Verification</legend>
	<table cellpadding="0" cellspacing="3" border="0" width="100%">
	<tbody><tr>
		<td width="100%" valign="top">
			Please enter the four letters or digits that appear in the image opposite. <br><br>
			<input id="imagestamp" type="text" class="bginput" name="imagestamp" size="10" maxlength="6">
		</td>
		<td valign="bottom" align="center">
			<img id="imagereg" src="http://'.scriptUrl.'/includes/captcha.php" alt="Registration Image" border="0" style="cursor: pointer; " title="Registration Image">
			<span id="refresh_imagereg" style="cursor: pointer; "><a href="#" onclick="reloadCaptcha();">Refresh Image</a></span>
		</td>
	</tr>
	</tbody></table>
</fieldset>
			<input type="submit" name="Submit" value="Register" />
		
		

			
		</div>
	</div>
	</td>
</tr>
</tbody></table></form>
</div>
	</div>
	';
	main_below();

	
	?>
<?xml version="1.0" encoding="utf-8"?>
<faabmod>
	<product>
		<author>Fabian M</author>
		<author>FaabTech</author>
        <copyright>
        	Theme by FaabTech.
        </copyright>
	</product>

<template>

	<head>
    <!-- Start Head -->


	<!-- Start CSS -->
	<link href="{var: TemplateManager::getResourcePath()}/css/style.css" 					rel="stylesheet" type="text/css" />
	<link href="{var: TemplateManager::getResourcePath()}/css/default_menu_style.css" 	rel="stylesheet" type="text/css" />
	<link href="http://{var: scriptUrl}/loginmodule.css" 	rel="stylesheet" type="text/css" />
	<link href="{var: TemplateManager::getResourcePath()}/css/default.uni-form.css" 		rel="stylesheet" type="text/css" />
	<link href="{var: TemplateManager::getResourcePath()}/css/default_forum_style.css" 	rel="stylesheet" type="text/css" />
	<link href="{var: TemplateManager::getResourcePath()}/css/news.css"  					rel="stylesheet" type="text/css" />
    <link href="{var: TemplateManager::getResourcePath()}/css/shCoreDefault.css"  		rel="stylesheet" type="text/css" />
	<!-- End CSS -->
    
    <!-- Start Javascript -->
	<script type="text/javascript" language="Javascript" src="{var: TemplateManager::getResourcePath()}/js/menu.js"></script>
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
	<script type="text/javascript" src="{var: TemplateManager::getResourcePath()}/js/slider.js"></script>
	<script type="text/javascript" src="{var: TemplateManager::getResourcePath()}/js/news.js"></script>
	<script type="text/javascript" src="{var: TemplateManager::getResourcePath()}/js/shCore.js"></script>
	<script type="text/javascript" src="{var: TemplateManager::getResourcePath()}/js/shBrushJScript.js"></script>
	<script type="text/javascript">SyntaxHighlighter.all();</script>
 	<script type="text/javascript">

      $(document).ready(function() {

        $(".browse a").click(function() {

          $("link").attr("href",$(this).attr('rel'));

          return false;

        });

      });

    </script>
    
    <!-- End Javascript -->
    
    <!-- End Head -->
    </head>
              
     <body>
    <!-- Start Body -->

	
	<phpcode>
    if (!isLoggedIn()) {
    
    echo '
	<div id="top-container">
    	<div id="login-top">
        	<form id="loginFormTop" name="loginFormTop" method="post" class="uniForm" action="http://{var: scriptUrl}/login.php">
  				<table width="300" border="0" align="center" cellpadding="2" cellspacing="0">
					<tr>
					 	<td width="112"><b>Username</b></td>
						<td width="188"><input name="login" type="text" class="textfield" id="login" /></td>
                        <td><b>Password</b></td>
                        <td><input name="password" type="password" class="textfield" id="password" /></td>
						<td>&nbsp;</td>
                        <td><input type="submit" name="Submit" value="Login" /></td></tr>

 				</table>
			</form>
		</div>
	</div>
	<div style="clear:both"></div> ';
    }
    </phpcode>
	<div id="container">
		<div id="menu-container">	
    		<ul id="menu">
        		<li style="padding: 0; margin-top: -10px;"><img src="{var: TemplateManager::getResourcePath()}/images/logo.png" /></li>
				<li><a href="http://{var: scriptUrl}/index.php">Home</a></li>
                <li><a href="http://{var: scriptUrl}/forum.php">Forum</a></li>
               	<phpcode>
                	getCommunityMenu();
                </phpcode>
                <!-- Login -->
                <phpcode>
                	if (!isLoggedIn())
                    {
                    	echo '
                		<li  style="float: right; margin-right: 5px;"><a  href="http://'.scriptUrl.'/login.php">Login</a></li>
						<li  style="float: right; margin-right: 5px;"><a  href="http://'.scriptUrl.'/register.php">Register</a></li>
                        	 ';
                    }
                    else
                    {
                    	echo '
                        		<li  style="float: right; margin-right: 5px;">
                                	<a href="http://'. scriptUrl . '/logout.php">Logout</a></li><li  style="float: right; margin-right: 5px;">
                            		<a href="http://'. scriptUrl . '/usercp.php">UserCP</a>
                            </li>
							 ';
			 
					echo '<li style="float: right; margin-right: 5px;'; 
				
					echo '">Welcome <a onclick="mopen(\'m4\')" onmouseout="mclosetime()" href="#">'.getUserName().'</a>'; 
		
					echo newPMs() ? '!' : '';
					echo '<div id="m4" style="width: auto;" onmouseover="mcancelclosetime()" onmouseout="mclosetime()">
                    			<a href="http://'.scriptUrl.'/users/'.getUserId().'">View Profile</a>
			 			';
			
					 		
								echo newPMs() ? '<a href="http://'.scriptUrl.'/showinbox.php">'.unReadPMs().' Unreaded PM(s)</a>' : 
                                '<a href="http://'.scriptUrl.'/showinbox.php">Show Inbox</a>';
						 echo '</div></li>';

                    }
                </phpcode>
                
               

		</ul>
       	</div>
        

		

				<!-- Start Content -->
				<div id="content"> 
					{forums: body}
					
                

				<!-- Copyright -->
				<div id="text-content">
                	<div id="sitefooter">
                    	&copy; 2011 FaabTech | <a href="http://{var: scriptUrl}/contact.php">Contact</a> | <a href="http://{var: scriptUrl}/faq.php">FAQ</a> | <a href="http://{var: scriptUrl}/support.php">Support</a> | <a href="http://{var: scriptUrl}/about.php">About us</a> {var: adminLink}
                         <!-- Copyright Editing is allowed, Deleting or hidding not -->
                      <span style="float:right">{var: copyRight} | {var: themeCopyright}</span>
                        <!-- Copyright Editing is allowed, Deleting or hidding not -->
                    <!-- End site footer -->
                    </div>
                    <!-- End text-content -->
                </div>
                <!-- End content -->
               </div>
               <!-- End container -->
              </div>
	</body>
    </template>
</faabmod>




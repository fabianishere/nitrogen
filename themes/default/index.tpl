<?xml version="1.0" encoding="utf-8"?>
<faabmod>
	<product>
		<author>Fabian M</author>
		<author>FaabTech</author>
        <copyright>Theme by FaabTech</copyright>
	</product>
    
	

	<template>
		<head>
			<link href="{var: TemplateManager::getResourcePath()}/css/style.css" rel="stylesheet" type="text/css" />
        </head>
        <body>
        	<div id="head-bar">
            
            </div>
            <div id="wrapper">
            	<div id="banner">
              	  <h1 class="logo">
					<a href="{var: System::getScriptUrl()}/index.php" title="{var: System::getSiteName()}"><span>{var: System::getSiteName()}</span></a>
				  </h1>
				<div id="navigation">
                	<ul>
                    	<li>
							<a href="{var: System::getScriptUrl()}" class="first">Index</a>
                        </li>
						<li>
							<a href="{var: System::getScriptUrl()}/forum.php">Community</a>
                        </li>
                        <li>
                            <a href="{var: System::getScriptUrl()}/blogs">Blogs</a>
                        </li>
                        <li>
                            <a href="{var: System::getScriptUrl()}/articles">Articles</a>
                        </li>
                        <li>
                            <a href="{var: System::getScriptUrl()}/projects">Projects</a>
                        </li>
                        <li>
                            <a href="{var: System::getScriptUrl()}/tutorials">Tutorials</a>
                        </li>
                        <li>
                            <a href="{var: System::getScriptUrl()}/search">Search</a>
                        </li>
                        <li>
                            <a href="{var: System::getScriptUrl()}/downloads" class="last">Downloads</a>
			{start_mark: test} lol {end_mark: test}
{start_mark: test} lol {end_mark: test}
						</li>
                    </ul>
                </div>
				</div>
            	<div id="content-wrapper">
                	<div id="content-header">
                   		{var: TemplateManager::getTitle()}
                    </div>
                	<div id="content-links">
                    	<ul>
                        	<li>
                            	<a href="{var: System::getScriptUrl()}/usercp.php">UserCP</a>
                           	</li>
                            <li>
                                 <a href="{var: System::getScriptUrl()}/login.php?do=logout">Logout</a>
                            </li>
                        </ul>
                    </div>
                    <div style="clear:both"></div>
        	 		{mark: forums_body}
             	</div>
                <div id="footer">
                	
                </div>
            </div>       
        </body>
    </template>
</faabmod>




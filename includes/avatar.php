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
 

 
 
if(isset($_GET['userid']))
{
	include('../connector.php');
	
	$result = mysql_query("SELECT * FROM avatar WHERE userid='".$_GET['userid']."'");
	$row = mysql_fetch_array($result);
	if ($row) {
    	$file = '../users/avatar/'. $row['userid'] . '.'.$row['extension'];
    	$extension = str_replace("jpg", "jpeg", $row['extension']);
   	
		$image = new Image();
		$image->load($file);
		$width = $image->getWidth();
		$height = $image->getHeight();
			
    if ($extension == "jpeg") {
		header('content-type: image/jpeg'); 
		if ($width > 120 || $height > 120) {
		 $image->resize(120, 120);
		 $image->output();
		} else {
   		 $image->output();
		}
	} else if ($extension == "png") {
		header('content-type: image/png'); 
		if ($width > 120 || $height > 120) {
		 $image->resize(120, 120);
		 $image->output();
		} else {
   		 $image->output();
		}
	} else if ($extension == "gif") {
		header('content-type: image/gif'); 
		if ($width > 120 || $height > 120) {
	 $image->resize(120, 120);
		 $image->output();
		} else {
   		 $image->output();
		}

	}
		
					} else {
						header('content-type: image/jpeg'); 
						$file = "../images/unknown.jpg";
   						$image = new Image();
						$image->load($file);
    					$image->output();
					}
					
		
}




class Image {
   
   var $image;
   var $image_type;
 
   function load($filename) {
      $image_info = getimagesize($filename);
      $this->image_type = $image_info[2];
      if( $this->image_type == IMAGETYPE_JPEG ) {
         $this->image = imagecreatefromjpeg($filename);
      } elseif( $this->image_type == IMAGETYPE_GIF ) {
         $this->image = imagecreatefromgif($filename);
      } elseif( $this->image_type == IMAGETYPE_PNG ) {
         $this->image = imagecreatefrompng($filename);
      }
   }
   function save($filename, $image_type=IMAGETYPE_JPEG, $compression=75, $permissions=null) {
      if( $image_type == IMAGETYPE_JPEG ) {
         imagejpeg($this->image,$filename,$compression);
      } elseif( $image_type == IMAGETYPE_GIF ) {
         imagegif($this->image,$filename);         
      } elseif( $image_type == IMAGETYPE_PNG ) {
         imagepng($this->image,$filename);
      }   
      if( $permissions != null) {
         chmod($filename,$permissions);
      }
   }
   function output($image_type=IMAGETYPE_JPEG) {
      if( $image_type == IMAGETYPE_JPEG ) {
         imagejpeg($this->image);
      } elseif( $image_type == IMAGETYPE_GIF ) {
         imagegif($this->image);         
      } elseif( $image_type == IMAGETYPE_PNG ) {
         imagepng($this->image);
      }   
   }
   function getWidth() {
      return imagesx($this->image);
   }
   function getHeight() {
      return imagesy($this->image);
   }
   function resizeToHeight($height) {
      $ratio = $height / $this->getHeight();
      $width = $this->getWidth() * $ratio;
      $this->resize($width,$height);
   }
   function resizeToWidth($width) {
      $ratio = $width / $this->getWidth();
      $height = $this->getheight() * $ratio;
      $this->resize($width,$height);
   }
   function scale($scale) {
      $width = $this->getWidth() * $scale/100;
      $height = $this->getheight() * $scale/100; 
      $this->resize($width,$height);
   }
   function resize($width,$height) {
      $new_image = imagecreatetruecolor($width, $height);
      imagecopyresampled($new_image, $this->image, 0, 0, 0, 0, $width, $height, $this->getWidth(), $this->getHeight());
      $this->image = $new_image;   
   }      
}
?>
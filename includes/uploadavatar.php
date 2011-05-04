<?php

include('../connector.php');
session_start();
 function getExtension($str) {
         $i = strrpos($str,".");
         if (!$i) { return ""; }
         $l = strlen($str) - $i;
         $ext = substr($str,$i+1,$l);
         return $ext;
 }



		$filename = stripslashes($_FILES['file']['name']);
 	//get the extension of the file in a lower case format
  		$extension = getExtension($filename);
 		$extension = strtolower($extension);

if ((($extension == "gif")
|| ($extension == "jpeg")
|| ($extension == "jpg")
|| ($extension == "png"))
&& ($_FILES["file"]["size"] < 27000))
  {
  if ($_FILES["file"]["error"] > 0)
    {
    echo 'Error';
    }
  else
    {

   
      move_uploaded_file($_FILES["file"]["tmp_name"],
      "../users/avatar/" . $_SESSION['SESS_MEMBER_ID'] . "." . $extension);
	  

    }
	if (!mysql_fetch_array(mysql_query("SELECT * FROM avatar WHERE userid='".$_SESSION['SESS_MEMBER_ID']."'"))) {
		  $result = mysql_query("INSERT INTO avatar(userid, extension) VALUES('".$_SESSION['SESS_MEMBER_ID']."', '".$extension."')");
	} else {
		 $result = mysql_query("UPDATE avatar SET extension='".$extension."' WHERE userid='".$_SESSION['SESS_MEMBER_ID']."'");
	}
 if ($result) {
	  header("location: ../usercp.php");
 } else {
	 echo mysql_error();
 }
  }

else

  {
  echo "Invalid file";
  }



?>
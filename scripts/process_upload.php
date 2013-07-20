<?php
/* SCRIPT TO PROCESS IMAGE UPLOAD OF LOGGED IN members */

$host="localhost";
$user="root";
$password="";

@$connect=mysql_connect($host,$user,$password) or die(mysql_error());
@$selectDB=mysql_select_db("cosaps") or die(mysql_error());



//if(isset($_FILES["image"])){
$name=$_FILES["image"]["name"];
$tmp_loc=$_FILES["image"]["tmp_name"];
$size=$_FILES["image"]["size"];
@$image_size=getimagesize($tmp_loc);
$userid = $_GET['userid'];

$allowed_ext=array("jpg","jpeg","png","gif","JPEG","JPG");
$image_ext=strtolower(end(explode(".",$name)));

	//success
	
//location of images
$location="images/members/".$name;

move_uploaded_file($tmp_loc,$location);

$query="UPDATE cosaps_basic_info

		set 
					
		image = '$location'
					
		where id=".$userid;

$result=mysql_query($query) or die(mysql_error());


//}
?>



		
		
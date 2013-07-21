<?php
$host="localhost";
$user="digijagc_cosaps";
$password="anthony1234!@#$";

$host="localhost";
$user="root";
$password="";


@$connect=mysql_connect($host,$user,$password) or die(mysql_error());
@$selectDB=mysql_select_db("digijagc_cosaps") or die(mysql_error());


//if(isset($_POST["fname"],$_POST['lname'],$_POST['mail'],$_POST['pass'],$_POST['no'])){


//grab the form variables
$firstname = mysql_real_escape_string($_GET["fname"]);
$lastname = mysql_real_escape_string($_GET["lname"]);
$email = mysql_real_escape_string($_GET["mail"]);
$password = md5($_GET["pass"]);
$number = $_GET["no"];



$query = "INSERT INTO cosaps_basic_info
		  
		  (firstname,lastname,email,password,phone)
		  
		  VALUES
		  
		  ('$firstname','$lastname','$email','$password','$number')";

$r = mysql_query($query) or die(mysql_error());


$lastid=mysql_insert_id() or die(mysql_error());



//grab last id inserted

$jsonData ='{ "users": 

{

"lastid":'.$lastid.'

}';


$jsonData .= '}';


echo $jsonData;


//}






   
?>
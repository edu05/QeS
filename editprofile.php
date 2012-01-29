<?php session_start();

$user="root";
$host="localhost";
$password="";
$database="qes";
$tabla = "tabla".$_SESSION['k_UserId'];
		$connection = mysql_connect($host,$user,$password)
			or die ("couldn’t connect to server");
		$db = mysql_select_db($database,$connection)
			or die ("Couldn’t select database");
$name = $_GET['name'];
$number = $_GET['number'];
$email = $_GET['email'];
$id=$_SESSION['k_UserId'];
$$query = mysql_query( "UPDATE `member` SET `loginName` ='$name',`phone`='$number',`email`='$email' WHERE `UserId` ='$id' ");
	echo
			"<SCRIPT LANGUAGE='javascript'>
			 location.href = 'main.php';
			 </script>";
?>
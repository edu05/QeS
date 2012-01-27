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
$query =("ALTER TABLE $tabla ADD COLUMN $_POST[grupo] CHAR (20)");
$result = mysql_query($query);
	echo
			"<SCRIPT LANGUAGE='javascript'>
			 location.href = 'main.php';
			 </script>";
?>
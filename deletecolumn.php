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
$columna = $_GET['name'];
$query =mysql_query("ALTER TABLE $tabla DROP $columna");
	echo
			"<SCRIPT LANGUAGE='javascript'>
			 location.href = 'main.php';
			 </script>";
?>
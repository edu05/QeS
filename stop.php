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
		$id = $_GET['id'];
$mid = $_SESSION['k_UserId'];
$grupo =$_GET['grupo'];
$id = preg_replace("/[^a-zA-Z0-9]/", "", $id);
$tbls = "tabla".$id;
$qry = "DELETE FROM $tabla WHERE Sigo=$id";
		$result=mysql_query($qry);
$qry2 = mysql_query("DELETE FROM $tbls WHERE $grupo = $mid");
echo
	"<SCRIPT LANGUAGE='javascript'>
	 location.href = 'main.php';
	</script>";
?>

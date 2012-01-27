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
$id = preg_replace("/[^a-zA-Z0-9]/", "", $id);
$tablasuya = "tabla".$id;
$check1 = mysql_query("SELECT Sigo FROM $tabla WHERE Sigo = $id");
$checkrow = mysql_fetch_row($check1);
if($checkrow[0] != $id){
$qry = "INSERT INTO $tabla (sigo)
		VALUES ($id)";
		$result=mysql_query($qry)
		or die(mysql_error());
$grupo = preg_replace("/[^a-zA-Z0-9]/", "", $_GET['group']);
$seguir = "INSERT INTO $tablasuya ($grupo)
			VALUES ($mid)";
		$res = mysql_query($seguir)
			or die(mysql_error());
			echo
			"<SCRIPT LANGUAGE='javascript'>
			 location.href = 'main.php';
			 </script>";

}
else{
			echo
			"<SCRIPT LANGUAGE='javascript'>
			 location.href = 'main.php';
			 alert('ya le sigues');
			 </script>";
}
?>

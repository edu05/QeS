<?php

$name = $_POST['name'];
$email = $_POST['email'];
$pass = has($_POST['password']);
$movil = $_POST['movil'];
$hoy = date("Y-m-d");
/* --------------------SERVER INFO------------------------*/
$user="root";
$host="localhost";
$password="";
/* --------------------SERVER CONNECTION------------------*/
if( empty($_POST['name'])||empty($_POST['email'])||empty($_POST['password']))
{
echo "Esta vacio";
}
else{
$database = "qes";
$connection = mysql_connect($host,$user,$password)
	or die ("couldn’t connect to server");
$db = mysql_select_db($database,$connection)
	or die ("Couldn’t select database");
$chck = "SELECT `loginName` FROM `member` WHERE `loginName`='$name'";
$checkres = mysql_query($chck)
	or die (mysql_error());
	if(mysql_num_rows($checkres)==0)
	{
	$query = "INSERT INTO member (loginName,password,createDate,email,phone)
		VALUES ('$name','$pass','$hoy','$email','$movil')";
	$result = mysql_query($query)
		or die ("Couldn’t execute query.");
	$qry = ("SELECT * FROM member WHERE loginName = '$name'");
	$res = mysql_query($qry)
	or die(mysql_error());
	$row= mysql_fetch_row($res);
	$id = $row[5];
	$table = "tabla".$id[0];
	$query2 = mysql_query("CREATE TABLE $table(Sigo CHAR (20),Abierto CHAR (20))");
  			echo
			"<SCRIPT LANGUAGE='javascript'>
			 location.href = 'index.html';
			 </script>";
			 }
else{
	echo "user allready exists";
}}
/* ----------------ENCRYPTION FUNCTION--------------------*/
function has($parametro)
{
return (hash('whirlpool',$parametro));
}
?>
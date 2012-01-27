<?php session_start();
$user="root";
$host="localhost";
$password="";
$database="qes";
		$connection = mysql_connect($host,$user,$password)
			or die ("couldn’t connect to server");
		$db = mysql_select_db($database,$connection)
			or die ("Couldn’t select database");
$strin = $_GET['term'];
$query = ("SELECT * FROM member WHERE loginName LIKE '%$strin%'");
$resulta = mysql_query($query)
	or die(mysql_error());
while($row= mysql_fetch_array($resulta)){
$strin = str_replace(' ','_',$row['loginName']);

echo $row['loginName'];
}
?>

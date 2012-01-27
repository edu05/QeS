<?php session_start();

$user="root";
$host="localhost";
$password="";
if( empty($_POST['email'])||empty($_POST['pass']))
{
echo "Esta vacio";
}
else{
$email = $_POST['email'];
$pass = has($_POST['pass']);
$datetime = new DateTime;
$time = $datetime->format('Y/m/d H:i:s');
$database = "qes";
$connection = mysql_connect($host,$user,$password)
	or die ("couldn’t connect to server");
$db = mysql_select_db($database,$connection)
	or die ("Couldn’t select database");
$chck = "SELECT `email` FROM `member` WHERE `email`='$email'";
$checkres = mysql_query($chck)
	or die (mysql_error());
	if(mysql_num_rows($checkres)==0)
	{
	echo "User doesn't exists";
	}
	else{
	echo "Pues si estas<br>";
	$qry='SELECT password, email, loginName,phone, UserId FROM member WHERE email=\''.$email.'\'';
	$reslt = mysql_query($qry)
		or die(mysql_error());
	if(mysql_num_rows($reslt) == 0)
	{
	echo $pass."<br>";
	echo "User doesn't exist";
	}
	else{
	if($row = mysql_fetch_array($reslt)){
		if($row["password"] == $pass){
			$nombre = $row['loginName'];
			$query = "INSERT INTO login (loginName,loginTime)
				VALUES ('$nombre','$time')";
			$result = mysql_query($query)
				or die ("Couldn’t execute query.");
			$_SESSION["k_username"] = $row['loginName'];
			$_SESSION["k_email"] = $row['email'];
			$_SESSION["k_phone"] = $row['phone'];
			$_SESSION["k_UserId"]=$row['UserId'];
			echo
			"<SCRIPT LANGUAGE='javascript'>
			 location.href = 'main.php';
			 </script>";
	}else{
	echo "Wrong pass";
	}
	}}}}
function has($parametro)
{
return (hash('whirlpool',$parametro));
}
?>
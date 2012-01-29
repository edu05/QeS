<?php
$user="root";
$host="localhost";
$password="";
$connection = mysql_connect($host,$user,$password)
	or die ("couldn’t connect to server");
$query = mysql_query("CREATE DATABASE qes");
$database = "qes";
$db = mysql_select_db($database,$connection)
			or die ("Couldn’t select database");
$member = mysql_query("CREATE TABLE member(loginName varchar (20),password CHAR (255),createDate char(64),email char(64),phone CHAR (13), UserId int NOT NULL AUTO_INCREMENT, 
PRIMARY KEY(UserId))");
$login = mysql_query("CREATE TABLE login(loginName char(20),loginTime datetime)");
$images = mysql_query("CREATE TABLE images(Userid int(20),filename varchar(255),mime_type varchar(255),file_size int(11),file_data longblob)")

echo "Succes";
?>

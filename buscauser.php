<?php
class Usuarios
{
    public function  __construct() {
$user="root";
$host="localhost";
$password="";
$database="qes";
		$connection = mysql_connect($host,$user,$password)
			or die ("couldn’t connect to server");
		$db = mysql_select_db($database,$connection)
			or die ("Couldn’t select database");
    }

    public function buscarUsuario($nombreUsuario){
        $datos = array();

        $sql = "SELECT * FROM member
                WHERE loginName LIKE '%$nombreUsuario%'";

        $resultado = mysql_query($sql);

        while ($row = mysql_fetch_array($resultado, MYSQL_ASSOC)){
            $datos[] = array("value" => $row['loginName']);
        }

        return $datos;
    }
}
?>
<?php
include_once 'buscauser.php';

$usuario = new Usuarios();

echo json_encode($usuario->buscarUsuario($_GET['term']));
?>
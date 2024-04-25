<?php 
require_once('./includes/Cliente.php');

if($_SERVER['REQUEST_METHOD']== 'POST' && isset($_GET['nombre_empresa'])
&& isset($_GET['direccion']) && isset($_GET['telefono']) && isset($_GET['correo'])){
    Cliente::create_cliente($_GET['nombre_empresa'], $_GET['direccion'], $_GET['telefono'], $_GET['correo']);

}



?>
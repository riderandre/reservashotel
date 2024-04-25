<?php 
require_once('./includes/Cliente.php');
 
if($_SERVER['REQUEST_METHOD']== 'PUT'  && isset($_GET['id'])  && isset($_GET['nombre_empresa'])
&& isset($_GET['direccion']) && isset($_GET['telefono']) && isset($_GET['correo'])){
    Cliente::update_cliente($_GET['id'], $_GET['nombre_empresa'], $_GET['direccion'], $_GET['telefono'], $_GET['correo']);
}


?>
<?php 
require_once('./includes/Cliente.php');

if($_SERVER['REQUEST_METHOD']== 'DELETE' && isset($_GET['id'])){
    Cliente::delete_cliente($_GET['id']);
}
?>
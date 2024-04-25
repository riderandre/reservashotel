<?php
require_once('./includes/Cliente.php');

 if($_SERVER['REQUEST_METHOD'] == 'GET'){
    Cliente::get_all_cliente();
 }

?>
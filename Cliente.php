<?php
require_once('Database.php');

class Cliente{

    public static function create_cliente($nombre_empresa, $direccion, $telefono, $correo){
        $database = new Database();
        $conn = $database->getConnection();
        $stmt = $conn->prepare('INSERT INTO cliente (nombre_empresa, direccion , telefono, correo) VALUES (:nombre_empresa, :direccion, :telefono, :correo)');
        $stmt->bindParam(':nombre_empresa', $nombre_empresa);
        $stmt->bindParam(':direccion', $direccion); 
        $stmt->bindParam(':telefono', $telefono); 
        $stmt->bindParam(':correo', $correo);  
        if($stmt->execute()){
            // Cliente guardado correctamente
            http_response_code(201);
            echo json_encode(array("message" => "Cliente guardado con éxito."));
        }else{
            // Error al guardar el cliente
            http_response_code(500);
            echo json_encode(array("message" => "No se ha podido guardar el cliente."));
        }
    }
   
    public static function delete_cliente($id){
        $database = new Database();
        $conn = $database->getConnection();
        $stmt = $conn->prepare('DELETE FROM cliente WHERE id=:id');
        $stmt->bindParam(':id', $id);

        if($stmt->execute()){
            http_response_code(201);
            echo json_encode(array("message" => "Cliente borrado con éxito."));
        }else{
            http_response_code(500);
            echo json_encode(array("message" => "No se ha podido borrar el cliente."));
        }
    }

    public static function get_all_cliente(){
        $database = new Database();
        $conn = $database->getConnection();
        $stmt = $conn->prepare('SELECT * FROM cliente');       
        if($stmt->execute()){
            $result = $stmt->fetchAll();
            http_response_code(201);
            echo json_encode($result);
        }else{
            http_response_code(500);
            echo json_encode(array("message" => "No se ha podido consultar los clientes."));
        }
    }

    public static function update_cliente($id, $nombre_empresa, $direccion, $telefono, $correo){
        $database = new Database();
        $conn = $database->getConnection();
        $stmt = $conn->prepare('UPDATE cliente SET nombre_empresa=:nombre_empresa, direccion=:direccion, telefono=:telefono, correo=:correo WHERE id=:id');
        $stmt->bindParam(':nombre_empresa', $nombre_empresa);
        $stmt->bindParam(':direccion', $direccion); 
        $stmt->bindParam(':telefono', $telefono); 
        $stmt->bindParam(':correo', $correo);  
        $stmt->bindParam(':id', $id);  
        
        if($stmt->execute()){
            http_response_code(201);
            echo json_encode(array("message" => "Cliente actualizado correctamente."));
        }else{
            http_response_code(500);
            echo json_encode(array("message" => "No se ha podido actualizar el cliente."));
        }
    }
}

<?php
    require("./conexion.php");
    $data = json_decode(file_get_contents('php//input'), true);
    $name = $data['Username'];
    $quantity = $data['Coment'];

    $conexion = new Conexion();
    $db = $conexion->getConexion();
    $query = "INSERT INTO comentarios (Username, Coment) VALUES (:name,:quantity)";
    $statement = $db->prepare($query);
    $statement->bindParam(":name", $name);
    $statement->bindParam(":quantity", $quantity);
    $result = $statement->execute();

    if($result){
        return "successfully";
    }
        return "error";

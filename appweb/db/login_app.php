<?php
    include 'conexion.php';

    $username=$link->real_escape_string($_POST['usuario']);
    $password=$link->real_escape_string($_POST['password']);

    //$username="klero";
    //$password="abc1234";

    $sentencia=$link->prepare("SELECT * fROM personal WHERE username=? AND password=? AND privilegio='Super_User'");
    $sentencia->bind_param('ss', $username, $password);
    $sentencia->execute();

    $resultado=$sentencia->get_result();

    if($fila=$resultado->fetch_assoc()){
        //echo json_encode($fila, JSON_UNESCAPED_UNICODE);
        $fila="Ingresastes correctamente";
        echo json_encode($fila, JSON_UNESCAPED_UNICODE);
    }else{
        $fila="Fallo el inicio de sesion";
        echo json_encode($fila, JSON_UNESCAPED_UNICODE);
    }
    $sentencia->close();
    $link->close();
?>
<?php

if(!empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH'])=='xmlhttprequest'){
    require 'conexion.php';
    session_start();
    $link->set_charset('utf8');
    $username = $link->real_escape_string($_POST['userlg']);
    $password = $link->real_escape_string($_POST['passlg']);

    if($nueva_consulta=$link->prepare("SELECT nombre, privilegio FROM personal WHERE username = ? AND password = ?")){
        $nueva_consulta->bind_param('ss', $username, $password);
        $nueva_consulta-> execute();
        $resultado=$nueva_consulta->get_result();
        if($resultado->num_rows==1){
            $datos=$resultado->fetch_assoc();
            $_SESSION['usuario']=$datos;
            if($_SESSION['usuario']['privilegio']=="Admin"){
                $datos=2;
                echo json_encode($datos);
            }else if($_SESSION['usuario']['privilegio']=="Super_User"){
                $datos=1;
                echo json_encode($datos);
            }else{
                $datos=0;
                echo json_encode($datos);
            }
        }else{
            $datos=3;
            echo json_encode($datos);
        }
        $nueva_consulta->close();
    }
}
$link->close();

?>
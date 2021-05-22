<?php
require 'conexion.php';

$id_user=(isset($_POST['id_user'])) ? $_POST['id_user']:'';
$id_auto=(isset($_POST['id_auto'])) ? $_POST['id_auto']:'';
$km=(isset($_POST['km'])) ? $_POST['km']:'';
$gas=(isset($_POST['gas'])) ? $_POST['gas']:'';
$nota=(isset($_POST['nota'])) ? $_POST['nota']:'';
$opcion=(isset($_POST['opcion'])) ? $_POST['opcion']:'';
$gasolina=(isset($_POST['gasolina'])) ? $_POST['gasolina']:'';

$fecha = date("Y-m-d H:i:s");

switch($opcion){
    case 1:
        $consulta = mysqli_query($link, "INSERT INTO entradas_salidas (id_user, id_auto, km_salida, gas_salida, hora_entrada) 
        VALUES('$id_user', '$id_auto', '$km', '$gas', '0000-00-00 00:00:00')");	

        if($consulta){
            echo "Registro insertado";
        }else{
            echo "Fallo el registro: ".$id_user;
            
        }

        break;    
    case 2:        
        $consulta = mysqli_query($link, "UPDATE entradas_salidas 
        SET km_entrada='$km', gas_entrada='$gas', nota='$nota', hora_entrada='$fecha' 
        WHERE id_user='$id_user' AND id_auto='$id_auto'");

        if($consulta){
            echo "Registro insertado ".$gasolina;
        }else{
            echo "Fallo el registro: ".$id_user;
        }
        break;
    }
    $conexion=null;
?>
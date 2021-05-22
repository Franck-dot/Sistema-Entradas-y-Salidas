<?php
include_once '../db/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$apellido = (isset($_POST['apellido'])) ? $_POST['apellido'] : '';
$dependencia = (isset($_POST['dependencia'])) ? $_POST['dependencia'] : '';
$username = (isset($_POST['username'])) ? $_POST['username'] : '';
$password = (isset($_POST['password'])) ? $_POST['password'] : '';
$tipo_user = (isset($_POST['tipo_user'])) ? $_POST['tipo_user'] : '';

$marca = (isset($_POST['marca'])) ? $_POST['marca'] : '';
$modelo = (isset($_POST['modelo'])) ? $_POST['modelo'] : '';
$no_placas = (isset($_POST['no_placas'])) ? $_POST['no_placas'] : '';
$dependencia_auto = (isset($_POST['dependencia_auto'])) ? $_POST['dependencia_auto'] : '';

$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$user_id = (isset($_POST['id_user'])) ? $_POST['id_user'] : '';
$id_auto = (isset($_POST['id_auto'])) ? $_POST['id_auto'] : '';

$gas = (isset($_POST['gas'])) ? $_POST['gas'] : '';
$km = (isset($_POST['km'])) ? $_POST['km'] : '';
$nota = (isset($_POST['nota'])) ? $_POST['nota'] : '';
$hora = (isset($_POST['hora'])) ? $_POST['hora'] : '';

switch($opcion){
    case 1:
        $consulta = "INSERT INTO personal (id_user, nombre, apellido, dependencia, username, password, privilegio) VALUES('$user_id', '$nombre', '$apellido', '$dependencia', '$username', '$password', '$tipo_user') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
    
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC); 
        $consulta = "SELECT * FROM personal ORDER BY id_user DESC LIMIT 1";
        break;    
    case 2:        
        $consulta = "UPDATE personal SET nombre='$nombre', apellido='$apellido', dependencia='$dependencia', username='$username', password='$password', privilegio='$tipo_user' WHERE id_user='$user_id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();

        $consulta = "SELECT * FROM personal WHERE id_user='$user_id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 3:        
        $consulta = "DELETE FROM personal WHERE id_user='$user_id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;
    case 4:    
        $consulta = "SELECT * FROM personal";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 5:
        $consulta = "INSERT INTO vehiculos (id_auto, marca, modelo, no_placas, dependencia_autos) 
                        VALUES('$id_auto', '$marca', '$modelo', '$no_placas', '$dependencia_auto')";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM vehiculos ORDER BY id_auto DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);   
        break;
    case 6:
        $consulta = "UPDATE vehiculos SET marca='$marca', modelo='$modelo', no_placas='$no_placas', dependencia_autos='$dependencia_auto' WHERE id_auto='$id_auto' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM vehiculos WHERE id_auto='$id_auto' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 7:
        $consulta = "DELETE FROM vehiculos WHERE id_auto='$id_auto' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        break;
    case 8:
        $consulta = "SELECT * FROM vehiculos";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 9:
        $consulta = "SELECT personal.nombre, apellido, dependencia, vehiculos.id_auto, modelo, entradas_salidas. hora_entrada, hora_salida
        FROM personal, vehiculos, entradas_salidas 
        WHERE personal.id_user = entradas_salidas.id_user AND vehiculos.id_auto=entradas_salidas.id_auto ";
        $resultado = $conexion -> prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 10:
        $consulta = "SELECT * FROM entradas_salidas WHERE km_entrada IS NULL OR gas_entrada IS NULL";
        $resultado = $conexion -> prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 11:
        $consulta = "INSERT INTO entradas_salidas(id_user, id_auto, km_salida, gas_salida, hora_entrada) 
                    VALUES('$user_id', '$id_auto', '$km', '$gas', '0000-00-00 00:00:00')";
        $resultado = $conexion -> prepare($consulta);
        $resultado->execute();

        $consulta = "SELECT * FROM entradas_salidas WHERE km_entrada IS NULL OR gas_entrada IS NULL";
        $resultado = $conexion -> prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 12:        
        $consulta = "UPDATE entradas_salidas SET km_entrada='$km', gas_entrada='$gas', nota='$nota', hora_entrada='$hora' 
        WHERE id_user='$user_id' AND id_auto='$id_auto'";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM entradas_salidas WHERE id_user='$user_id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 13:
        $cosulta="SELECT DISTINCT personal. nombre, apellido, dependencia, entradas_salidas. id_auto, nota, hora_entrada
        FROM personal, entradas_salidas
        WHERE personal.id_user='$user_id' AND entradas_salidas.id_auto='$id_auto' ORDER BY entradas_salidas.hora_salida";
        $resultado=$conexion->prepare($cosulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    }
print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;
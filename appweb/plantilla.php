<?php
        include "vistas/in_out.php";
        include "vistas/inicio.php";
        include "vistas/personal.php";
        include "vistas/reportes.php";
        include "vistas/vehiculos.php";

        if(isset($_GET["ruta"])){

            if ($_GET["ruta"] == "inicio" || 
                $_GET["ruta"] == "personal" || 
                $_GET["ruta"] == "reportes"  ||
                $_GET["ruta"] == "vehiculos" ||
                $_GET["ruta"] == "entradas/salidas"){
            
                include "modulos/".$_GET["ruta"].".php";
        
        }
    }

    ?>
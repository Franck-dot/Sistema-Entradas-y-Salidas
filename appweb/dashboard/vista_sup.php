<?php
  session_start();
  if(isset($_SESSION['usuario'])){
    if($_SESSION['usuario']['privilegio'] != "Admin"){
      header('Location: ../vistas/in_out.php');
    }
  }else{
    header('Location: ../../index.php');
  }
?>

<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" href="../img/logo_pequeño.png" />

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <link href="../css/dashboard.css" rel="stylesheet" type="text/css">
    
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">

    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

    <!-- JQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>


    <style>
        .bd-placeholder-img {
          font-size: 1.125rem;
          text-anchor: middle;
          -webkit-user-select: none;
          -moz-user-select: none;
          user-select: none;
        }
  
        @media (min-width: 768px) {
          .bd-placeholder-img-lg {
            font-size: 3.5rem;
          }
        }
    </style>
    
    <title>SISTEMA INTEGRAL MUNICIPAL</title>

  </head>
  <body>

    <!--Navbar superior-->
    <header class=" sticky-top bg-danger shadow">
    <nav class="navbar container">
                <button class="navbar-toggler d-md-none text-white" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="true" aria-label="Toggle navigation">
                    <span class="material-icons">menu</span> 
                </button>

                <div class="navbar-logo">
                    <img src="../img/logo_pequeño_icon.png" alt="" width="60">
                </div>

                <!-- Dropdown - User -->
                <div class="nav-item dropdown text-white" id="posicion">
                     
                    <Buttom class="dropdown-toggle nav-link" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-white"><?php echo $_SESSION['usuario']['nombre'] ?></span>
                        <img class="img-profile rounded-circle" src="../img/jefe.svg" width="35">
                    </Buttom>

                    <div class="dropdown-menu dropdown-menu-right">
                        <a class="dropdown-item" href="../vistas/help.html" target="_blank">Ayuda</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="../db/logout.php">Cerrar Sesion</a>
                    </div>
                </div>
    </nav>
        
    </header>
    <!--Fin Navbar-->

 <!--Navbar Lateral-->
  <section  class="container-fluid" class="fondo">
  
        <div class="row">
            <nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
                <div class="position-sticky pt-3">
                    <ul class="nav flex-column">
                        <br>
                        <li class="nav-item"> 
                            <a class="nav-link" aria-current="page" href="../vistas/inicio.php">
                                <span class="material-icons">home</span>  
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../vistas/Vehiculos.php">
                                <span class="material-icons">directions_car</span> 
                                Vehiculos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../vistas/personal.php">
                                <span class="material-icons">supervisor_account</span> 
                                Personal
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../vistas/reportes.php">
                                <span class="material-icons">analytics</span>    
                                Reportes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../qr_codes/codigosQR.php">
                                <span class="material-icons">qr_code_2</span> 
                                Asigancion de QR
                            </a>
                        </li>
                
                    </ul>

                    </div>
            </nav>
        </div>
 
  </section>
     <!--Fin Navbar-->
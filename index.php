<?php
  session_start();
  if(isset($_SESSION['usuario'])){
    if($_SESSION['usuario']['privilegio']=="Admin"){
      header('Location: appweb/vistas/inicio.php');
    }else if($_SESSION['usuario']['privilegio']=="Super_User"){
      header('Location: appweb/vistas/in_out.php');
    }
  }
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">

    <!--Estylos css personalizados-->
    <link href="appweb/css/signin.css" rel="stylesheet">

    <script
  src="https://code.jquery.com/jquery-3.5.1.min.js"
  integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
  crossorigin="anonymous"></script>
    
    <script src="appweb/js/login.js"></script>

    <title>Sistema Integral</title>
  </head>
  <body class="text-center">
        <main class="form-signin">
          <form method="POST" id="formLogin">

            <img class="mb-4" src="appweb/img/logo.png" alt="" width="92" height="92">
            
            <h1 class="h3 mb-3 fw-normal">Sistema Integral</h1>
            <input type="text" id="userlg" pattern="[A-Za-z0-9_-]{1,15}" class="form-control" placeholder="Usuario" required autofocus>
            <br>
            <input type="password" id="passlg" pattern="[A-Za-z0-9_-]{1,15}" class="form-control" placeholder="Contraseña" required >
            <br>
            <button class="w-100 btn btn-lg btn-danger" type="submit" id="btnAdd"></button>
          
          </form>
          <br>
          <br>
          <p class="mt-5 mb-3 text-muted">Franck-dot</p>
        </main>

  </body>
</html>
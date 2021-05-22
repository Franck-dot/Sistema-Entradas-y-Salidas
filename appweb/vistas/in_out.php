<?php
  session_start();
  if(isset($_SESSION['usuario'])){
    if($_SESSION['usuario']['privilegio'] != "Super_User"){
      header('Location: appweb/vistas/inicio.php');
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
  <main class="col-md-12 ms-sm-auto col-lg-12 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Entradas/Salidas</h1>
          <a class="" href="../db/logout.php">Cerrar Sesion</a>
        </div>

        <div class="container">

        </div>

    <div class="container">
        <div class="row">
            <div class="col-lg-12">            
            <button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal">Agregar</button>    
            </div>    
        </div>    
    </div>

        <br>

        
    <div class="container caja">
        <div class="row">
            <div class="col-lg-12">
            <div class="table-responsive">        
                <table id="tablaEntradasSalidas" class="table table-striped table-bordered table-condensed" style="width:100%" >
                    <thead class="text-center">
                        <tr>
                            <th scope="col">Id User</th>
                            <th scope="col">Id Auto</th>
                            <th scope="col">km Entrada</th>                                
                            <th scope="col">km Salida</th>  
                            <th scope="col">Comb. Entrada</th>
                            <th scope="col">Comb. Salida</th>
                            <th scope="col">Notas</th>
                            <th scope="col">Hora Entrada</th>
                            <th scope="col">Hora Salida</th>
                            <th scope="col">Accion</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">                           
                    </tbody>        
                </table>               
            </div>
            </div>
        </div>  
    </div>
        
        <br>
        <br>
    
<!--Modal para Salidas-->
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
            </div>
        <form id="formINOUT">    
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="" class="col-form-label">Id Usuario</label>
                            <input type="text" class="form-control" id="id_user">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="" class="col-form-label">Id Auto</label>
                            <input type="text" class="form-control" id="id_auto">
                        </div>
                    </div>     
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="" class="col-form-label">Kilometraje</label>
                            <input type="text" class="form-control" id="km">
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="" class="col-form-label">Nivel de combustile</label>
                            <input type="text" class="form-control" id="gas">
                        </div> 
                    </div>    
                </div>
                <div class="row ocultar">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="" class="col-form-label">Nota</label>
                            <input type="text" class="form-control" id="nota">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default cerrarModalInOut">Close</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div> 

</main>
    <!-- JQuery -->
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.min.js" crossorigin="anonymous"></script>
   
    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js" integrity="sha384-q2kxQ16AaE6UbzuKqyBE9/u/KzioAlnx2maXQHiDX9d4/zp8Ok3f+M7DPm+Ib6IU" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.min.js" integrity="sha384-pQQkAEnwaBkjpqZ8RU1fF1AKtTcHJwFl3pblpTlHXybJjHpMYo79HY3hIi4NKxyj" crossorigin="anonymous"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js"></script>

    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>

    <script type="text/javascript" src="../js/main.js" crossorigin="anonymous"> </script>

  </body>
</html>
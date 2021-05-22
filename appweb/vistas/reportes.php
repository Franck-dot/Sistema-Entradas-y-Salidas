<?php require_once "../dashboard/vista_sup.php" ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Reportes</h1>
        </div>
      <br>                
    <div class="container caja">
        <div class="row">
            <div class="col-lg-12">
            <div class="table-responsive">        
                <table id="tablaReportes" class="table table-striped table-bordered table-condensed" style="width:100%" >
                    <thead class="text-center">
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th> 
                            <th scope="col">Dependecia</th>                                
                            <th scope="col">Id Auto</th>  
                            <th scope="col">Modelo</th>
                            <th scope="col">Fecha Entrada</th>
                            <th scope="col">Fecha Salida</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">                           
                    </tbody>
                </table>               
            </div>
            </div>
        </div>  
    </div>
      
</main>

<?php require_once "../dashboard/vista_inf.php" ?>
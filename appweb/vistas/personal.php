<?php require_once "../dashboard/vista_sup.php"?>
        
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Personal</h1>
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
                <table id="tablaUsuarios" class="table table-striped table-bordered table-condensed" style="width:100%" >
                    <thead class="text-center">
                        <tr>
                            <th scope="col">Id User</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>                                
                            <th scope="col">Dependencia</th>  
                            <th scope="col">Usuario</th>
                            <th scope="col">Contraseña</th>
                            <th scope="col">Tipo User</th>
                            <th scope="col">Acciones</th>
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
    
<!--Modal para CRUD-->
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
            </div>
        <form id="formUsuarios">    
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label for="" class="col-form-label">Identificador</label>
                            <input type="text" class="form-control" id="id_user">
                        </div>
                    </div>   
                </div>
                <div class="row">
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre">
                    </div>
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">Apellido</label>
                    <input type="text" class="form-control" id="apellido">
                    </div> 
                    </div>    
                </div>
                <div class="row"> 
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">Dependencias</label>
                    <input type="text" class="form-control" id="dependencia">
                    </div>               
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">Usuario</label>
                    <input type="text" class="form-control" id="username">
                    </div>
                    </div>  
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <div class="form-group">
                        <label for="" class="col-form-label">Contraseña</label>
                        <input type="text" class="form-control" id="password">
                        </div>
                    </div>    
                    <div class="col-lg-6">    
                        <div class="form-group">
                            <label for="" class="col-form-label">Tipo User</label>
                            <select id="tipo_user" class="form-control">
                                <option value="Admin">Admin</option>
                                <option value="Super_User">Super_User</option>
                                <option value="Usuario">Usuario</option>
                            </select>
                        </div>            
                    </div>    
                </div>                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default cerrarModal">Close</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div> 

</main>
    
<?php require_once "../dashboard/vista_inf.php"?>
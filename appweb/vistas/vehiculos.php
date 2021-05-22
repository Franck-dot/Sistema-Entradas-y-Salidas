<?php require_once "../dashboard/vista_sup.php" ?>

<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Vehiculos</h1>
        </div>

<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <button id="btnNuevoAuto" type="button" class="btn btn-success" data-toggle="modal">Agregar</button>
        </div>
    </div>
</div>

<br>

<div class="container caja">
    <div class="row">
        <div class="col-lgl12">
            <div class="table-responsive">
                <table id="tablaVehiculos" class="table table-striped table-bordered table-condensed" style="width: 100%;">
                    <thead class="text-center">
                        <tr>
                            <th scope="col">Id Auto</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Modelo</th>
                            <th scope="col">Num Placas</th>
                            <th scope="col">Dependencia</th>
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

<!-- modal -->
<div class="modal fade" id="modalCRUDAUTO" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-tittle" id="exampleModalLaber"></h5>
            </div>
            <form id="formVehiculos">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="col-form-label">Identificador</label>
                                <input type="text" class="form-control" id="id_auto">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="col-form-label">Marca</label>
                                <input type="text" class="form-control" id="marca">
                            </div>
                        </div>
                    
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="col-form-label">Modelo</label>
                                <input type="text" class="form-control" id="modelo">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="col-form-label">Numero de placas</label>
                                <input type="text" class="form-control" id="no_placas">
                            </div>
                        </div>
                   
                        <div class="col-lg-6">
                            <div class="form-group">
                                <label class="col-form-label">Dependencia</label>
                                <input type="text" class="form-control" id="dependencia_auto">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light cerrarModalAuto">Cerrar</button>
                    <button type="submit" class="btn btn-dark" id="btnGuardarAuto">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

</main>

<?php require_once "../dashboard/vista_inf.php" ?>
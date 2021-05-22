<?php require_once "../dashboard/vista_sup.php"?> 
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h1 class="h2">Dashboard</h1>
  </div>

    <script type="text/javascript" src="https://www.chartjs.org/dist/2.9.4/Chart.min.js"></script>
    <script type="text/javascript" src="https://www.chartjs.org/samples/latest/utils.js"></script>
    <script src="../js/data.js"></script>

  <section class="container" style="width:80%;">
      <canvas id="canvas"></canvas>
  </section>

  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
      <h2 class="h2" id="respuesta4">Notas</h2>
  </div>
  
  <form id="busqueda" >
    <div class="col-3">
      <label for="">Busqueda</label>
      <input type="text" class="form-control" id="id_user" placeholder="Ingrese Id Usuario">
      <br>
      <input type="text" class="form-control" id="id_auto" placeholder="Ingrese Id Auto">
      <br>
      <button class="btn bg-primary text-light" type="submit">Buscar</button>
    </div>
  </form>
  <br>
  <div id="cont">
    <div class="card" id="resultado">
      <table class="table table-responsive">
        <thead class="text-center">
          <tr>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Dependecia</th>
            <th>Id Auto</th>
            <th>Modelo</th>
            <th>Nota</th>
            <th>Hora Ingreso</th>
          </tr>
        </thead>
        <tbody class="text-center">
          <tr>
              <td id="dato1"></td>
              <td id="dato2"></td>
              <td id="dato3"></td>
              <td id="dato4"></td>
              <td id="dato5"></td>
              <td id="dato6"></td>
              <td id="dato7"></td>
            </tr>
        </tbody>
      </table>
    </div>
  </div>
  <br>

</main>
<?php require_once "../dashboard/vista_inf.php"?>
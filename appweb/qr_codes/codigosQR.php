<?php require_once "../dashboard/vista_sup.php"?>
        
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
          <h1 class="h2">Asignacion de codigos QR</h1>
        </div>

        <div class="container" style="min-height:500px;">
            <div class="container">     
                
                <div class="col-md-3">
                    <form class="form-horizontal" method="post" id="codeForm" onsubmit="return false">
                        <div class="form-group">
                            <label class="control-label">Información : </label>
                            <input class="form-control col-xs-1" id="content" type="text" required="required">
                        </div>
                        <div class="form-group">
                            <label class="control-label">Nivel del código (ECC) : </label>
                            <select class="form-control col-xs-10" id="ecc">
                                <option value="H">H - Mejor</option>
                                <option value="M">M</option>
                                <option value="Q">Q</option>
                                <option value="L">L - Peor</option>                         
                            </select>
                        </div>
                        <div class="form-group">
                            <label class="control-label">Tamaño : </label>
                            <input type="number" min="1" max="10" step="1" class="form-control col-xs-10" id="size" value="5">
                        </div>
                        <br>
                        <div class="form-group">
                            <label class="control-label"></label>
                            <input type="submit" name="submit" id="submit" class="btn btn-success" value="Generar código QR">
                        </div>
                    </form>
                </div>
                <br>
                <br>
                <div class="col-md-6">
                    <div class="showQRCode">
                        
                    </div>
                </div>
            </div>
        </div>

</main>
    
<?php require_once "../dashboard/vista_inf.php"?>
<?php
include '../assets/include/includeCrud.php';
include '../conexion/conection.php';
include '../assets/include/navbarJuegos.php';

?>

    <div class="container mt-4 mb-2"> </div> <br>
    <div class="container mt-5">
        <div class="row">
            <div class="col-lg-12">            
            <button id="btnNuevo" type="button" class="btn btn-info" data-toggle="modal"><i class="material-icons">library_add</i></button>    
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
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Estado</th>                                
                            <th>F.Salida</th>  
                            <th>F.Cracked</th>
                            <th>Cracked</th>
                            <th>Descarga</th>
                            <th>Imagen</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>                           
                    </tbody>        
                </table>               
            </div>
            </div>
        </div>  
    </div>   

<!--Modal para CRUD-->
<div class="modal fade" id="modalCRUD" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span>
                </button>
            </div>
        <form id="formJuegos">    
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-8">
                    <div class="form-group">
                    <label for="" class="col-form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" placeholder="Nombre del juego" required>
                    </div>
                    </div>
                    <div class="col-lg-4">
                    <div class="form-group">
                    <label for="" class="col-form-label">Estado</label>
                    <select id="juegoEstado" class="form-control">
                        <option value="Cracked">Cracked</option>
                        <option value="Uncracked">Uncracked</option>
                    </select>
                    </div> 
                    </div>    
                </div>
                <div class="row"> 
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">Fecha Salida</label>
                    <input type="text" class="form-control" id="fechaSalida" placeholder="AAAA-MM-DD" required>
                    </div>               
                    </div>
                    <div class="col-lg-6">
                    <div class="form-group">
                    <label for="" class="col-form-label">Fecha Cracked</label>
                    <input type="text" class="form-control" id="fechaCracked" placeholder="AAAA-MM-DD">
                    </div>
                    </div>  
                </div>
                <div class="row">
                    <div class="col-lg-4">
                        <div class="form-group">
                        <label for="" class="col-form-label">Cracked</label>
                        <input type="text" class="form-control" id="nombreCrack" placeholder="nombre">
                        </div>
                    </div>    
                    <div class="col-lg-8">    
                        <div class="form-group">
                        <label for="" class="col-form-label">Link Descarga</label>
                        <input type="text" class="form-control" id="linkDescarga" placeholder="link de descarga">
                        </div>            
                    </div>    
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                        <label for="" class="col-form-label">Imagen</label>
                        <input type="text" class="form-control" id="imagen" placeholder="link imagen" required>
                        </div>
                    </div>     
                </div>                  
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancelar</button>
                <button type="submit" id="btnGuardar" class="btn btn-dark">Guardar</button>
            </div>
        </form>    
        </div>
    </div>
</div>  

     <!-- jQuery, Popper.js, Bootstrap JS -->
     <script src="../assets/js/plugins/jquery-3.3.1.min.js"></script>
    <script src="../assets/js/core/popper/popper.min.js"></script>
    <script src="../assets/js/core/bootstrap.min.js"></script>
      
    <!-- datatables JS -->
    <script type="text/javascript" src="../assets/datatables/datatables.min.js"></script>    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />
    <script type="text/javascript" src="../assets/js/app.js"></script>  
</body>
</html>

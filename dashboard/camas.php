<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Camas </h1>
    
    
    
 <?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT id, nombre, estado FROM cama";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);

if($_POST){
 
    $id = (isset($_POST['id'])) ? $_POST['id'] : '';
    $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
    $estado = (isset($_POST['estado'])) ? $_POST['estado'] : '';
   
    
    $consulta = "INSERT INTO cama ( id, nombre, estado) VALUES('$id', '$nombre', '$estado' ) ";			
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
   
    var_dump($resultado);
    exit();
    }
    
?>


<div class="container">
        <div class="row">
            <div class="col-lg-12">            
            <button id="btnNuevo" type="button" class="btn btn-success" data-toggle="modal">Nuevo</button>    
            </div>    
        </div>    
    </div>    
    <br>  
<div class="container">
        <div class="row">
                <div class="col-lg-12">
                    <div class="table-responsive">        
                        <table id="tablaPersonas" class="table table-striped table-bordered table-condensed" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                
                                <th>ID </th>                               
                                <th>Serial</th>  
                                <th>Estatus</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            <tr>
                                <td>1</td>
                                <td>camaOp</td>
                                <td>activo</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>camaInt</td>
                                <td>activo</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>camaInt</td>
                                <td>activo</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>camaInt</td>
                                <td>inactivo</td>
                                <td></td>
                            </tr>
                            <tr>
                                <td>1</td>
                                <td>camaOp</td>
                                <td>activo</td>
                                <td></td>
                            </tr>
                            
                            
                                                
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
        <form id="form" method="post">    
            <div class="modal-body">
                <div class="form-group">
                <label for="id" class="col-form-label">ID:</label>
                <input type="text" name="id"class="form-control" id="id">
                </div>
                <div class="form-group">
                <label for="nombre" class="col-form-label">Nombre:</label>
                <input type="text" name="nombre"class="form-control" id="nombre">
                </div>                
                <div class="form-group">
                <label for="esatdo" class="col-form-label">Estatus:</label>
                <input type="text"  name="estado" class="form-control" id="estado">
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
      
    
    
</div>
<!--FIN del cont principal-->
<?php require_once "vistas/parte_inferior.php"?>
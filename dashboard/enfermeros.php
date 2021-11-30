<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Enfermeria </h1>
    
    
    
 <?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

$consulta = "SELECT  nombres, apellidos, tanda  FROM enfermero";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);


if($_POST){
 
    $nombre = (isset($_POST['nombres'])) ? $_POST['nombres'] : '';
    $apellido = (isset($_POST['apellidos'])) ? $_POST['apellidos'] : '';
    $tanda = (isset($_POST['tanda'])) ? $_POST['tanda'] : '';
   
    
    $consulta = "INSERT INTO enfermero ( nombres, apellidos, tanda) VALUES('$nombre', '$apellido', '$tanda' ) ";			
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
   
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
                                
                                <th>Nombre </th>                               
                                <th>Apellido</th>  
                                <th>Tanda</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($data as $dat) {                                                        
                            ?>
                            <tr>
                                <td><?php echo $dat['nombres'] ?></td>
                                <td><?php echo $dat['apellidos']?> </td>
                                <td><?php echo $dat['tanda'] ?></td>                                  
                                <td></td>
                            </tr>
                            <?php
                                }
                            ?>                                
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
        <form id="form" method="post" >     
            <div class="modal-body">
                <div class="form-group">
                <label for="nombres" class="col-form-label">Nombre:</label>
                <input type="text" name="nombres"class="form-control" id="nombres">
                </div>
                <div class="form-group">
                <label for="apellidos" class="col-form-label">Apellido:</label>
                <input type="text"  name="apellidos"class="form-control" id="apellidos">
                </div>                
                <div class="form-group">
                <label for="tanda" class="col-form-label">Tanda:</label>
                <input type="text" name="tanda"class="form-control" id="tanda">
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
<?php require_once "vistas/parte_superior.php"?>

<!--INICIO del cont principal-->
<div class="container">
    <h1>Pacientes </h1>
    
    
    
 <?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();


$consulta = "SELECT * FROM pacientes";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);  



if($_POST){
 
    $cedula = (isset($_POST['cedula'])) ? $_POST['cedula'] : '';
    $nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
    $apellido = (isset($_POST['apellido'])) ? $_POST['apellido'] : '';
    $sexo = (isset($_POST['sexo'])) ? $_POST['sexo'] : '';
    $fecha_creacion = (isset($_POST['fecha_creacion'])) ? $_POST['fecha_creacion'] : '';
    
    $consulta = "INSERT INTO pacientes (cedula, nombre, apellido, sexo, fecha_creacion) VALUES('$cedula', '$nombre', '$apellido', '$sexo', '$fecha_creacion') ";			
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
   
    }

    if($_GET){
        
        $id_paciente = $_GET['del'];
        
        $query = "DELETE FROM pacientes WHERE id_paciente ='$id_paciente'";
        $resultado = $conexion->prepare($query);
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
                                <th></th>
                                <th>Cedula</th>
                                <th>Nombre Completo</th>                               
                                <th>Sexo</th>  
                                <th>Fecha de Ingreso</th>
                                <th>Opciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php                            
                            foreach($data as $dat) {                                                        
                            ?>
                            <tr>
                                <td><?php echo $dat['id_paciente']?></td>
                                <td><?php echo $dat['Cedula'] ?></td>
                                <td><?php echo $dat['Nombre']?>   <?php  echo $dat['Apellido'] ?></td>
                                <td><?php echo $dat['Sexo'] ?></td>
                                <td><?php echo $dat['fecha_creacion'] ?></td>  
                                


                             
                                <?php
                                        echo"
                                        <td><a class='btn btn-primary btn-fw' href='editpaciente.php?id_paciente={$dat['id_paciente']}'>
                                        Edit
                                        </a>
                                        </td>
                                        <td>
                                        <a class='btn btn-danger btn-fw' href='pacientes.php?del={$dat['id_paciente']}'>
                                    Eliminar
                                        </a>
                                        </td>
                                    </tr>
                                    
                                    
                                    ";
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
        <form method="post" >    
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col-md-6">
                    <label for="cedula" class="col-form-label">Cedula:</label>
                    <input type="text" class="form-control" name="cedula">
                    </div>
                    <div class="form-group col-md-6">
                    <label for="direccion" class="col-form-label">Direccion:</label>
                    <input type="text"name="direccion" class="form-control" ">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                    <label for="nombre" class="col-form-label">Nombre:</label>
                    <input type="text"name="nombre" class="form-control" >
                    </div>                
                    
                    <div class="form-group col-md-6">
                    <label for="telefono" class="col-form-label">Telefono:</label>
                    <input type="text" class="form-control" name="sexo" id="telefono">
                    </div>

                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                    <label for="nombre" class="col-form-label">Apellido:</label>
                    <input type="text"name="apellido" class="form-control" >
                    </div>                
                    
                    <div class="form-group col-md-6">
                    <label for="email" class="col-form-label">Email:</label>
                    <input type="text" class="form-control" name="email" id="email">
                    </div>

                </div>
                <div class="row">
                
                    <div class="form-group col-md-6">
                    <label for="sexo" class="col-form-label">Sexo:</label>
                    <input type="text" class="form-control" name="sexo" id="sexo">
                    </div>

                    <div class="form-group col-md-6">
                    <label for="fecha" class="col-form-label">Fecha de creacion:</label>
                    <input type="date" class="form-control" name="fecha_creacion" id="fecha">
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
      
    
    
</div>
<!--FIN del cont principal-->
<?php require_once "vistas/parte_inferior.php"?>
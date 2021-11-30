<?php require_once "vistas/parte_superior.php";

include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();

/*
$id = $_GET['id_paciente'];
$consulta = "SELECT * FROM pacientes where id_paciente = '$id'";
$resultado = $conexion->prepare($consulta);
$resultado->execute();
$data=$resultado->fetchAll(PDO::FETCH_ASSOC);  

foreach ($data as $dat){
$name = $dat['nombre'];
$apellido = $dat['apellido'];
$cedula = $dat['cedula'];
$sexo = $dat['sexo'];
$direccion = $dat['direccion'];
$telefono = $dat['telefono'];
$fecha_creacion = $dat['fecha_creacion'];

}*/


if($_POST){
    $id = $_GET['id_paciente'];
	$nombre = $_POST['nombre'];
	$cedula = $_POST['cedula'];
	$apellido = $_POST['apellido'];
	$sexo = $_POST['sexo'];
	$direccion = $_POST['direccion'];
	$telefono = $_POST['telefono'];
	$fecha_creacion = $_POST['fecha_creacion'];
    
    $consulta = "Update pacientes set cedula='$cedula',nombre='$nombre',apellido='$apellido',sexo='$sexo',direccion='$direccion',telefono='$telefono',fecha_creacion='$fecha_creacion' where id_paciente='$id'";			
    $resultado = $conexion->prepare($consulta);
    $resultado->execute();
   
    }

 
 
?>




<style>
     @import url('https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;600&family=Quicksand:wght@300;600&display=swap');

*{
    font-family: 'Open Sans', sans-serif;
    font-family: 'Quicksand', sans-serif;
}
h3{
    text-align: center;
    font-weight: 800;
}
.btn{
     
     left: 100px;
height: 130%;
width: 30%;
border-radius: 5px;
border: none;
padding: 10px;
margin-left: 35%;
color: #fff;
font-size: 18px;
font-weight: 800;
letter-spacing: 1px;
cursor: pointer;

/* transition: all 0.3s ease; */
background: linear-gradient(50deg, rgb(7, 5, 20) 0%, rgb(40, 24, 90) 100%, rgb(22, 4, 63) 100%);    }
</style>
<div class="container">
        <div class="card">
            <div class="card-header">
                <h3>Registro de Pacientes</h3>
            </div>
            <form id = "" method="post" >
            <div class="card-body">
                <input type="hidden" name="idPaciente" id="idPaciente">
                <div class="row">
                    <div class="col-md-6">
                        <label for="nombre">Nombre:</label>
                        <input type="text" name="nombre" id="nombre"  placeholder="Nombre"  class="form-control" autofocus>
                    </div>
                    <div class="col-md-6">
                        <label for="apellido">Apellido:</label>
                        <input type="text" name="apellido" id="apellido"  placeholder="Apellido" class="form-control" autofocus>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="cedula">Cedula:</label>
                        <input type="text" name="cedula" id="cedula" placeholder="Cedula" class="form-control" autofocus>
                    </div>
                    <div class="col-md-6">
                        <label for="telefono">Telefono:</label>
                        <input type="text" name="telefono" id="telefono" placeholder="Telefono" class="form-control" autofocus>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-6">
                        <label for="sexo">Sexo:</label>
                        <input type="text" name="sexo" id="sexo" placeholder="Sexo" class="form-control" autofocus>
                    </div>
                    <div class="col-md-6">
                        <label for="direccion">Direccion:</label>
                        <input type="text" name="direccion" id="direccion" placeholder="Direccion" class="form-control" autofocus>
                    </div>

                </div>
                <div class="row">
                   
                    <div class="col-md-6">
                        <label for="fecha_creacion">Fecha:</label>
                        <input type="date" name="fecha_creacion" id="fecha_creacion" placeholder="Fecha de creacion" class="form-control" >
                    </div>
                   
                </div>


                
            </div>
            <div class="py-3 ">
                 <input class='btn ' type='submit' value='Update'>
                </div>
            </form>
        </div>
    </div>
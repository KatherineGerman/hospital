<?php
include_once '../bd/conexion.php';
$objeto = new Conexion();
$conexion = $objeto->Conectar();
// Recepción de los datos enviados mediante POST desde el JS   

$cedula = (isset($_POST['cedula'])) ? $_POST['cedula'] : '';
$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$apellido = (isset($_POST['apellido'])) ? $_POST['apellido'] : '';
$sexo = (isset($_POST['sexo'])) ? $_POST['sexo'] : '';
$fecha_creacion = (isset($_POST['fecha_creacion'])) ? $_POST['fecha_creacion'] : '';
$id_paciente = (isset($_POST['id_paciente'])) ? $_POST['id_paciente'] : '';

switch($opcion){
    case 1: //alta
        $consulta = "INSERT INTO pacientes (cedula, nombre, apellido, sexo, fecha_creacion) VALUES('$cedula, $nombre', $apellido, '$sexo', '$fecha_creacion') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 

        /*
        joins
        select historial.id_historial as Historial, paciente_cama.id_paciente_cama as 'Cama Paciente', pacientes.Nombre as Paciente
        from ((historial inner join paciente_cama on historial.id_paciente_cama = paciente_cama.id_paciente_cama )
        inner join pacientes on historial.id_paciente = pacientes.id_paciente );
        */ 

       /* $consulta = "SELECT id_paciente, cedula, nombre,apellido, sexo, fecha FROM pacientes ORDER BY id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC); */
        break;
    case 2: //modificación
        $consulta = "UPDATE pacientes SET  cedula='$cedula', nombre='$nombre', apellido='$apellido', sexo='$sexo',  fehca_creacion='$fecha_creacion' WHERE id_paciente='$id_paciente' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
    /* $consulta = "SELECT id, nombre, pais, edad FROM personas WHERE id='$id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC); */
        break;        
    case 3://baja
        $consulta = "DELETE FROM pacientes WHERE id_paciente='$id_paciente' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;        
}

print json_encode($data, JSON_UNESCAPED_UNICODE); //enviar el array final en formato json a JS
$conexion = NULL;


<?php

include 'conection.php';
session_start();

$objeto = new Conexion();
$conexion = $objeto->Conectar();



$nombre = (isset($_POST['nombre'])) ? $_POST['nombre'] : '';
$juegoEstado = (isset($_POST['juegoEstado'])) ? $_POST['juegoEstado'] : '';
$fechaSalida = (isset($_POST['fechaSalida'])) ? $_POST['fechaSalida'] : '';
$fechaCracked = (isset($_POST['fechaCracked'])) ? $_POST['fechaCracked'] : '';
$nombreCrack = (isset($_POST['nombreCrack'])) ? $_POST['nombreCrack'] : '';
$linkDescarga = (isset($_POST['linkDescarga'])) ? $_POST['linkDescarga'] : '';
$imagen = (isset($_POST['imagen'])) ? $_POST['imagen'] : '';
$id_FK_User = $_SESSION['id'];


$opcion = (isset($_POST['opcion'])) ? $_POST['opcion'] : '';
$juego_id = (isset($_POST['juego_id'])) ? $_POST['juego_id'] : '';


switch($opcion){
    case 1:
        $consulta = "INSERT INTO juego (nombre, juegoEstado, fechaSalida, fechaCracked, nombreCrack, linkDescarga, imagen, id_FK_User) VALUES('$nombre', '$juegoEstado', '$fechaSalida', '$fechaCracked', '$nombreCrack', '$linkDescarga', '$imagen', '$id_FK_User') ";			
        $resultado = $conexion->prepare($consulta);
        $resultado->execute(); 
        
        $consulta = "SELECT * FROM juego ORDER BY juego_id DESC LIMIT 1";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);       
        break;    
    case 2:        
        $consulta = "UPDATE juego SET nombre='$nombre', juegoEstado='$juegoEstado', fechaSalida='$fechaSalida', fechaCracked='$fechaCracked', nombreCrack='$nombreCrack', linkDescarga='$linkDescarga', imagen='$imagen' WHERE juego_id='$juego_id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        
        $consulta = "SELECT * FROM juego WHERE juego_id='$juego_id' ";       
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
    case 3:        
        $consulta = "DELETE FROM juego WHERE juego_id='$juego_id' ";		
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();                           
        break;
    case 4:    
        $consulta = "SELECT * FROM juego";
        $resultado = $conexion->prepare($consulta);
        $resultado->execute();        
        $data=$resultado->fetchAll(PDO::FETCH_ASSOC);
        break;
}

print json_encode($data, JSON_UNESCAPED_UNICODE);//envio el array final el formato json a AJAX
$conexion=null;
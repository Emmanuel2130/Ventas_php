<?php

$host="localhost";
$basededatos="ventas";
$usuario="root";
$clave="";

$conexion= new mysqli($host,$usuario,$clave,$basededatos);

if($conexion->connect_errno){
    echo"El sitio web presenta problemas";
    exit();
}
?>
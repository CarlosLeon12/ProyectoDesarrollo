<?php

$conexion = mysqli_connect('localhost', 'root', '', 'votaciones');

if(!$conexion){
    die('No se conecto a la base de datos' . mysqli_connet_error());
}
?>
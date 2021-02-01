<?php
	$server="localhost";
	$user="root";
	$pass="";
	$db="egel_tesis";
    
    $conexion = mysqli_connect($server, $user, $pass, $db);
    $conexion->set_charset("utf8");

    if (!$conexion) {
        die("Connection failed: " . mysqli_connect_error());
    }
        //echo "Connected successfully";
?>
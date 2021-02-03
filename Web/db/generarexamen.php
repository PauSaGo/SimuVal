<?php
    require("conexion.php"); 
    session_start();
    //include('usuarios.php');

    $examen = $_POST['examen'];
    $area = $_POST['area'];
    $subarea = $_POST['subarea'];
    $numero = $_POST['numero'];

    $_SESSION['numpre'] = $numero;
    $query = mysqli_query($conexion,"SELECT * FROM preguntas WHERE estado = 1 ORDER BY RAND() LIMIT ".$_SESSION['numpre']."");
?>
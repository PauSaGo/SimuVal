<?php
    require("conexion.php");

    $examen = $_POST['examen'];
    $area = $_POST['area'];
    $subarea = $_POST['subarea'];

    if($examen == 1){//Examen para sistemas computacionales
        if($area != 0){
            $query = mysqli_query($conexion,"SELECT COUNT(*) FROM preguntas WHERE estado = 1 AND id_examen=$examen AND id_area = $area and id_subarea=$subarea");
        }else{
            $query = mysqli_query($conexion,"SELECT COUNT(*) FROM preguntas WHERE estado = 1");
        }
        $row = mysqli_fetch_array($query)[0];

        //$query2 = mysqli_query($conexion,"SELECT * FROM subareas WHERE id_area = $area");
        //$row2 = mysqli_fetch_array($query2);

        //echo json_encode(array("numero" => $row, "subarea" => $row2['nombre']));
        echo $row;
    }
?>
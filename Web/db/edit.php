<?php
    require("conexion.php");

    if(isset($_GET['id'])){
        $id = $_GET['id'];
        $query = mysqli_query($conexion,"SELECT p.id,p.nombre, p.imagen, p.tipo, p.justificacion, p.estado, p.f_registro, e.nombre as examen, 
        a.nombre as area, s.nombre as subarea, GROUP_CONCAT(DISTINCT r.nombre ORDER BY r.nombre ASC SEPARATOR ', ') as respuestas, 
        GROUP_CONCAT(DISTINCT r.justificacion ORDER BY r.justificacion ASC SEPARATOR ', ') as justresp FROM preguntas as p 
        INNER JOIN examen as e ON e.id = p.id_examen INNER JOIN areas as a ON a.id = p.id_area INNER JOIN subareas as s ON s.id = p.id_subarea 
        INNER JOIN respuestas as r ON r.id_pregunta = p.id WHERE p.id = $id");

        if(mysqli_num_rows($query) > 0) {
            $row = mysqli_fetch_array($query);
            $nombre = $row['nombre'];
            $examen = $row['examen'];
            $tipo = $row['tipo'];
            $justificacion = $row['justificacion'];
            $respuestas = $row['respuestas'];
            $justresp = $row['justresp'];
            $area = $row['area'];
            $subarea = $row['subarea'];
            $imagen = $row['imagen'];
            $registro = $row['f_registro'];
            $estado = $row['estado'];
        }
    }
?>


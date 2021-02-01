 <?php  
    error_reporting(0);
    require("db/conexion.php");
    session_start();
    
    if(!$_SESSION['numero']){
        //echo '<script> alert("Si no tiene una cuenta iniciada en nuestra página tendra un acceso limitado.");</script>';
    }else{
        $sql = mysqli_query($conexion, "SELECT * FROM usuarios WHERE no_cuenta = ".$_SESSION['numero']."");
        $row = mysqli_fetch_array($sql);
        $_SESSION['id'] = $row['id'];
        $_SESSION['nombres'] = $row['nombres'];
        $_SESSION['apellidos'] = $row['apellidos'];
        $_SESSION['f_nacimiento'] = $row['f_nacimiento'];
        $_SESSION['facultad'] = $row['facultad'];
        $_SESSION['semestre'] = $row['semestre'];
        $_SESSION['carrera'] = $row['carrera'];
        $_SESSION['no_cuenta'] = $row['no_cuenta'];
        $_SESSION['correo'] = $row['correo'];
        $_SESSION['f_registro'] = $row['f_registro'];
        $_SESSION['tipo'] = $row['tipo'];

        $tipoexamen = mysqli_query($conexion, "SELECT id, nombre FROM examen WHERE id_alta IS NOT NULL AND estado = 1");
        $area = mysqli_query($conexion, "SELECT id, nombre FROM areas WHERE id_alta IS NOT NULL AND estado = 1");
        $subarea = mysqli_query($conexion, "SELECT id, nombre FROM subareas WHERE id_alta IS NOT NULL AND estado = 1");

        $mypregunta = mysqli_query($conexion, "SELECT p.id,p.nombre, p.imagen, p.tipo, p.justificacion, p.comentario, p.estado, p.f_registro, e.nombre as examen, 
        a.nombre as area, s.nombre as subarea, u.nombres as academico FROM preguntas as p INNER JOIN examen as e ON e.id = p.id_examen 
        INNER JOIN areas as a ON a.id = p.id_area INNER JOIN subareas as s ON s.id = p.id_subarea 
        INNER JOIN usuarios as u ON u.id = p.id_alta WHERE p.id_usuario = ".$_SESSION['id']."");

        if (isset($_GET['pageno'])) {
            $pageno = $_GET['pageno'];
        } else {
            $pageno = 1;
        }
        $no_of_records_per_page = 10;
        $offset = ($pageno-1) * $no_of_records_per_page;

        $total_pages_sql = "SELECT COUNT(*) FROM preguntas WHERE id_usuario = ".$_SESSION['id']."";
        $result = mysqli_query($conn,$total_pages_sql);
        $total_rows = mysqli_fetch_array($result)[0];
        $total_pages = ceil($total_rows / $no_of_records_per_page);
        
        $myexamen = mysqli_query($conexion, "SELECT p.id,p.nombre, p.imagen, p.tipo, p.justificacion, p.estado, p.f_registro, e.nombre as examen, 
        a.nombre as area, s.nombre as subarea, GROUP_CONCAT(DISTINCT r.nombre ORDER BY r.nombre ASC SEPARATOR ', *') as respuestas, 
        GROUP_CONCAT(DISTINCT r.justificacion ORDER BY r.justificacion ASC SEPARATOR ', *') as justresp FROM preguntas as p 
        INNER JOIN examen as e ON e.id = p.id_examen INNER JOIN areas as a ON a.id = p.id_area INNER JOIN subareas as s ON s.id = p.id_subarea 
        INNER JOIN respuestas as r ON r.id_pregunta = p.id WHERE p.id_usuario = ".$_SESSION['id']." GROUP BY P.nombre LIMIT ".$offset.", ".$no_of_records_per_page." ");
    }
?>
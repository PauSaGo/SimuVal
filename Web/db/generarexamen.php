<?php
    require("conexion.php"); 
    session_start();
    $resultado = 0;

    if(isset($_POST['button'])){
        $num = $_POST['num'];
        $examen = $_POST['examen'];
        $area = $_POST['area'];
        $subarea = $_POST['subarea'];

        $_SESSION['examen'] = $examen;
        $_SESSION['area'] = $area;
        $_SESSION['subarea'] = $subarea;

        echo json_encode(array("numero" => $num, "examen" => $examen, "area" => $area, "subarea" => $subarea));
    }

    if(isset($_GET['ex'])=='quiz'){
        $numero = $_GET['n'];
        $total = $_GET['q'];

        if($numero == $total){
            echo '
                <script>
                Swal.fire({
                    icon: "success",
                    title: "Examen terminado.",
                    text: "Por favor dirigase a la seccion de historial para ver resultados."
                });
                window.location= "../crearexamen.php?ex=ini";
                </script>';
        }

        $exam = $_GET['e'];
        $a = $_GET['a'];
        $s = $_GET['s'];
        $ans = $_POST['ans'];

        if($numero == 1){
            if($ans == 1){
                $resultado = 1;
            }
            mysqli_query($conexion,"INSERT INTO historial(no_preguntas,resultado,id_usuario,id_examen,id_area,subareas) VALUES ($total,$resultado,".$_SESSION['id'].",".$_SESSION['examen'].",".$_SESSION['area'].",".$_SESSION['subarea'].")");
            $_SESSION['id_historial'] = mysqli_insert_id($conexion);
        }else{
            $re = mysqli_query($conexion,"SELECT * FROM historial WHERE id = ".$_SESSION['id_historial']."");
            $data = mysqli_fetch_array($re);
            if($ans == 1){
                $resultado = $data['resultado'] + 1;
            }else{
                $resultado = $data['resultado'];
            }
            mysqli_query($conexion,"UPDATE historial SET resultado=$resultado WHERE id = ".$_SESSION['id_historial']."");
        }

        if($numero != $total){
            $numero++;
            header("location:../crearexamen.php?ex=quiz&q=$total&n=$numero&e=".$_SESSION['examen']."&a=".$_SESSION['area']."&s=".$_SESSION['subarea']."")or die('Error152');
        }
    }
?>
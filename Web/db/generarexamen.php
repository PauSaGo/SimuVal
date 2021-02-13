<?php
    require("conexion.php"); 
    session_start();

    if(isset($_POST['button'])){
        $num = $_POST['num'];
        echo $num;
    }

    if(isset($_GET['ex'])=='quiz'){
        $numero = $_GET['n'];
        $total = $_GET['q'];
        
        //$id = $_POST['resp'];
        if($numero != $total){
            $numero++;
            echo '<script>
           console.log("'.$resultado.'");</script>';
            header("location:../crearexamen.php?ex=quiz&q=$total&n=$numero")or die('Error152');
        }else{
            echo '<script>window.location="../crearexamen.php?ex=ini";</script>';
           /*echo '<script>
           console.log("'.$resultado.'");
           setTimeout(() => { window.location="../crearexamen.php?ex=ini"; }, 500);
           </script>';
            //$inserts = mysqli_prepare($conexion,"INSERT INTO historial(no_preguntas,resultado,id_usuario,id_examen,id_area,subareas) VALUES($total,?,".$_SESSION['id'].",?,?,?)");
        */}
        /*$examen = $_POST['examen'];
        $area = $_POST['area'];
        $subarea = $_POST['subarea'];
        $numero = $_POST['numero'];*/
        //$query = mysqli_query($conexion,"SELECT * FROM preguntas WHERE estado = 1 ORDER BY RAND() LIMIT ".$_SESSION['numpre']."");
    }
?>
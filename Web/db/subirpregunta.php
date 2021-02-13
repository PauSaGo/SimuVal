<?php
    require("conexion.php");
    session_start();

    if(isset($_POST['success'])){
        //$_POST = $filtro->process($_POST);
        $mensaje = $_POST['success'];
        $id = $_SESSION['id'];//id del usuario
        $pregunta = $_POST['pregunta'];
        //$pregunta = filter_var($_POST['pregunta'], FILTER_SANITIZE_STRING);
        $justificacion = $_POST['justificacion'];
        $tipoPregunta = $_POST['tipo'];
        $examen = $_POST['examen'];
        $area = $_POST['area'];
        $subarea = $_POST['subarea'];

        $valor_correcto = 1;
        $valor_incorrecto = 0;
        
        $respuesta1 = $_POST['respuesta1'];
        $respuesta2 = $_POST['respuesta2'];
        $respuesta3 = $_POST['respuesta3'];
        $respuesta4 = $_POST['respuesta4'];
        $justresp1 = $_POST['justresp1'];
        $justresp2 = $_POST['justresp2'];
        $justresp3 = $_POST['justresp3'];
        $justresp4 = $_POST['justresp4'];

       if($mensaje == "success"){
           //Iniciamos insertando la pregunta
            $examn = mysqli_query($conexion,"INSERT INTO preguntas(nombre,tipo,justificacion,estado,id_usuario,id_examen,id_area,id_subarea) VALUES(
                '$pregunta','$tipoPregunta','$justificacion','2','$id','$examen','$area','$subarea');");
            
            if($examn){
                //Ahora buscamos el examen para obtener el id
                $idExamen = mysqli_insert_id($conexion); 

                //Preparamos la setencia a ejecutar
                $inserts = mysqli_prepare($conexion,"INSERT INTO respuestas(nombre,estado,justificacion,valor,id_usuario,id_examen,id_area,id_subarea,id_pregunta) VALUES(?,'1',?,?,?,?,?,?,?)");

                //Insertamos la primera pregunta
                mysqli_stmt_bind_param($inserts, "siiiiiii",$respuesta1,$justresp1,$valor_correcto,$id,$examen,$area,$subarea,$idExamen);
                mysqli_stmt_execute($inserts);
                
                //Insertamos la segunda pregunta
                mysqli_stmt_bind_param($inserts, "siiiiiii",$respuesta2,$justresp2,$valor_incorrecto,$id,$examen,$area,$subarea,$idExamen);
                mysqli_stmt_execute($inserts);
                
                //Insertamos la tercera pregunta
                mysqli_stmt_bind_param($inserts, "siiiiiii",$respuesta3,$justresp3,$valor_incorrecto,$id,$examen,$area,$subarea,$idExamen);
                mysqli_stmt_execute($inserts);
                
                //Insertamos la cuarta pregunta
                mysqli_stmt_bind_param($inserts, "siiiiiii",$respuesta4,$justresp4,$valor_incorrecto,$id,$examen,$area,$subarea,$idExamen);
                mysqli_stmt_execute($inserts);
    
                echo 'success';
            }
       }
    }
?>
<?php
    require("conexion.php");
    //require("cargar_info.php");
    session_start();

    if(isset($_POST['iniciar_sesion'])){
        $pass = $_POST['pass'];
        $no_cuenta = $_POST['no_cuenta'];

        $query = mysqli_query($conexion,"SELECT * FROM usuarios WHERE no_cuenta = '".$no_cuenta."'");
        if(mysqli_num_rows($query) == 0){ //el numero de cuenta no existe en la db
            echo '<script>
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Este número de cuenta no esta registrado, Por favor registrate."});
                </script>';
        }else if(mysqli_num_rows($query) == 1){   //  Contraseña incorrecta
            $row = mysqli_fetch_array($query);
            if($pass == $row['pass']){
                $_SESSION['numero'] = $no_cuenta;
                echo '<script> window.location="manual.php";</script>';               
            }else{
                echo '<script>
                    Swal.fire({
                    icon: "warning",
                    title: "Incorrecto",
                    text: "La contraseña es incorrecta, Por favor intente de nuevo."});
                    </script>';
            }
        }
    }
    if(isset($_POST['btn_registo'])){ 
        $tipo = $_POST['tipo'];
        $nombres = $_POST['nombre'];
        $apellido_p = $_POST['apellido_p'];
        $apellido_m = $_POST['apellido_m'];
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $re_pass = $_POST['re_pass'];
        $f_nacimiento = $_POST['f_nacimiento'];
        $no_trabajador = $_POST['no_trabajador'];
        $no_cuenta = $_POST['no_cuenta'];
        $semestre = $_POST['semestre'];
        $facultad = $_POST['facultad'];
        $carrera_1 = $_POST['carrera_1'];
        $carrera_2 = $_POST['carrera_2'];
        $carrera_3 = $_POST['carrera_3'];

        if($facultad=="1"){
            $facultad = "Facultad de Ingenieria Electromecanica";
        }elseif($facultad=="2"){
            $facultad = "Facultad de Contabiliad y Administración de Manzanillo";
        }elseif($facultad=="3"){
            $facultad = "Facultad de Ciencias Marinas";
        }

        if($carrera_1=="1"){
            $carrera_1 = "Ingenieria en Sistemas Computacionales";
        }elseif($carrera_1=="2"){
            $carrera_1 = "Ingenieria Mecánico Electricista";
        }elseif($carrera_1=="3"){
            $carrera_1 = "Ingenieríia en Software";
        }elseif($carrera_1=="4"){
            $carrera_1 = "Ingenieria en Mecatrónica";
        }elseif($carrera_1=="5"){
            $carrera_1 = "Ingeniería en Tecnologías Electrónicas";
        }elseif($carrera_1=="6"){
            $carrera_1 = "Ingeniería en Mecánica y Eléctrica";
        }
        
        $query = mysqli_query($conexion,"SELECT * FROM usuarios WHERE no_cuenta = '".$no_cuenta."'");
        if(mysqli_num_rows($query) == 1){ 
            echo '<script>
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "El número de cuenta ya esta registrado!"});
                </script>';
            /* solucion del modal
            echo '<script>
            document.addEventListener("DOMContentLoaded", function () {  
                document.getElementById("modal_registro").style.display = "block";  
            });
            </script>';*/
        }else{
            $query = mysqli_query($conexion,"SELECT * FROM usuarios WHERE email = '".$email."'");
            if(mysqli_num_rows($query) == 1){ //el email no existe en la db
                echo '<script>Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Este correo ya esta registrado!"});</script>';
            }else{   
                if($pass != $re_pass){
                    echo '<script>Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "La contraseña no coinciden"});
                        </script>';
                }else{
                    if ($tipo == 1){ //si es estudianta
                        mysqli_query($conexion, "INSERT INTO usuarios (nombres,apellidos,f_nacimiento,facultad,carrera,semestre,no_cuenta,correo,tipo,pass) VALUES ('$nombres', '$apellido_p $apellido_m', '$f_nacimiento', '$facultad', '$carrera_1 $carrera_2 $carrera_3', '$semestre', '$no_cuenta' ,'$email','$tipo','$pass');");
                        $_SESSION['numero'] = $no_cuenta;
                        echo '<script> window.location="manual.php";</script>'; 
                    }else{ //es docente o academico
                        mysqli_query($conexion, "INSERT INTO usuarios (nombres, apellidos, f_nacimiento,no_cuenta,correo,tipo,pass)  VALUES ('$nombre', '$apellido_p $apellido_m', '$f_nacimiento', '$no_trabajador','$email','$tipo','$pass');");
                        $_SESSION['numero'] = $no_trabajador;
                        echo '<script> window.location="manual.php";</script>';
                    }   
                }
            }
        }
    }

    if(isset($_POST['btn_enviar'])){
        //Iniciamos insertando la pregunta
        $id = $_SESSION['id'];//id del Maestro
        $pregunta = $_POST['pregunta'];
        $justificacion = $_POST['justificacion'];
        $tipoPregunta = $_POST['tipo'];
        $examen = $_POST['examen'];
        $area = $_POST['area'];
        $subarea = $_POST['subarea'];

        mysqli_query($conexion,"INSERT INTO preguntas(nombre,tipo,justificacion,estado,id_usuario,id_examen,id_area,id_subarea) VALUES(
            '$pregunta','$tipoPregunta','$justificacion','2','$id','$examen','$area','$subarea');");
        
        //Ahora buscamos el examen para obtener el id
        $sql = mysqli_query($conexion, "SELECT id FROM preguntas WHERE nombre = ".$pregunta."");
        $row = mysqli_fetch_array($sql);
        $idExamen = $row['id'];

        //Procedemos a insertar las respuestas correspondiendo con el id del examen
        $resp1 = $_POST['respuesta1'];
        $justp1 = $_POST['justresp1'];
        //Insertamos la primera pregunta
        mysqli_query($conexion,"INSERT INTO respuestas(nombre,estado,justificacion,valor,id_usuario,id_examen,id_area,id_subarea,id_pregunta) VALUES(
            '$resp1','1','$justp1','1','$id','$examen','$area','$subarea','$idExamen',);");

        $resp2 = $_POST['respuesta2'];
        $justp2 = $_POST['justresp2'];
        //Insertamos la segunda pregunta
        mysqli_query($conexion,"INSERT INTO respuestas(nombre,estado,justificacion,valor,id_usuario,id_examen,id_area,id_subarea,id_pregunta) VALUES(
            '$resp2','1','$justp2','0','$id','$examen','$area','$subarea','$idExamen',);");

        $resp3 = $_POST['respuesta3'];
        $justp3 = $_POST['justresp3'];
        //Insertamos la tercera pregunta
        mysqli_query($conexion,"INSERT INTO respuestas(nombre,estado,justificacion,valor,id_usuario,id_examen,id_area,id_subarea,id_pregunta) VALUES(
            '$resp3','1','$justp3','0','$id','$examen','$area','$subarea','$idExamen',);");

        $resp4 = $_POST['respuesta4'];
        $justp4 = $_POST['justresp4'];
        //Insertamos la cuarta pregunta
        mysqli_query($conexion,"INSERT INTO respuestas(nombre,estado,justificacion,valor,id_usuario,id_examen,id_area,id_subarea,id_pregunta) VALUES(
            '$resp4','1','$justp4','0','$id','$examen','$area','$subarea','$idExamen',);");


        echo '<script> window.location="newreactivo.php";</script>';
    }

    if(isset($_POST['enviar_r'])){
        $alias = $_POST['alias'];
        $tipo = $_POST['tipo'];
        $descripcion = $_POST['descripcion'];

        mysqli_query($conexion,"INSERT INTO foro(tipo,contenido,alias) VALUES ('$tipo','$descripcion','$alias')");
        echo '<script> window.location="foro.php";</script>';
    } 
    
    if(isset($_POST['success'])){
        //Sola es para aprobar la pregunta o no.
        $mensaje = $_POST['success'];
        $estado = $_POST['estado'];
        $id = $_POST['id'];
        $comentario = $_POST['comentario'];

       if($mensaje == "success"){
            mysqli_query($conexion,"UPDATE preguntas SET estado='$estado', comentario='$comentario' where id='$id'");
            echo 'success';
       }


        /*$examen = $_POST['examen'];
        $pregunta = $_POST['pregunta'];
        $tipopregunta = $_POST['tipo'];
        $justificacionpregunta = $_POST['justificacion'];
        $respuesta1 = $_POST['respuesta1'];
        $respuesta2 = $_POST['respuesta2'];
        $respuesta3 = $_POST['respuesta3'];
        $respuesta4 = $_POST['respuesta4'];
        $justificacion1 = $_POST['justresp1'];
        $justificacion2 = $_POST['justresp2'];
        $justificacion3 = $_POST['justresp3'];
        $justificacion4 = $_POST['justresp4'];
        $area = $_POST['area'];
        $subarea = $_POST['subarea'];
        $imagen = $_POST['imagen'];
        $fecha = $_POST['registro'];
        $estado = $_POST['estado'];

        mysqli_query("INSERT INTO ")*/
    }

    if(isset($_POST['mensaje'])){
        $mensaje = $_POST['mensaje'];
        $numero = $_POST['numero'];

        if($mensaje == "success"){
            $_SESSION['numpre'] = $numero;
            $query = mysqli_query($conexion,"SELECT * FROM preguntas WHERE estado = 1 ORDER BY RAND() LIMIT ".$_SESSION['numpre']."");
            echo  'success';
        }
    }
?>
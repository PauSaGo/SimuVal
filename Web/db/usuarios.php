
<?php
    if(isset($_POST['iniciar_sesion'])){ 
        $pass = $_POST['pass'];
        $no_cuenta = $_POST['no_cuenta'];

        $query = mysqli_query($conexion,"SELECT * FROM usuarios WHERE no_cuenta = '".$no_cuenta."'");
        if(mysqli_num_rows($query) == 0){ //el numero de cuenta no existe en la db
            echo '<script>sweetAlert("No registrado", "Este numero de cuenta no esta registrado", "error");</script>';
            echo '<script>document.getElementById("modal_iniciar_sesion").style.display="block";</script>';
        }else if(mysqli_num_rows($query) == 1){   //  Contraseña incorrecta
            $row = mysqli_fetch_array($query);
            if($pass == $row['pass']){
                $_SESSION['numero'] = $no_cuenta;
                echo '<script> window.location="manual.php";</script>';               
            }else{
                echo '<script>sweetAlert("Contraseña incorrecta", "La contraseña ingresada es incorrecta", "error");</script>';
                echo '<script>document.getElementById("modal_iniciar_sesion").style.display="block";</script>';
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
        
        $query = mysqli_query($conexion,"SELECT * FROM usuarios WHERE no_cuenta = '".$no_cuenta."'");
        if(mysqli_num_rows($query) == 1){ 
            echo '<script>swal("Ya registrado", "Este numero de cuenta ya esta registrado", "error");</script>';
            echo '<script>document.getElementById("modal_registro").style.display="block";</script>';
        }else{
            $query = mysqli_query($conexion,"SELECT * FROM usuarios WHERE email = '".$email."'");
            if(mysqli_num_rows($query) == 1){ //el email no existe en la db
                echo '<script>swal("Ya registrado", "Este correo ya esta registrado", "error");</script>';
                echo '<script>document.getElementById("modal_registro").style.display="block";</script>';
            }else{   
                if($pass != $re_pass){
                    echo '<script>swal("No coninciden", "Las contraseñas ingresadas no coinciden", "error");</script>';
                    echo '<script>document.getElementById("modal_registro").style.display="block";</script>';
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
        $pregunta = $_POST['pregunta'];        
        echo '<script>console.log("'.$pregunta.'");
        window.location="../newreactivo.php";</script>';
    }
?>
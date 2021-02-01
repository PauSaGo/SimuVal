<?php
    include("db/conexion.php");
    session_start();
    error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inicio | Simuval</title>
    <?php
        include('includes/head.php');
        include('db/usuarios.php');
    ?>
</head>
<body>
    <?php include('includes/nav.php') ?>
    <div class="container">
        <h2><b>¡Hola! Bienvenido a SIMUVAL</b></h2>
        <h4>SIMUVAL es un simulador/entrenador de exámenes de egreso en nivel superior.</h4>
        <h5>Esta es una plataforma para todos, donde dependiendo tus necesidades encontraras la herramienta ideal para ti</h5>
        <div class="w3-row">
            <div class="w3-third w3-container">
                <center>
                    <img src="https://img.icons8.com/bubbles/100/000000/student-male.png"/><br>
                    <h6><b>¿Estudiante?</b></h6>
                </center>
                <p>¡Acabas de encontrar la plataforma ideal! Contamos con un entrenador/simulador que se adapta a tus necesidades.</p>
            </div>
            <div class="w3-third w3-container">
                <center>
                   <img src="https://img.icons8.com/bubbles/100/000000/bookmark.png"/><br>
                   <h6><b>¿Docente?</b></h6>
                </center>
                <p>En esta plataforma podras redactar rectivos acorde a las necesidades de tus estudiantes.</p>
            </div>
            <div class="w3-third w3-container">
                <center>
                   <img src="https://img.icons8.com/bubbles/100/000000/school.png"/><br>
                   <h6><b>¿Academia?</b></h6>
                </center>
                <p>Aqui podras revisar, editar y aprobar reactivos. Tus conocimientos son la clave para mantener la calidad de esta plataforma.</p>
            </div>
        </div>
        <center><h3><b>¿Ya tienes cuenta con nosotros?</b></h3></center>
        <div class="w3-row container2">
            <div class="w3-half w3-container">
                <div class="w3-row">
                    <div class="w3-col" style="width:50%;">
                        <img style="width:100%" src="https://img.icons8.com/bubbles/100/000000/approval.png"/>
                    </div>
                    <div class="w3-col" style="width:50%">
                        <h4><b>Iniciar sesión</b></h4>
                        <button onclick="document.getElementById('modal_iniciar_sesion').style.display='block'" class="w3-button mylightgreen w3-large">Clic aquí</button>
                    </div>
                </div>
            </div>
            <div class="w3-half w3-container">
                <div class="w3-row">
                    <div class="w3-col" style="width:50%;">
                        <img style="width:100%" src="https://img.icons8.com/bubbles/100/000000/todo-list.png"/>
                    </div>
                    <div class="w3-col" style="width:50%">
                        <h4><b>Registrarse</b></h4>
                        <button onclick="document.getElementById('modal_registro').style.display='block'" class="w3-button mylightgreen w3-large">Clic aquí</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php include('includes/modal.php'); ?>
</body>
</html>
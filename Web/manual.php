<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Manual | Simuval</title>
    <?php 
        include('includes/head.php');
        include('db/cargar_info.php');
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
                    <h6><b>Estudiante</b></h6>
                </center>
                <p>En este apartado el alumno podrá navegar y realizar las siguientes actividades:</p>
                <ul class="w3-ul" style="background:#fff;">
                <li><span style="font-size:10px;" class="material-icons">brightness_1</span>Realizar Examen.</li><!--Por desarrollar-->
                <li><span style="font-size:10px;" class="material-icons">brightness_1</span>Consultar historial y resultado.</li>
                <li><span style="font-size:10px;" class="material-icons">brightness_1</span>Participar en el foro.</li>
                <li><span style="font-size:10px;" class="material-icons">brightness_1</span>Acceder al manual.</li>
                </ul>
            </div>
            <div class="w3-third w3-container">
                <center>
                    <img src="https://img.icons8.com/bubbles/100/000000/bookmark.png"/><br>
                    <h6><b>Docente</b></h6>
                    <p>En este apartado el docente podrá navegar y realizar las siguientes actividades:</p>
                    <ul class="w3-ul" style="background:#fff;">
                        <li><span style="font-size:10px;" class="material-icons">brightness_1</span>Formular reactivos.</li>
                        <li><span style="font-size:10px;" class="material-icons">brightness_1</span>Consultar historial y estado del reactivo.</li>
                        <li><span style="font-size:10px;" class="material-icons">brightness_1</span>Programar ex&aacute;.</li><!--Por desarrollar-->
                        <li><span style="font-size:10px;" class="material-icons">brightness_1</span>Acceder al manual.</li>
                        <li><span style="font-size:10px;" class="material-icons">brightness_1</span>Participar en el foro.</li>
                    </ul>
                </center>
            </div>
            <div class="w3-third w3-container">
                <center>
                   <img src="https://img.icons8.com/bubbles/100/000000/school.png"/><br>
                   <h6><b>Acad&eacute;mico</b></h6>
                </center>
                <p>En este apartado el académico podrá navegar y realizar las siguientes actividades:</p>
                <ul class="w3-ul" style="background:#fff;">
                    <li><span style="font-size:10px;" class="material-icons">brightness_1</span>Formular reactivos.</li>
                    <li><span style="font-size:10px;" class="material-icons">brightness_1</span>Aprobar o rechazar reactivos.</li>
                    <li><span style="font-size:10px;" class="material-icons">brightness_1</span>Consultar reactivos pendientes.</li>
                    <li><span style="font-size:10px;" class="material-icons">brightness_1</span>Consultar historial de reactivos.</li>
                    <li><span style="font-size:10px;" class="material-icons">brightness_1</span>Registrar docentes o academicos.</li>
                    <li><span style="font-size:10px;" class="material-icons">brightness_1</span>Programar ex&eacute;men.</li><!--Por desarrollar-->
                </ul>
            </div>
        </div>
    </div>
</body>
</html>
<style>
.perfil{
	text-align: center;
	background: linear-gradient(0deg,#F1F1F1,#F1F1F1);
	margin: 30px 0px 60px 10px;
	padding: 10px 0px 120px;
	border: 4px solid #fff;
    border-radius: 20px;
	box-shadow: 0 0 0 6px #154360, 0 0 0 10px #90cb22, 0 0 0 20px #154360;
}
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Perfil | Simuval</title>
    <?php 
        include('includes/head.php');
        include('db/cargar_info.php');
    ?>
</head>
<body>
    <?php include('includes/nav.php') ?>
    <div class="w3-container w3-center" style="margin-left:20%;">
        <div class="w3-card perfil" style="padding:10px;width:80%;margin:10%;">
            <img src="images/docente.png" height="100px" width="100px"/>
            <h4 class="w3-text" style="text-shadow:.5px .5px 0;">Nombre completo:</h4>
            <p style="font-size:20px;margin-top:-15px;"><?php echo $_SESSION['nombres'] . " ".$_SESSION['apellidos']." " ?><span class="material-icons">create</span></p>
            <h4 class="w3-text" style="text-shadow:.5px .5px 0;">Cargo:</h4>
            <p style="font-size:20px;margin-top:-15px;"><?php 
                if($_SESSION['tipo'] == 1){
                    echo 'Alumno';
                }elseif($_SESSION['tipo'] == 2){
                    echo 'Docente';
                }elseif($_SESSION['tipo'] == 3){
                    echo 'Académico';
                }
             ?></p>
            <h4 class="w3-text" style="text-shadow:.5px .5px 0;">Fecha de nacimiento:</h4>
            <p style="font-size:20px;margin-top:-15px;"><?php echo $_SESSION['f_nacimiento']?></p>
            <h4 class="w3-text" style="text-shadow:.5px .5px 0;">Facultad:</h4>
            <p style="font-size:20px;margin-top:-15px;"><?php echo $_SESSION['facultad']?></p>
            <h4 class="w3-text" style="text-shadow:.5px .5px 0;">Carrera:</h4>
            <p style="font-size:20px;margin-top:-15px;"><?php echo $_SESSION['carrera']?></p>
            <?php
                if($_SESSION['tipo'] == 1){
                    echo '<h4 class="w3-text" style="text-shadow:.5px .5px 0;">Semestre:</h4><p style="font-size:20px;margin-top:-15px;">'.$_SESSION['semestre'].' <span class="material-icons">create</span></p>';
                }
            ?>
            <p></p>
            <h4 class="w3-text" style="text-shadow:.5px .5px 0;">N&uacute;mero de cuenta:</h4>
            <p style="font-size:20px;margin-top:-15px;"><?php echo $_SESSION['no_cuenta']?></p>
            <h4 class="w3-text" style="text-shadow:.5px .5px 0;">Correo:</h4>
            <p style="font-size:20px;margin-top:-15px;"><?php echo $_SESSION['correo']?></p>
        </div>
    </div>
</body>
</html>
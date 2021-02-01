<style>
option {
    text-align: center;
}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nuevo reactivo | Simuval</title>
    <?php 
        include('includes/head.php');
        include('db/cargar_info.php');
        include('db/usuarios.php');
    ?>
</head>
<body>
    <?php include('includes/nav.php') ?>

<div class="container w3-center">
    <h2>Formulario de crear nuevo reactivo</h2>
        <form class="w3-container" action="db/usuarios.php" method="POST" style="width:60%;margin:auto;text-align:center;">
            <label><b>Preg&uacute;nta</b></label>
            <textarea type="text" name="pregunta" id="pregunta"></textarea>
            <label><b>Justificaci&oacute;n</b></label>
            <textarea type="text" name="justificacion" id="justificacion"></textarea>
            <label><b>adjuntar una imagen (opcional)</b></label>
            <input class="w3-input w3-center" style="margin-bottom:10px;" type="file" name="imagen" id="imagen">
            <label><b>Tipo de pregunta</b></label><br>
            <select class="w3-select" style="width:150px;height:40px;" name="tipo" id="tipo">
                <option value="1">Abierto</option>
                <option value="2">Opci&oacute;n m&uacute;ltiple</option>
                <option value="3">Relacional</option>
            </select><br>
            <label style="margin-left:10px;"><b>Respuesta correcta</b></label>
            <input class="w3-input" type="text" style="display:inline-block;width:auto;" required>
            <label><b>Justificacion</b></label>
            <input  class="w3-input" style="display:inline-block;width:auto;" type="text" name="justresp2" id="justresp2" required><br>
            <label><b>Respuesta incorrecta</b></label>
			<input  class="w3-input" style="display:inline-block;width:auto;" type="text" name="respuesta2" id="respuesta2" required>
			<label><b>Justificacion</b></label>
            <input  class="w3-input" style="display:inline-block;width:auto;" type="text" name="justresp2" id="justresp2" required><br>
            <label><b>Respuesta incorrecta</b></label>
			<input  class="w3-input" style="display:inline-block;width:auto;" type="text" name="respuesta3" id="respuesta3" required>
			<label><b>Justificacion</b></label>
            <input  class="w3-input" style="display:inline-block;width:auto;" type="text" name="justresp3" id="justresp3" required><br>
            <label><b>Respuesta incorrecta</b></label>
			<input  class="w3-input" style="display:inline-block;width:auto;" type="text" name="respuesta4" id="respuesta4" required>
			<label><b>Justificacion</b></label>
            <input  class="w3-input" style="display:inline-block;width:auto;" type="text" name="justresp4" id="justresp4" required><br>
            <label><b>Examen</b></label><br>
            <select class="w3-select" name="examen" id="examen" style="width:350px;height:40px;">
                <?php while($examen = mysqli_fetch_array($tipoexamen)){?>
                    <option class="w3-center" value="<?php echo $examen['id']?>"><?php echo $examen['nombre']?></option>
                <?php }?>
            </select><br>
            <label><b>&Aacute;rea</b></label>
            <select class="w3-select" name="area" id="area">
            <?php while($areas = mysqli_fetch_array($area)){?>
                    <option value="<?php echo $areas['id']?>"><?php echo $areas['nombre']?></option>
                <?php }?>
            </select>
            <label><b>Subarea</b></label>
            <select class="w3-select" name="subarea" id="subarea">
                <?php while($subareas = mysqli_fetch_array($subarea)){?>
                    <option value="<?php echo $subareas['id']?>"><?php echo $subareas['nombre']?></option>
                <?php }?>
            </select>                           
        <button class="w3-button w3-green" name="btn_enviar" id="btn_enviar" type="submit">Enviar</button></center>        
    </form>
</div>

</body>
</html>
<script>
</script>
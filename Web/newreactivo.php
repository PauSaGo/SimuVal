<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nuevo reactivo | Simuval</title>
    <?php 
        include('includes/head.php');
        include('db/cargar_info.php');
        //include_once('db/subirpregunta.php');
    ?>
</head>
<body>
    <?php include('includes/nav.php') ?>
<div class="container w3-center">
    <h2>Formulario de crear nuevo reactivo</h2>
        <form class="w3-container" action="db/usuarios.php" method="POST" style="width:60%;margin:auto;text-align:center;">
            <label><b>Pregunta</b></label>
            <textarea type="text" name="pregunta" id="pregunta" required></textarea>
            <label><b>Justificaci&oacute;n</b></label>
            <textarea type="text" name="justificacion" id="justificacion" required></textarea>
            <label><b>adjuntar una imagen (opcional)</b></label>
            <input class="w3-input w3-center" style="margin-bottom:10px;" type="file" name="imagen" id="imagen">
            <label><b>Tipo de pregunta</b></label><br>
            <select onchange="tipo_p()" class="w3-select" style="width:200px;height:40px;" name="tipo" id="tipo" required>
                <option value="1">Cuestionamiento directo</option>
                <option value="2">Ordenamiento</option>
                <option value="3">Eleccion de elemento</option>
                <option value="4">Relacional de columnas</option>
                <option value="5">Multireactivo</option>
            </select><br>
            <label><b>Examen</b></label><br>
            <select class="w3-select" name="examen" id="examen" style="width:200px;height:40px;" required>
                <?php while($examen = mysqli_fetch_array($tipoexamen)){?>
                    <option class="w3-center" style="text-align:center;" value="<?php echo $examen['id']?>"><?php echo $examen['nombre']?></option>
                <?php }?>
            </select><br>
            <label><b>&Aacute;rea</b></label><br>
            <select class="w3-select" style="width:500px;height:40px;" name="area" id="area" required>
            <?php while($areas = mysqli_fetch_array($area)){?>
                    <option value="<?php echo $areas['id']?>"><?php echo $areas['nombre']?></option>
                <?php }?>
            </select><br>
            <label><b>Subarea</b></label><br>
            <select class="w3-select" style="width:700px;height:40px;" name="subarea" id="subarea" required>
                <?php while($subareas = mysqli_fetch_array($subarea)){?>
                    <option value="<?php echo $subareas['id']?>"><?php echo $subareas['nombre']?></option>
                <?php }?>
            </select><br>
            <div id="cuestionamiento" style="display:block">
                <label><b>Respuesta correcta</b></label>
                <input id="respuesta1" type="text" class="w3-input">
                <label><b>justificación</b></label>
                <input  class="w3-input" type="text" name="justresp1" id="justresp1" required><br>
                <label><b>Respuesta incorrecta</b></label>
                <input id="respuesta2" type="text" class="w3-input">
                <label><b>justificación</b></label>
                <input  class="w3-input" type="text" name="justresp1" id="justresp2" required><br>
                <label><b>Respuesta incorrecta</b></label>
                <input id="respuesta3" type="text" class="w3-input">
                <label><b>justificación</b></label>
                <input  class="w3-input" type="text" name="justresp1" id="justresp3" required><br>
                <label><b>Respuesta incorrecta</b></label>
                <input id="respuesta4" type="text" class="w3-input">
                <label><b>justificación</b></label>
                <input  class="w3-input"type="text" name="justresp1" id="justresp4" required><br>
            </div>   
            <div id="relacional" style="display:none">
                <label style="margin-left:10px;"><b>Respuesta correcta</b></label>
                <input id="respuesta1" class="w3-input" type="text" style="display:inline-block;width:auto;" required>
                <label><b>justificación</b></label>
                <input  class="w3-input" style="display:inline-block;width:auto;" type="text" name="justresp1" id="justresp1" required><br>
                <label><b>Respuesta incorrecta</b></label>
			    <input  class="w3-input" style="display:inline-block;width:auto;" type="text" name="respuesta2" id="respuesta2" required>
			    <label><b>justificación</b></label>
                <input  class="w3-input" style="display:inline-block;width:auto;" type="text" name="justresp2" id="justresp2" required><br>
                <label><b>Respuesta incorrecta</b></label>
			    <input  class="w3-input" style="display:inline-block;width:auto;" type="text" name="respuesta3" id="respuesta3" required>
			    <label><b>justificación</b></label>
                <input  class="w3-input" style="display:inline-block;width:auto;" type="text" name="justresp3" id="justresp3" required><br>
                <label><b>Respuesta incorrecta</b></label>
			    <input  class="w3-input" style="display:inline-block;width:auto;" type="text" name="respuesta4" id="respuesta4" required>
			    <label><b>justificación</b></label>
                <input  class="w3-input" style="display:inline-block;width:auto;" type="text" name="justresp4" id="justresp4" required><br>   
            </div>                
            <button class="w3-button w3-green" id="btn_pregunta" name="btn_pregunta" type="button">Enviar</button>
    </form>
</div>
<script>
    function tipo_p(){
        let pregunta = $("#tipo").val();
        document.getElementById("cuestionamiento").style.display="none";
        document.getElementById("relacional").style.display="none";

        if(pregunta == 1){
            document.getElementById("cuestionamiento").style.display="block";
        }
        if(pregunta == 2){
            
        }
        if(pregunta == 3){
            
        }
        if(pregunta == 4){
            document.getElementById("relacional").style.display="block";
        }
        if(pregunta == 5){
            document.getElementById("cuestionamiento").style.display="block";
        }
    }
    $(document).ready(function(){
        $('#btn_pregunta').click(function(){
            if( $('#pregunta').val() == '' || $('#justificacion').val() == null || $('#tipo').val() == null || $('#examen').val() == null ||
            $('#area').val() == null || $('#subarea').val() == null || $('#respuesta1').val() == '' || $('#respuesta2').val() == null ||
            $('#respuesta3').val() == null || $('#respuesta4').val() == null || $('#justresp1').val() == null || $('#justresp2').val() == null ||
            $('#justresp3').val() == null || $('#justresp4').val() == null){
                $('#pregunta').css("border", "1px solid #F14B4B");
                $('#justificacion').css("border", "1px solid #F14B4B");
                $('#tipo').css("border", "1px solid #F14B4B");
                $('#examen').css("border", "1px solid #F14B4B");
                $('#area').css("border", "1px solid #F14B4B");
                $('#subarea').css("border", "1px solid #F14B4B");
                $('#respuesta1').css("border", "1px solid #F14B4B");
                $('#respuesta2').css("border", "1px solid #F14B4B");
                $('#respuesta3').css("border", "1px solid #F14B4B");
                $('#respuesta4').css("border", "1px solid #F14B4B");
                $('#justresp1').css("border", "1px solid #F14B4B");
                $('#justresp2').css("border", "1px solid #F14B4B");
                $('#justresp3').css("border", "1px solid #F14B4B");
                $('#justresp4').css("border", "1px solid #F14B4B");
            }else{
                $('#pregunta').css("border", "1px solid #66bb6a");
                $('#justificacion').css("border", "1px solid #66bb6a");
                $('#tipo').css("border", "1px solid #66bb6a");
                $('#examen').css("border", "1px solid #66bb6a");
                $('#area').css("border", "1px solid #66bb6a");
                $('#subarea').css("border", "1px solid #66bb6a");
                $('#respuesta1').css("border", "1px solid #66bb6a");
                $('#respuesta2').css("border", "1px solid #66bb6a");
                $('#respuesta3').css("border", "1px solid #66bb6a");
                $('#respuesta4').css("border", "1px solid #66bb6a");
                $('#justresp1').css("border", "1px solid #66bb6a");
                $('#justresp2').css("border", "1px solid #66bb6a");
                $('#justresp3').css("border", "1px solid #66bb6a");
                $('#justresp4').css("border", "1px solid #66bb6a");

                $.ajax({
                type: 'POST',
                url: 'db/subirpregunta.php',
                data: {
                    success: 'success',
                    pregunta: $('#pregunta').val(),
                    justificacion: $('#justificacion').val(),
                    tipo: $('#tipo').val(),
                    examen: $('#examen').val(),
                    area: $('#area').val(),
                    subarea: $('#subarea').val(),
                    respuesta1: $('#respuesta1').val(),
                    respuesta2: $('#respuesta2').val(),
                    respuesta3: $('#respuesta3').val(),
                    respuesta4: $('#respuesta4').val(),
                    justresp1: $('#justresp1').val(),
                    justresp2: $('#justresp2').val(),
                    justresp3: $('#justresp3').val(),
                    justresp4: $('#justresp4').val(),
                },
                cache: true,
                success:function(result){
                    console.log(result);
                    if(result == "success"){
                        setTimeout(() => { window.location="newreactivo.php"; }, 2000);
                    }
                }
            })
            }
        })
    })
</script>
</body>
</html>
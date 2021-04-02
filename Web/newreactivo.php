<style>
#addRow{
    border-radius:50%;
    width:10px;
    height:20px;
    background-image: url("./images/agregar-icono.png");
    background-repeat:no-repeat;
    background-position:center;
    padding:10px; 
    background-color: #FF9100;
}

#addRow2{
    border-radius:50%;
    width:10px;
    height:20px;
    background-image: url("./images/agregar-icono.png");
    background-repeat:no-repeat;
    background-position:center;
    background-color: #FF9100;
    padding:10px; 
}

#addRow3{
    border-radius:50%;
    width:10px;
    height:20px;
    background-image: url("./images/agregar-icono.png");
    background-repeat:no-repeat;
    background-position:center;
    background-color: #FF9100;
    padding:10px; 
}

#addRow4{
    border-radius:50%;
    width:10px;
    height:20px;
    background-image: url("./images/agregar-icono.png");
    background-repeat:no-repeat;
    background-position:center;
    background-color: #FF9100;
    padding:10px; 
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
                <input id="respues1" class="w3-input" type="text" style="display:inline-block;width:auto;" required>
                <label><b>justificación</b></label>
                <input  class="w3-input" style="display:inline-block;width:auto;" type="text" name="justres1" id="justres1" required><br>
                <label><b>Respuesta incorrecta</b></label>
			    <input  class="w3-input" style="display:inline-block;width:auto;" type="text" name="respues2" id="respues2" required>
			    <label><b>justificación</b></label>
                <input  class="w3-input" style="display:inline-block;width:auto;" type="text" name="justres2" id="justres2" required><br>
                <label><b>Respuesta incorrecta</b></label>
			    <input  class="w3-input" style="display:inline-block;width:auto;" type="text" name="respues3" id="respues3" required>
			    <label><b>justificación</b></label>
                <input  class="w3-input" style="display:inline-block;width:auto;" type="text" name="justres3" id="justres3" required><br>
                <label><b>Respuesta incorrecta</b></label>
			    <input  class="w3-input" style="display:inline-block;width:auto;" type="text" name="respues4" id="respues4" required>
			    <label><b>justificación</b></label>
                <input  class="w3-input" style="display:inline-block;width:auto;" type="text" name="justres4" id="justres4" required><br>   
            </div> 

            <div id="ordenamiento" style="display:none">
                    <label style="margin-left:10px;">Respuesta correcta</label>
                    <button id="addRow" type="button" class="w3-button"></button>
                    <div id="newRow">
                        <input type="text" name="resp1[]" class="w3-input" style="display:inline-block;width:100px;">
                    </div>
                    <label>Justificacion</label>
                    <input name="just1" id="just1" type="text" class="w3-input">
                    <label>Respuesta Incorrecta</label>
                    <button id="addRow2" type="button" class="w3-button"></button>
                    <div id="newRow2">
                        <input type="text" name="resp2[]" class="w3-input" style="display:inline-block;width:100px;">
                    </div>
                    <label>Justificacion</label>
                    <input name="just2" id="just2" type="text" class="w3-input">
                    <label>Respuesta Incorrecta</label>
                    <button id="addRow3" type="button" class="w3-button"></button>
                    <div id="newRow3">
                        <input type="text" name="resp3[]" class="w3-input" style="display:inline-block;width:100px;">
                    </div>
                    <label>Justificacion</label>
                    <input name="just3" id="just3" type="text" class="w3-input">
                    <label>Respuesta Incorrecta</label>
                    <button id="addRow4" type="button" class="w3-button"></button>
                    <div id="newRow4">
                        <input type="text" name="resp4[]" class="w3-input" style="display:inline-block;width:100px;">
                    </div>
                    <label>Justificacion</label>
                    <input name="just4" id="just4" type="text" class="w3-input">
            </div>

            <button class="w3-button w3-green" id="btn_pregunta" name="btn_pregunta" type="button">Enviar</button>
    </form>
</div>
<script>
    $(document).on('click', '#addRow' ,function () {
        var resp1 = '';
        resp1 += '<input type="text" name="resp1[]" class="w3-input" style="display:inline-block;width:100px;">';
        $('#newRow').append(resp1);

        /*var resp2 = '';
        resp2 += '<input type="text" name="resp2[]" class="w3-input" style="display:inline-block;width:100px;">';
        $('#newRow2').append(resp2);

        var resp3 = '';
        resp3 += '<input type="text" name="resp3[]" class="w3-input" style="display:inline-block;width:100px;">';
        $('#newRow3').append(resp3);

        var resp4 = '';
        resp4 += '<input type="text" name="resp4[]" class="w3-input" style="display:inline-block;width:100px;">';
        $('#newRow4').append(resp4);*/
    });

    $(document).on('click', '#addRow2' ,function () {
        var html = '';
        html += '<input type="text" name="resp2[]" class="w3-input" style="display:inline-block;width:100px;">';
        $('#newRow2').append(html);
    });

    $(document).on('click', '#addRow3' ,function () {
        var html = '';
        html += '<input type="text" name="resp3[]" class="w3-input" style="display:inline-block;width:100px;">';
        $('#newRow3').append(html);
    });

    $(document).on('click', '#addRow4' ,function () {
        var html = '';
        html += '<input type="text" name="resp4[]" class="w3-input" style="display:inline-block;width:100px;">';
        $('#newRow4').append(html);
    });

    function tipo_p(){
        let pregunta = $("#tipo").val();
        document.getElementById("cuestionamiento").style.display="none";
        document.getElementById("relacional").style.display="none";
        document.getElementById("ordenamiento").style.display="none";
        //document.getElementById("ordenamiento").style.display="none";

        if(pregunta == 1){
            document.getElementById("cuestionamiento").style.display="block";
        }
        if(pregunta == 2){
            document.getElementById("ordenamiento").style.display="block";
        }
        if(pregunta == 3){
            //document.getElementById("cuestionamiento").style.display="block";
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
            //Validamos si es tipo ordenamiento o eleccion ya que obtenemos sus valores de diferente manera 
            if($('#tipo').val() == 2 || $('#tipo').val() == 3){
                let resp1 = document.getElementsByName('resp1[]');//obtenemos todos los elementos por el nombre
                let range1 = resp1.length; //size of inputs
                let respuesta1 = rangeInput(resp1,range1,1); //Almacenamos la respuesta

                let resp2 = document.getElementsByName('resp2[]');
                let range2 = resp2.length; 
                let respuesta2 = rangeInput(resp2,range2,2);

                let resp3 = document.getElementsByName('resp3[]');
                let range3 = resp3.length;
                let respuesta3 = rangeInput(resp3,range3,3);

                let resp4 = document.getElementsByName('resp4[]');
                let range4 = resp4.length;
                let respuesta4 = rangeInput(resp4,range4,4);

                if( $('#pregunta').val() == '' || $('#justificacion').val() == null || $('#tipo').val() == null || $('#examen').val() == null ||
                $('#area').val() == null || $('#subarea').val() == null || respuesta1[0] != 0 || respuesta2[0] != 0 || respuesta3[0] != 0 || 
                respuesta4[0] != 0 || $('#just1').val() == '' || $('#just1').val() == null || $('#just2').val() == '' || $('#just2').val() == null ||
                $('#just3').val() == '' || $('#just3').val() == null || $('#just4').val() == '' || $('#just4').val() == null){
                    $('#pregunta').css("border", "1px solid #F14B4B");
                    $('#justificacion').css("border", "1px solid #F14B4B");
                    $('#tipo').css("border", "1px solid #F14B4B");
                    $('#examen').css("border", "1px solid #F14B4B");
                    $('#area').css("border", "1px solid #F14B4B");
                    $('#subarea').css("border", "1px solid #F14B4B");
                    $('input[name^="resp1"]').css("border", "1px solid #F14B4B");
                    $('input[name^="resp2"]').css("border", "1px solid #F14B4B");
                    $('input[name^="resp3"]').css("border", "1px solid #F14B4B");
                    $('input[name^="resp4"]').css("border", "1px solid #F14B4B");
                    $('#just1').css("border", "1px solid #F14B4B");
                    $('#just2').css("border", "1px solid #F14B4B");
                    $('#just3').css("border", "1px solid #F14B4B");
                    $('#just4').css("border", "1px solid #F14B4B");

                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Por favor revise los datos"
                    });
                }else{
                    $('#pregunta').css("border", "1px solid #66bb6a");
                    $('#justificacion').css("border", "1px solid #66bb6a");
                    $('#tipo').css("border", "1px solid #66bb6a");
                    $('#examen').css("border", "1px solid #66bb6a");
                    $('#area').css("border", "1px solid #66bb6a");
                    $('#subarea').css("border", "1px solid #66bb6a");
                    $('input[name^="resp1"]').css("border", "1px solid #66bb6a");
                    $('input[name^="resp2"]').css("border", "1px solid #66bb6a");
                    $('input[name^="resp3"]').css("border", "1px solid #66bb6a");
                    $('input[name^="resp4"]').css("border", "1px solid #66bb6a");
                    $('#just1').css("border", "1px solid #66bb6a");
                    $('#just2').css("border", "1px solid #66bb6a");
                    $('#just3').css("border", "1px solid #66bb6a");
                    $('#just4').css("border", "1px solid #66bb6a");
                    
                    /*$.ajax({
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
                            respuesta1: respuesta1[1],
                            respuesta2: respuesta2[1],
                            respuesta3: respuesta3[1],
                            respuesta4: respuesta4[1],
                            justresp1: $('#just1').val(),
                            justresp2: $('#just2').val(),
                            justresp3: $('#just3').val(),
                            justresp4: $('#just4').val()
                        },
                        cache: true,
                        success:function(result){
                            console.log(result);
                            if(result == "success"){
                                setTimeout(() => { window.location="newreactivo.php"; }, 2000);
                            }
                        }
                    })*/

                }
            }
            if($('#tipo').val() == 4){
                if( $('#pregunta').val() == '' || $('#justificacion').val() == null || $('#tipo').val() == null || $('#examen').val() == null ||
                $('#area').val() == null || $('#subarea').val() == null || $('#respues1').val() == '' || $('#respues2').val() == null ||
                $('#respues3').val() == null || $('#respues4').val() == null || $('#justres1').val() == null || $('#justres2').val() == null ||
                $('#justres3').val() == null || $('#justres4').val() == null){
                    $('#pregunta').css("border", "1px solid #F14B4B");
                    $('#justificacion').css("border", "1px solid #F14B4B");
                    $('#tipo').css("border", "1px solid #F14B4B");
                    $('#examen').css("border", "1px solid #F14B4B");
                    $('#area').css("border", "1px solid #F14B4B");
                    $('#subarea').css("border", "1px solid #F14B4B");
                    $('#respues1').css("border", "1px solid #F14B4B");
                    $('#respues2').css("border", "1px solid #F14B4B");
                    $('#respues3').css("border", "1px solid #F14B4B");
                    $('#respues4').css("border", "1px solid #F14B4B");
                    $('#justres1').css("border", "1px solid #F14B4B");
                    $('#justres2').css("border", "1px solid #F14B4B");
                    $('#justres3').css("border", "1px solid #F14B4B");
                    $('#justres4').css("border", "1px solid #F14B4B");

                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Por favor revise los datos"
                    });

                }else{
                    $('#pregunta').css("border", "1px solid #66bb6a");
                    $('#justificacion').css("border", "1px solid #66bb6a");
                    $('#tipo').css("border", "1px solid #66bb6a");
                    $('#examen').css("border", "1px solid #66bb6a");
                    $('#area').css("border", "1px solid #66bb6a");
                    $('#subarea').css("border", "1px solid #66bb6a");
                    $('#respues1').css("border", "1px solid #66bb6a");
                    $('#respues2').css("border", "1px solid #66bb6a");
                    $('#respues3').css("border", "1px solid #66bb6a");
                    $('#respues4').css("border", "1px solid #66bb6a");
                    $('#justres1').css("border", "1px solid #66bb6a");
                    $('#justres2').css("border", "1px solid #66bb6a");
                    $('#justres3').css("border", "1px solid #66bb6a");
                    $('#justres4').css("border", "1px solid #66bb6a");

                    /*$.ajax({
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
                            respuesta1: $('#respues1').val(),
                            respuesta2: $('#respues2').val(),
                            respuesta3: $('#respues3').val(),
                            respuesta4: $('#respues4').val(),
                            justresp1: $('#justres1').val(),
                            justresp2: $('#justres2').val(),
                            justresp3: $('#justres3').val(),
                            justresp4: $('#justres4').val(),
                        },
                        cache: true,
                        success:function(result){
                            console.log(result);
                            if(result == "success"){
                                setTimeout(() => { window.location="newreactivo.php"; }, 2000);
                            }
                        }
                    })*/
                }

            }
            if($('#tipo').val() == 1 || $('#tipo').val() == 5){
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

                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Por favor revise los datos"
                    });

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


                    /*$.ajax({
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
                    })*/
                }
            }
        })
    })

    function rangeInput(input,range,num){
        let values = '';//Iniciamos la varibale 
        let lastValue = '';
        let err = 0;

        for(let i = 0; i<range;i++){//Recorremos cada uno de los inputs para obtener el valor y guardarlo en una varibale
            let data = input[i];

            if(data.value == "" || data.value == null){//Comprobamos si los input tienen datos
                err += 1;
                //$('input[name^="resp'+num+'"]').css("border", "1px solid #F14B4B");
            }else{
                if(input[input.length - 1]){
                    lastValue = data.value;//Guardamos el ultimo valor de la lista 
                }

                values += data.value + ",";

                //$('input[name^="resp'+num+'"]').css("border", "1px solid #66bb6a");
            }
        }

        values = values.replace(lastValue+",",lastValue+".");//Remplazamos la ultima coma por un punto

        //return values;
        return [err,values];
    }
</script>
</body>
</html>
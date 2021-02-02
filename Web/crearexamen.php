<style>
option {
    text-align: center;
}
li{
    list-style-type: none;
    margin: 5px;
}
</style>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Nuevo examen | Simuval</title>
    <?php 
        include('includes/head.php');
        include('db/cargar_info.php');
    ?>
</head>
<body>
    <?php include('includes/nav.php') ?>

    <div class="container w3-center">
    <form class="w3-hide" method="POST">
            <div class="w3-section">
                <div class="w3-row w3-center">
                   <h2>Formulario de crear nuevo examen</h2>
                    <div style="width:50%;margin:auto;text-align:center;">
                        <label><b>Ex&aacute;men</b></label>
                        <select  class="w3-select" name="examen" id="examen">
                            <?php while($examen = mysqli_fetch_array($tipoexamen)){?>
                                <option class="w3-center" value="<?php echo $examen['id']?>"><?php echo $examen['nombre']?></option>
                            <?php }?>
                        </select>
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
                        <label><b>Cantidad de preguntas</b></label>
                        <input style="width:100px;display: block !important;margin:auto;margin-top:10px;" class="w3-input" type="text" name="numero" id="numero" required>                    

                    </div>                  
                </div>                
                <button class="w3-button w3-green" style="margin-top:30px;" name="empezar_examen" id="empezar_examen" type="button">Empezar</button></center>
            </div>
        </form>

        <section class="">
            <h2>Pregunta</h2>
            <div class="w3-section">
                <div class="w3-row w3-center">
                    <li><input type="radio" name="respuesta" id="">Respuesta1</li>
                    <li><input type="radio" name="respuesta" id="">Respuesta2</li>
                    <li><input type="radio" name="respuesta" id="">Respuesta3</li>
                    <li><input type="radio" name="respuesta" id="">Respuesta4</li>
                </div>
                <button class="w3-button w3-green" style="margin-top:20px;" name="anterior" id="anterior" type="button">Anterior</button></center>
                <button class="w3-button w3-green" style="margin-top:20px;" name="siguiente" id="siguiente" type="button">Siguiente</button></center>
            </div>
        </section>
    </div>
<script>
$(document).ready(function(){
    $('#empezar_examen').click(function(){
        $.ajax({
            type: 'POST',
            url: 'db/generarexamen.php',
            data: {
                examen: $('#examen').val(),
                area: $('#area').val(),
                subarea: $('#subarea').val(),
                numero: $('#numero').val()
            },
            success: function(result){
                
            }
        })
    })
})
</script>
</body>
</html>
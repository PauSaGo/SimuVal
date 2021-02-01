<style>
option {
    text-align: center;
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
    <form  method="POST">
            <div class="w3-section">
                <div class="w3-row w3-center">
                   <h2>Formulario de crear nuevo examen</h2>
                    <div style="width:50%;margin:auto;text-align:center;">
                        <label><b>Ex&aacute;men</b></label>
                        <select  class="w3-select" name="" id="">
                            <?php while($examen = mysqli_fetch_array($tipoexamen)){?>
                                <option class="w3-center" value="<?php echo $examen['id']?>"><?php echo $examen['nombre']?></option>
                            <?php }?>
                        </select>
                        <label><b>&Aacute;rea</b></label>
                        <select class="w3-select" name="examen" id="examen">
                        <?php while($areas = mysqli_fetch_array($area)){?>
                                <option value="<?php echo $areas['id']?>"><?php echo $areas['nombre']?></option>
                            <?php }?>
                        </select>
                        <label><b>Subarea</b></label>
                        <select class="w3-select" name="examen" id="examen">
                            <?php while($subareas = mysqli_fetch_array($subarea)){?>
                                <option value="<?php echo $subareas['id']?>"><?php echo $subareas['nombre']?></option>
                            <?php }?>
                        </select>
                        <label><b>Cantidad de preguntas por secci&oacute;n seleccionado</b></label>
                        <input style="width:100px;display: block !important;margin:auto;margin-top:10px;" class="w3-input" type="text" name="tipo" id="tipo" required>                    

                    </div>                  
                </div>                
                <button class="w3-button w3-green" style="margin-top:30px;" name="iniciar_sesion" id="iniciar_sesion" type="submit">Empezar</button></center>
            </div>
        </form>
    </div>

</body>
</html>
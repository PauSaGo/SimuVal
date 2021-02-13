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
        $query = mysqli_query($conexion,"SELECT COUNT(*) FROM preguntas WHERE estado = 1");
        $pre = mysqli_fetch_array($query)[0];
        //include_once('db/generarexamen.php');

        //$rows = 1;
        //$start = ($_GET['pagina'] - 1) * $rows;
        //$query = mysqli_query($conexion,"SELECT * FROM preguntas WHERE estado = 1 ORDER BY RAND()  LIMIT ".$start.",".$rows."");
        //$total = 17;
        //$pagination = ceil($total / $rows);
    ?>
</head>
<body>
    <?php include('includes/nav.php') ?>

    <div class="container w3-center">
        <?php
        if($_GET['ex'] == 'ini'){
           echo "<form method='POST'>
            <div class='w3-section'>
                <div class='w3-row w3-center'>
                   <h2>Formulario de crear nuevo examen</h2>
                    <div style='width:50%;margin:auto;text-align:center;'>
                        <label><b>Ex&aacute;men</b></label>
                        <select class='w3-select' name='examen' id='examen'>";
                        while($examen = mysqli_fetch_array($tipoexamen)){
                            echo "<option class='w3-center' value='". $examen['id']."'>". $examen['nombre']."</option>";
                        }
                        echo "</select>
                        <label><b>&Aacute;rea</b></label>
                        <select class='w3-select' name='area' id='area'>";
                        while($areas = mysqli_fetch_array($area)){
                                echo "<option value='". $areas['id']."'>". $areas['nombre']."</option>";
                        }
                        echo "</select>
                        <label><b>Subarea</b></label>
                        <select class='w3-select' name='subarea' id='subarea'>";
                            while($subareas = mysqli_fetch_array($subarea)){
                                echo "<option value='". $subareas['id']."'>". $subareas['nombre']."</option>";
                            }
                        echo '</select>
                        <label><b>Cantidad de preguntas</b></label>
                        <input placeholder="Max:'.$pre.'" style="width:100px;display: block !important;margin:auto;margin-top:10px;" class="w3-input" type="text" name="numero" id="numero" required>    
                    </div>                  
                </div>                
                <button type="button" class="w3-button w3-green" style="margin-top:30px;" id="empezar_examen" name="empezar_examen">Empezar</button></center>
            </div>
        </form>';
        //Button pregunta <a href="crearexamen.php?ex=quiz&q=17&n=1" class="w3-button w3-green" style="margin-top:30px;" name="empezar_examen">Empezar</a></center>
        }


        if($_GET['ex']=='quiz'){
            $total = $_GET['q'];
            $numero = $_GET['n'];
            $rows = 1;
            $start = ($numero - 1) * $rows;
            echo '<section class="">
            <div class="w3-section">
                <div class="w3-row w3-center">"
                <form method="POST" action="db/generarexamen.php?ex=quiz&q='.$total.'&n='.$numero.'">';
                $pregunta = mysqli_query($conexion,"SELECT * FROM preguntas WHERE estado = 1 ORDER BY RAND() LIMIT ".$start.",".$rows."");
                while($row = mysqli_fetch_array($pregunta)){
                    $id = $row['id'];
                    echo '<input class="w3-hide" type="tex" name="resp" value="'.$id.'">';
                    echo '<h3>'.$row['nombre'].'</h3>';
                }
                $ans = mysqli_query($conexion,"SELECT * FROM respuestas WHERE id_pregunta = ".$id."");
                while($rowans = mysqli_fetch_array($ans)){
                    echo '<input type="radio" name="ans" value="'.$rowans['valor'].'">'.$rowans['nombre'];
                }
            echo '</div>
                <button class="w3-button w3-green" type="submit" style="margin-top:20px;">Enviar</button></center></form>
            </div>
        </section>';
        }
        ?>
    </div>
<script>
$(document).ready(function(){
    let pre = parseInt('<?php echo $pre;?>');
    $('#empezar_examen').click(function(){
        if($('#numero').val() > pre){Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "La cantidad de preguntas es más que las que nosotros contamos :("
            });
        }else{
            $.ajax({
            type: 'POST',
            url: 'db/generarexamen.php',
            data: {
                button: 'empezar_examen',
                num: $('#numero').val()
            },
            success: function(result){
                window.location.href = "crearexamen.php?ex=quiz&q="+result+"&n=1";
            }
        })
        }
    })
})
</script>    
</body>
</html>
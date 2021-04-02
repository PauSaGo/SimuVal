<style>
option {
    text-align: center;
}
li{
    list-style-type: none;
}

.padre{ 
    position: relative;
}


.properties{
    /*
    position: absolute;
    top:80%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: left;
    border: 1px solid purple;*/
    position: relative;
    top:50%;
    margin-top: 100px;
    left: 50%;
    transform: translate(-50%, -50%);
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
        $num = mysqli_query($conexion,"SELECT COUNT(*) FROM preguntas WHERE estado = 1");
        $alert = mysqli_fetch_array($num)[0];
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
                   <h2>Nueva prueba</h2>
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
                        <select class='w3-select w3-disabled' name='subarea' id='subarea'>";
                            while($subareas = mysqli_fetch_array($subarea)){
                                echo "<option value='". $subareas['id']."'>". $subareas['nombre']."</option>";
                            }
                        echo '</select>
                        <label><b>Cantidad de preguntas</b></label>
                        <input placeholder="Max: '.$alert.'" style="width:100px;display: block !important;margin:auto;margin-top:10px;" class="w3-input" type="text" name="numero" id="numero" required>    
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
            $exam = $_GET['e'];
            $a = $_GET['a'];
            $s = $_GET['s'];
            $rows = 1;
            $start = ($numero - 1) * $rows;
            echo '<section class="w3-center">
            <div class="w3-section">
                <form method="POST" action="db/generarexamen.php?ex=quiz&q='.$total.'&n='.$numero.'&e="'.$exam.'&a='.$a.'&s='.$s.'>';
                if($a != 0){
                    $pregunta = mysqli_query($conexion,"SELECT * FROM preguntas WHERE estado = 1 AND id_examen=$exam AND id_area=$a AND id_subarea=$s ORDER BY RAND() LIMIT ".$start.",".$rows."");
                }else{
                    $pregunta = mysqli_query($conexion,"SELECT * FROM preguntas WHERE estado = 1 ORDER BY RAND() LIMIT ".$start.",".$rows."");
                }
                while($row = mysqli_fetch_array($pregunta)){
                    $id = $row['id'];
					$body = "";
                    $tipo = $row['tipo'];
					$ini = 1;
					
                    if($tipo == 1){
                        $body .= $row['nombre'];
                    }
                    if($tipo == 2){
                        $pregunta = explode(".",$row['nombre']);
                        $body .= $pregunta[0].'.';
                        $numbers = filter_var($row['nombre'], FILTER_SANITIZE_NUMBER_INT);
                        $body .= '<br><br>';
                        $data = implode(',',str_split($numbers));
                        $separate = explode(',',$data);
                        $body .= '<div class="properties"><div class="dentro">';
                        for($i=2;$i<sizeof($separate)+2;$i++){
                            $index = $i;
                            $ans = array_filter(explode($index,$pregunta[$i]));
                            $body .= '<li>'.$ini.'.-'.$ans[0].'</li>';
                            $ini++;
                        }
                        $body .= '</div></div>';
                    }
                    if($tipo == 3){
                        $pregunta = explode(".",$row['nombre']);
                        $body .= $pregunta[0].'.';
                        if($pregunta[1] == 1){
                            $body .= '<br><br>';
                            $body .= '<div class="properties"><div class="dentro">';
                            for($i=2;$i<sizeof($pregunta); $i++){
                                $ans = explode($i,$pregunta[$i]);
                                $body.= '<li>'.$ini.'.-'.$ans[0].'</li>';
                                $ini++;
                            }
                            $body .= '</div></div>';
                        }else{
                            $body .= $pregunta[1].'.';
                            $body .= '<br><br>';
                            filter_var($pregunta,FILTER_SANITIZE_STRING);
                            $body .= '<div class="properties"><div class="dentro">';
                            for($i=3;$i<sizeof($pregunta); $i++){
                                $ans = explode($i,$pregunta[$i]);
                                $body.= '<li>'.$ini.'.-'.preg_replace('/[0-9]+/', '',$ans[0]).'</li>';
                                $ini++;
                            }
                            $body .= '</div></div>';
                        }
                    }
                    if($tipo == 4){
                        $numbers = filter_var($row['nombre'], FILTER_SANITIZE_NUMBER_INT);
                        $data = implode(',',str_split($numbers));
                        $numero = explode(',',$data);
                        $pregunta = explode($numero[0],$row['nombre']);
                        $preguntaP = explode('.',$pregunta[0]);
                        //$body .= '<div class="properties"><ul>';
                        for($i=0;$i<sizeof($preguntaP) - 1;$i++){
                            $body .= '<li>'.$preguntaP[$i].'.'.'</li>';
                        }
                        //$body .= '</ul></div>';

                        $datas = explode('2'.'.',$pregunta[1]);
                        $body .= '1'.$datas[0].'<br>';
                        $temp = $datas[1];

                        //$body .= '<div class="properties"><ul>';
                        for($i=2;$i<sizeof($numero)+1;$i++){
                            $data = explode(($i+1).'.',$temp);
                            if($i == sizeof($numero)){
                                $data = explode('.',$temp);
                                $body .= '<li>'.$i.'.'.$data[0].'</li><br>';
                            }else{
                                $body .= '<li>'.($i).'.'.$data[0].'<li>';
                            }
                            $temp = $data[1];
                        }
                        //$body .= '</ul></div>';

                        $body .= '<br><br>'.$data[1].'.<br>';
                        $array = array('cero','a)','b)','c)','d)','e)','f)','g)');
                        $incisos = explode(')',$data[2]);
                        //$body .= '<div class="properties"><ul>';
                        for($i=1;$i<sizeof($incisos);$i++){
                            $body .= '<li>'.$array[$i].substr($incisos[$i], 0, -1).'<li>';
                        }
                        //$body .= '</ul></div>';
                        //$body .= preg_replace('/[0-9]+/', '', $preguntaP[$i]).'.'.'<br>';
                        
                    }
                    if($tipo == 5){
                        $body .= $row['nombre'];
                    }

                    echo '<input class="w3-hide" type="text" name="resp" value="'.$id.'">';
                    echo '<div class="padre"><h3>'.
                    $body
                    .'</h3>';
                }
                $ans = mysqli_query($conexion,"SELECT * FROM respuestas WHERE id_pregunta = ".$id."");
                echo '<div class="respuestas">';
                while($rowans = mysqli_fetch_array($ans)){
                    echo '<input type="radio" name="ans" value="'.$rowans['valor'].'">'.$rowans['nombre'].'<br>';
                }
                echo '</div></div>';
            if($numero == $total){
                echo '</div>
                <button class="w3-button w3-green" type="submit" style="margin-top:20px;">Terminar examen</button></center></form>
                </div>
                </section>';
            }else{
                echo '
                <button class="w3-button w3-green" type="submit" style="margin-top:20px;">Enviar</button></center></form>
                </div>
                </section>';
            }
        }
        ?>
    </div>
<script>
$(document).ready(function(){
    let pre = parseInt('<?php echo $alert;?>');
    $('#area').on('change',function(){
        $.ajax({
            type: 'POST',
            url: 'db/numberquestions.php',
            data: {
                examen: $('#examen').val(),
                area: $('#area').val(),
                subarea: $('#subarea').val()
            },
            success: function(result) {
                document.getElementById('numero').placeholder="Max: "+result;
                pre = parseInt(result);
            }
        })
        if($('#area').val() == 0){
            $('#subarea').addClass('w3-disabled');
        }else{
            $('#subarea').removeClass('w3-disabled');
        }
    })

    $('#subarea').on('change',function(){
        $.ajax({
            type: 'POST',
            url: 'db/numberquestions.php',
            data: {
                examen: $('#examen').val(),
                area: $('#area').val(),
                subarea: $('#subarea').val()
            },
            success: function(result) {
                document.getElementById('numero').placeholder= "Max: "+result;
                pre = parseInt(result);
            }
        })
    })

    $('#empezar_examen').click(function(){
        if($('#numero').val() == null || $('#numero').val() == ""){
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Por favor ingrese la cantidad de preguntas."
            });
        }else{
            if($('#numero').val() > pre){
                Swal.fire({
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
                        num: $('#numero').val(),
                        examen: $('#examen').val(),
                        area: $('#area').val(),
                        subarea: $('#subarea').val()
                    },
                    dataType: 'JSON',
                    success: function(result){
                        window.location.href = "crearexamen.php?ex=quiz&q="+result.numero+"&n=1&e="+result.examen+"&a="+result.area+"&s="+result.subarea;
                    }
                })
            }
        }
    })
})
</script>    
</body>
</html>
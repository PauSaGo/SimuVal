<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido | SIMUVAL</title>
    <?php
        include('includes/head.php');
        include('db/usuarios.php');
        include('db/cargar_info.php');
    ?>
</head>
<body>
    <?php include('includes/nav.php') ?>
    <div class="container">
        <h1><b>Foro</b></h1>
        <h5>Te presentamos nuestro foro, este es un espacio donde puedes dar tus opiniones, sugerencias y comentarios acerca de nuestra página, sientete libre de comentar, es anónimo, a menos que gustes poner tu alias.</h5>
        <button onclick="document.getElementById('modal_comentario').style.display='block'" style="color:white" class="w3-btn myorange">Publicar nueva contribución</button><br><br>
<button class="tablink" onclick="openPage('tab1', this, '#e0e0e0')" id="defaultOpen">Opiniones</button>
<button class="tablink" onclick="openPage('tab2', this, '#e0e0e0')">Sugerencias</button>
<button class="tablink" onclick="openPage('tab3', this, '#e0e0e0')">Comentarios</button>

<div id="tab1" class="tabcontent">
  <?php
    $sql = mysqli_query($conexion,"SELECT * FROM foro");
    if(mysqli_num_rows($sql)>0){
        while($row = mysqli_fetch_array($sql)){
            if($row['tipo']=="1"){
  ?>
                <h5><strong><?php echo $row['alias']?></strong>:</h5>
                <p style="margin-top:-10px;margin-left:10px"><?php echo $row['contenido']?></p>
  <?php
            }
        }
    }
  ?>              
</div>

<div id="tab2" class="tabcontent">
<?php
    $sql = mysqli_query($conexion,"SELECT * FROM foro");
    if(mysqli_num_rows($sql)>0){
        while($row = mysqli_fetch_array($sql)){
            if($row['tipo']=="2"){
  ?>
                <h5><strong><?php echo $row['alias']?>:</strong></h5>
                <p style="margin-top:-10px;margin-left:10px"><?php echo $row['contenido']?></p>
  <?php
            }
        }
    }
  ?>   
</div>

<div id="tab3" class="tabcontent">
<?php
    $sql = mysqli_query($conexion,"SELECT * FROM foro");
    if(mysqli_num_rows($sql)>0){
        while($row = mysqli_fetch_array($sql)){
            if($row['tipo']=="3"){
  ?>
                <h5><strong><?php echo $row['alias']?>:</strong></h5>
                <p style="margin-top:-10px;margin-left:10px"><?php echo $row['contenido']?></p>
  <?php
            }
        }
    }
  ?>  
</div>

<script>
    function openPage(pageName,elmnt,color) {
      var i, tabcontent, tablinks;
      tabcontent = document.getElementsByClassName("tabcontent");
      for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
      }
      tablinks = document.getElementsByClassName("tablink");
      for (i = 0; i < tablinks.length; i++) {
        tablinks[i].style.backgroundColor = "";
      }
      document.getElementById(pageName).style.display = "block";
      elmnt.style.backgroundColor = color;
    }
    document.getElementById("defaultOpen").click();
</script>
    <div class="w3-row">
        <div class="w3-third w3-container">
                       
        </div>
        <div class="w3-third w3-container">
            
        </div>
        <div class="w3-third w3-container">
            
        </div>    
    </div>
    </div> 
<?php include('includes/modal.php'); ?>

</body>
</html>
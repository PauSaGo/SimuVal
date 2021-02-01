<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Bienvenido | SIMUVAL</title>
    <?php
        include('includes/head.php');
        include('db/cargar_info.php');
    ?>
</head>
<body>
    <?php include('includes/nav.php') ?>
    <div class="container">
        <h1><b>Foro</b></h1>
        <h5>Te presentamos nuestro foro, este es un espacio donde puedes dar tus opiniones, sugerencias y comentarios acerca de nuestra pagina, sientete libre de comentar, es anonimo, a menos que gustes poner tu alias.</h5>
        <button onclick="document.getElementById('modal_comentario').style.display='block'" style="color:white" class="w3-btn myorange">Publicar nueva contribución</button><br><br>
<button class="tablink" onclick="openPage('tab1', this, '#e0e0e0')" id="defaultOpen">Opiniones</button>
<button class="tablink" onclick="openPage('tab2', this, '#e0e0e0')">Sugerencias</button>
<button class="tablink" onclick="openPage('tab3', this, '#e0e0e0')">Comentarios</button>

<div id="tab1" class="tabcontent">
  <h3>Opiniones</h3>
  <p>Home is where the heart is..</p>
</div>

<div id="tab2" class="tabcontent">
  <h3>Sugerencias</h3>
  <p>Some news this fine day!</p> 
</div>

<div id="tab3" class="tabcontent">
  <h3>Comentarios</h3>
  <p>Get in touch, or swing by for a cup of coffee.</p>
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
<div id="modal_comentario" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:800px">
        <form class="w3-container" action="index.php" method="POST">
            <div class="w3-section">
                <div class="w3-row w3-center">
                   <h2>Nueva contribución</h2>
                    <div class="w3-col s12 m12 l12">
                        <label><b>Titulo</b></label>
                        <input class="w3-input" type="text" name="titulo" id="titulo" required>
                        <label for="tipo"><b>Tipo de contribución</b></label>
                        <select id="tipo" name="tipo" required>
                            <option value="" disabled selected> -Seleccione el tipo de contribucion- </option>
                            <option value="1">Opinion</option>
                            <option value="2">Sugerencia</option>
                            <option value="3">Comentario</option>
                        </select>
                        <label for="descripcion"><b>Descripción</b></label>
                        <textarea id="descripcion" name="descripcion" placeholder="" required></textarea>
                    </div>                  
                </div>
                <center><button onclick="document.getElementById('modal_comentario').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
                <button class="w3-button w3-green" name="publicar" id="publicar" type="submit">Publicar comentario</button></center>
            </div>
        </form>
    </div>
</div> 

<script>            
    $(document).ready(function(){
        $('#enviar_r').click(function(){
            if( $('#titulo').val() == null ){$('#titulo').css("border", "1px solid #F14B4B")
            }else{$('#titulo').css("border", "1px solid #66bb6a")}        

            if( $('#tipo').val() == '' ){$('#tipo').css("border", "1px solid #F14B4B")
            }else{$('#tipo').css("border", "1px solid #66bb6a")}

            if( $('#descripcion').val() == '' ){$('#descripcion').css("border", "1px solid #F14B4B")
            }else{$('#descripcion').css("border", "1px solid #66bb6a")}
        });
    });
</script>

</body>
</html>
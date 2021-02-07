<div id="modal_iniciar_sesion" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:800px">
        <form class="w3-container" action="index.php" method="POST">
            <div class="w3-section">
                <div class="w3-row w3-center">
                   <h2>Formulario de inicio de sesión</h2>
                    <div class="w3-col s12 m12 l12">
                        <label><b>Número de cuenta o trabajador</b></label>
                        <input class="w3-input" type="number" name="no_cuenta" id="no_cuenta" required>
                        <label><b>Contraseña</b></label>
                        <input class="w3-input" type="password" name="pass" id="pass" required>
                    </div>                  
                </div>
                <center><button onclick="document.getElementById('modal_iniciar_sesion').style.display='none'" type="button" class="w3-button w3-red">Cancel</button>
                <button class="w3-button w3-green" name="iniciar_sesion" id="iniciar_sesion" type="submit">Iniciar sesión</button></center>
            </div>
        </form>
    </div>
</div>

<div id="modal_registro" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:800px">
        <div class="w3-section w3-center">
            <h2>Formulario de registro</h2>
            <form class="w3-container w3-row" action="index.php" method="POST">
                <div class="w3-col s12 m12 l12">
                    <label for="tipo"><b>¿Que tipo de registro deseas realizar?</b></label>
                    <select onchange="tipo_s()" id="tipo" name="tipo" required>
                        <option value="" disabled selected> -Seleccione un tipo de usuario- </option>
                        <option value="1">Estudiante</option>
                        <option value="2">Docente</option>
                        <option value="3">Academia</option>
                    </select>
                </div>               
                <div id="datos_personales" style="display:none">
                    <div class="w3-col s12 m4 l4">
                        <label><b>Nombre (s)</b></label>
                        <input class="w3-input" type="text" id="nombre" name="nombre" required>
                    </div>
                    <div class="w3-col s12 m4 l4">
                        <label><b>Apellido paterno</b></label>
                        <input class="w3-input" type="text" id="apellido_p" name="apellido_p" required>
                    </div>
                    <div class="w3-col s12 m4 l4">
                        <label><b>Apellido materno</b></label>
                        <input class="w3-input" type="text" id="apellido_m" name="apellido_m" required>
                    </div>
                    <div class="w3-col s12 m12 l12">
                        <label><b>Correo</b></label>
                        <input class="w3-input" type="email" id="email" name="email" required>
                    </div>
                    <div class="w3-col s12 m6 l6">
                        <label><b>Contraseña</b></label>
                        <input class="w3-input" type="password" id="pass" name="pass" required>
                    </div>
                    <div class="w3-col s12 m6 l6">
                        <label><b>Repite contraseña</b></label>
                        <input class="w3-input" type="password" id="re_pass" name="re_pass" required>
                    </div>
                    <div class="w3-col s12 m6 l6">
                        <label><b>Fecha de nacimiento</b></label>
                        <input class="w3-input" type="date" id="f_nacimiento" name="f_nacimiento" required>
                    </div>
                </div>
                <div class="w3-col s12 m6 l6" id="div_no_trabajador" style="display:none">
                    <label><b>Número de trabajador</b></label>
                    <input class="w3-input" type="number" id="no_trabajador" name="no_trabajador">
                </div>
                <div id="datos_academicos" style="display:none">
                    <div class="w3-col s12 m6 l6">
                        <label><b>Número de cuenta</b></label>
                        <input class="w3-input" type="number" id="no_cuenta" name="no_cuenta">
                    </div>
                    <div class="w3-col s12 m12 l12">
                        <label for="semestre"><b>Semestre</b></label>
                        <select id="semestre" name="semestre">
                            <option value="" disabled selected> -Seleccione un semestre- </option>
                            <option value="1">1er semestre</option>
                            <option value="2">2do semestre</option>
                            <option value="3">3er semestre</option>
                            <option value="4">4to semestre</option>
                            <option value="5">5to semestre</option>
                            <option value="6">6to semestre</option>
                            <option value="7">7mo semestre</option>
                            <option value="8">8vo semestre</option>
                            <option value="9">9no semestre</option>
                        </select>
                    </div>
                    <div class="w3-col s12 m12 l12">
                        <label for="facultad"><b>Facultad</b></label>
                        <select OnChange="facultad_s()" id="facultad" name="facultad">
                            <option value="" disabled selected> -Seleccione una facultad- </option>
                            <option value="1">Facultad de Ingenieria Electromecanica</option>
                            <option value="2">Facultad de Contabiliad y Administración de Manzanillo</option>
                            <option value="3">Facultad de Ciencias Marinas</option>
                        </select>
                    </div>
                    <div class="w3-col s12 m12 l12" id="div_carrera_1" style="display:none;">
                        <label for="carrera_1"><b>Carrera</b></label>
                        <select id="carrera_1" name="carrera_1">
                            <option value="" disabled selected> -Seleccione una carrera- </option>
                            <option value="1">Ingeniería en Sistemas Computacionales</option>
                            <option value="2">Ingeniería Mecánico Electricista</option>
                            <option value="3">Ingeniería en Software</option>
                            <option value="4">Ingeniería en Mecatrónica</option>
                            <option value="5">Ingeniería en Tecnologías Electrónicas</option>
                            <option value="6">Ingeniería en Mecánica y Eléctrica</option>
                        </select>
                    </div>
                    <div class="w3-col s12 m12 l12" id="div_carrera_2" style="display:none;">
                        <label for="carrera_2"><b>Carrera</b></label>
                        <select id="carrera_2" name="carrera_2">
                            <option value="" disabled selected> -Seleccione una carrera- </option>
                            <option value="1">Contador Público</option>
                            <option value="2">Licenciatura en Administración</option>
                        </select>
                    </div>
                    <div class="w3-col s12 m12 l12" id="div_carrera_3" style="display:none;">
                        <label for="carrera_3"><b>Carrera</b></label>
                        <select id="carrera_3" name="carrera_3">
                            <option value="" disabled selected> -Seleccione una carrera- </option>
                            <option value="1">Ingeniería Oceánica</option>
                            <option value="2">Licenciatura en Gestión de Recursos Marinos y Portuarios</option>
                            <option value="3">Licenciatura en Oceanología</option>
                        </select>
                    </div>
                </div>
                <center>
                    <button onclick="document.getElementById('modal_registro').style.display='none'" type="button" style="width:50%" class="w3-button w3-red">Cancel</button>
                    <button class="w3-button w3-green" name="btn_registo" type="submit" style="display:none;width:50%" id="btn_registo">Registrarse</button> 
                </center>
                </form>
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
                        <label><b>Alias</b></label>
                        <input class="w3-input" type="text" name="alias" id="alias" required>
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
                <button class="w3-button w3-green" name="enviar_r" id="enviar_r" type="submit">Publicar</button></center>
            </div>
        </form>
    </div>
</div>

<div id="modal_editar_pregunta" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:800px">
        <form class="w3-container" action="index.php" method="POST">
            <div class="w3-section">
                <div class="w3-row w3-center">
                   <h2>Editar pregunta</h2>
                    <div class="w3-col s12 m12 l12">
                        <label><b>Examen</b></label>
                        <input  class="w3-input" type="text" name="examen" id="examen" disabled>
                        <label><b>Pregunta</b></label>
                        <!--<input  class="w3-input" type="text" name="pregunta" id="pregunta" disabled>-->
                        <textarea class="w3-input w3-border" style="height:150px;" name="pregunta" id="pregunta" cols="30" rows="100" disabled></textarea>
                        <label><b>Tipo de pregunta</b></label>
                        <input  class="w3-input" type="text" name="tipo" id="tipo" disabled>
                        <label><b>Justificacion de pregunta</b></label>
                        <input  class="w3-input" type="text" name="justificacion" id="justificacion" disabled>
						<label><b>Respuesta 1</b></label>
						<input  class="w3-input" style="display:inline-block;width:auto;" type="text" name="respuesta1" id="respuesta1" disabled>
						<label><b>Justificacion</b></label>
                        <input  class="w3-input" style="display:inline-block;width:auto;height:30px;" type="text" name="justresp1" id="justresp1" disabled>
						<label><b>Respuesta2</b></label>
						<input  class="w3-input" style="display:inline-block;width:auto;" type="text" name="respuesta2" id="respuesta2" disabled>
						<label><b>Justificacion</b></label>
                        <input  class="w3-input" style="display:inline-block;width:auto;" type="text" name="justresp2" id="justresp2" disabled>
						<label><b>Respuesta3</b></label>
						<input  class="w3-input" style="display:inline-block;width:auto;" type="text" name="respuesta3" id="respuesta3" disabled>
						<label><b>Justificacion</b></label>
                        <input  class="w3-input" style="display:inline-block;width:auto;" type="text" name="justresp3" id="justresp3" disabled>
						<label><b>Respuesta4</b></label>
						<input  class="w3-input" style="display:inline-block;width:auto;" type="text" name="respuesta4" id="respuesta4" disabled>                        
						<label><b>Justificacion</b></label>
                        <input  class="w3-input" style="display:inline-block;width:auto;" type="text" name="justresp4" id="justresp4" disabled><br>
                        <label><b>Area</b></label>
                        <input  class="w3-input" type="text" name="area" id="area" disabled>
                        <label><b>Subarea</b></label>
                        <input  class="w3-input" type="text" name="subarea" id="subarea" disabled>
                        <label><b>Imagen</b></label>
                        <input  class="w3-input" type="text" name="imagen" id="imagen" disabled>
                        <label><b>Fecha publicada</b></label>
                        <input  class="w3-input w3-center" type="text" name="registro" id="registro" disabled>
                        <label><b>Estado</b></label>
                        <!--<input  class="w3-input" type="text" name="estado" id="estado" required>-->
                        <select id="estado" name="">
                        </select>
                        <label><b>Comentario</b></label>
                        <input  class="w3-input" type="text" name="comentario" id="comentario">
                        <input type="text" class="w3-hide" id="idpregunta">
                    </div>                  
                </div>
                <center><button onclick="document.getElementById('modal_editar_pregunta').style.display='none'" type="button" class="w3-button w3-red">Cancelar</button>
                <button class="w3-button w3-green" name="editar_pregunta" id="editar_pregunta" type="button">Guardar</button></center>
            </div>
        </form>
    </div>
</div>
   
<script>
    function facultad_s() {
        var x = document.getElementById("facultad").value;
        if(x=='1'){
            document.getElementById("div_carrera_1").style.display='block';
            document.getElementById("div_carrera_2").style.display='none';
            document.getElementById("div_carrera_3").style.display='none';
            document.getElementById("btn_registo").style.display='block';
        }else if(x=='2'){
            document.getElementById("div_carrera_1").style.display='none';
            document.getElementById("div_carrera_2").style.display='block';
            document.getElementById("div_carrera_3").style.display='none';
            document.getElementById("btn_registo").style.display='block';
        }else if(x=='3'){
            document.getElementById("div_carrera_1").style.display='none';
            document.getElementById("div_carrera_2").style.display='none';
            document.getElementById("div_carrera_3").style.display='block';
            document.getElementById("btn_registo").style.display='block';
        }
    }
    function tipo_s(){
        var y = document.getElementById("tipo").value;
        if(y=='1'){
            document.getElementById("datos_personales").style.display='block';
            document.getElementById("datos_academicos").style.display='block';
            document.getElementById("div_no_trabajador").style.display='none';
        }else if(y=='2' || y=='3'){
            document.getElementById("datos_personales").style.display='block';
            document.getElementById("datos_academicos").style.display='none';
            document.getElementById("btn_registo").style.display='block';
            document.getElementById("div_no_trabajador").style.display='block';
        }
    }
        
    $(document).ready(function(){
        $('#btn_registo').click(function(){
            if( $('#tipo').val() == null ){$('#tipo').css("border", "1px solid #F14B4B")
            }else{$('#tipo').css("border", "1px solid #66bb6a")}   
            if( $('#nombre').val() == '' ){$('#nombre').css("border", "1px solid #F14B4B")
            }else{$('#nombre').css("border", "1px solid #66bb6a")}   
            if( $('#apellido_p').val() == '' ){$('#apellido_p').css("border", "1px solid #F14B4B")
            }else{$('#apellido_p').css("border", "1px solid #66bb6a")} 
            if( $('#apellido_m').val() == '' ){$('#apellido_m').css("border", "1px solid #F14B4B")
            }else{$('#apellido_m').css("border", "1px solid #66bb6a")} 
            if( $('#email').val() == '' ){$('#email').css("border", "1px solid #F14B4B")
            }else{$('#email').css("border", "1px solid #66bb6a")} 
            if( $('#pass').val() == '' ){$('#pass').css("border", "1px solid #F14B4B")
            }else{$('#pass').css("border", "1px solid #66bb6a")} 
            if( $('#re_pass').val() == '' ){$('#re_pass').css("border", "1px solid #F14B4B")
            }else{$('#re_pass').css("border", "1px solid #66bb6a")} 
            if( $('#f_nacimiento').val() == '' ){$('#f_nacimiento').css("border", "1px solid #F14B4B")
            }else{$('#f_nacimiento').css("border", "1px solid #66bb6a")} 
                
            if( $('#no_trabajador').val() == '' ){$('#no_trabajador').css("border", "1px solid #F14B4B")
            }else{$('#no_trabajador').css("border", "1px solid #66bb6a")} 
                
            if( $('#no_cuenta').val() == '' ){$('#no_cuenta').css("border", "1px solid #F14B4B")
            }else{$('#no_cuenta').css("border", "1px solid #66bb6a")}
            
            if( $('#semestre').val() == null ){$('#semestre').css("border", "1px solid #F14B4B")
            }else{$('#semestre').css("border", "1px solid #66bb6a")}
            if( $('#facultad').val() == null ){$('#facultad').css("border", "1px solid #F14B4B")
            }else{$('#facultad').css("border", "1px solid #66bb6a")}
            if( $('#carrera_1').val() == null ){$('#carrera_1').css("border", "1px solid #F14B4B")
            }else{$('#carrera_1').css("border", "1px solid #66bb6a")}
            if( $('#carrera_2').val() == null ){$('#carrera_2').css("border", "1px solid #F14B4B")
            }else{$('#carrera_2').css("border", "1px solid #66bb6a")}
            if( $('#carrera_3').val() == null ){$('#carrera_3').css("border", "1px solid #F14B4B")
            }else{$('#carrera_3').css("border", "1px solid #66bb6a")}
            
            if ($('#tipo').val() == 1 ){
                $("#no_cuenta").prop('required',true);
                $("#semestre").prop('required',true);
                $("#facultad").prop('required',true);
            }else if ($('#tipo').val() == 2 || $('#tipo').val() == 3 ){
                $("#no_trabajador").prop('required',true);
            }
                
            if ($('#facultad').val() == 1 ){
                $("#carrera_1").prop('required',true);
            }else if ($('#facultad').val() == 2 ){
                $("#carrera_2").prop('required',true);
            }else if ($('#facultad').val() == 3 ){
                $("#carrera_3").prop('required',true);
            }
        });
        
        $('#iniciar_sesion').click(function(){
            if( $('#no_cuenta').val() == '' ){$('#no_cuenta').css("border", "1px solid #F14B4B")
            }else{$('#no_cuenta').css("border", "1px solid #66bb6a")}
            if( $('#pass').val() == '' ){$('#pass').css("border", "1px solid #F14B4B")
            }else{$('#pass').css("border", "1px solid #66bb6a")} 
        });

        $('#enviar_r').click(function(){
            if( $('#alias').val() == '' ){$('#alias').css("border", "1px solid #F14B4B")
            }else{$('#alias').css("border", "1px solid #66bb6a")}        

            if( $('#tipo').val() == '' ){$('#tipo').css("border", "1px solid #F14B4B")
            }else{$('#tipo').css("border", "1px solid #66bb6a")}

            if( $('#descripcion').val() == '' ){$('#descripcion').css("border", "1px solid #F14B4B")
            }else{$('#descripcion').css("border", "1px solid #66bb6a")}
        });

        $('#editar_pregunta').click(function(){
            Swal.fire({
              title: '¿Esta usted seguro?',
              icon: 'warning',
              showCancelButton: true,
              confirmButtonColor: '#3085d6',
              cancelButtonColor: '#d33',
              confirmButtonText: 'Sí, estoy seguro',
              cancelButtonText: 'Cancelar',
            }).then((result) => {
              if (result.isConfirmed) {
                Swal.fire(
                  '¡Actualizado!',
                  'Se actualizo correctamente.',
                  'success'
                ),
                $.ajax({
                    type: 'POST',
                    url: 'db/usuarios.php',
                    data: {
                        success: 'success',
                        estado: $('#estado').val(),
                        comentario: $('#comentario').val(),
                        id: $('#idpregunta').val()
                    },
                    cache: true,
                    success:function(result){
                        if(result == "success"){
                            setTimeout(() => { window.location="checkreactivo.php?pagina=1"; }, 2000);
                        }
                    }
                })
              }
            })
        });
    });
</script> 
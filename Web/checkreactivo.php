<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Revisar preguntas | Simuval</title>
    <?php 
        include('includes/head.php');
        include('db/cargar_info.php');
    ?>
</head>
<body>
	<?php include('includes/nav.php') ?>
	
<div id="modal_editar_pregunta" class="w3-modal">
    <div class="w3-modal-content w3-card-4 w3-animate-zoom" style="max-width:800px">
        <form class="w3-container" action="index.php" method="POST">
            <div class="w3-section">
                <div class="w3-row w3-center">
                   <h2>Editar pregunta</h2>
                    <div class="w3-col s12 m12 l12">
                        <label><b>Examen</b></label>
                        <input  class="w3-input" type="text" name="examne" id="examen" required>
                        <label><b>Pregunta</b></label>
                        <input  class="w3-input" type="text" name="pregunta" id="pregunta" required>
                        <label><b>Tipo de pregunta</b></label>
                        <input  class="w3-input" type="text" name="tipo" id="tipo" required>
                        <label><b>Justificacion de pregunta</b></label>
                        <input  class="w3-input" type="text" name="justificacion" id="justificacion" required>
						<label><b>Respuesta 1</b></label>
						<input  class="w3-input" style="display:inline-block;width:auto;" type="text" name="respuesta1" id="respuesta1" required>
						<label><b>Justificacion</b></label>
                        <input  class="w3-input" style="display:inline-block;width:auto;" type="text" name="justresp1" id="justresp1" required>
						<label><b>Respuesta2</b></label>
						<input  class="w3-input" style="display:inline-block;width:auto;" type="text" name="respuesta2" id="respuesta2" required>
						<label><b>Justificacion</b></label>
                        <input  class="w3-input" style="display:inline-block;width:auto;" type="text" name="justresp2" id="justresp2" required>
						<label><b>Respuesta3</b></label>
						<input  class="w3-input" style="display:inline-block;width:auto;" type="text" name="respuesta3" id="respuesta3" required>
						<label><b>Justificacion</b></label>
                        <input  class="w3-input" style="display:inline-block;width:auto;" type="text" name="justresp3" id="justresp3" required>
						<label><b>Respuesta4</b></label>
						<input  class="w3-input" style="display:inline-block;width:auto;" type="text" name="respuesta4" id="respuesta4" required>                        
						<label><b>Justificacion</b></label>
                        <input  class="w3-input" style="display:inline-block;width:auto;" type="text" name="justresp4" id="justresp4" required><br>
                        <label><b>Area</b></label>
                        <input  class="w3-input" type="text" name="area" id="area" required>
                        <label><b>Subarea</b></label>
                        <input  class="w3-input" type="text" name="subarea" id="subarea" required>
                        <label><b>Imagen</b></label>
                        <input  class="w3-input" type="text" name="imagen" id="imagen" required>
                        <label><b>Fecha publicada</b></label>
                        <input  class="w3-input" type="text" name="registro" id="registro" required>
                        <label><b>Estado</b></label>
                        <input  class="w3-input" type="text" name="estado" id="estado" required>
                    </div>                  
                </div>
                <center><button onclick="document.getElementById('modal_editar_pregunta').style.display='none'" type="button" class="w3-button w3-red">Cancelar</button>
                <button class="w3-button w3-green" name="editar_pregunta" id="editar_pregunta" type="submit">Guardar</button></center>
            </div>
        </form>
    </div>
</div>
    <div class="container">
	<h1><b>Revisar preguntas</b></h1>
			<table class="w3-table w3-striped w3-bordered">
            	<thead>
            		<tr>
                        <th>Examen</th>
              			<th>Preg&uacute;nta</th>                    
                        <th>Tipo de pregunta</th>
                        <th>Justificaci&oacute;n</th>
              			<th>Respuestas</th>
                        <th>Justificaci&oacute;n</th>
                        <th>&Aacute;rea</th>
						<th>Subarea(s)</th>
                        <th>Imagen</th>
						<th>Fecha publicada</th>
                        <th>Estado</th>
                        <th>Acciones</th>						
            		</tr>
            	</thead>
            	<tbody>
					<?php						

					if(mysqli_num_rows($myexamen)>0){
						while($row = mysqli_fetch_array($myexamen)){
					?>
            		<tr>
                		<td><?php echo $row['examen']?></td>
                        <td><?php echo $row['nombre']?></td>
                        <td><?php echo $row['tipo']?></td>
                        <td><?php  if($row['justificacion'] == null){
							echo 'No hay justificación';
							}else{
								echo $row['justificacion'];
							}
							?></td>
                		<td><?php echo $row['respuestas']?></td>
						<td><?php echo $row['justresp']?></td>
						<td><?php echo $row['area']?></td>
						<td><?php echo $row['subarea']?></td>
						<td><?php echo $row['imagen']?></td>
						<td><?php echo $row['f_registro']?></td>
						<td><?php echo $row['estado']?></td>
						<td>
							<button type="button" class="w3-btn">
								<span class="material-icons">create</span>
							</button>
						</td>                        
            		</tr>
						<?php } 
						}else{
							echo '<td><h4>No se encontraron registros</h4></td>';
						}?>
            	</tbody>
            </table>

			<!--<ul class="pagination">
        		<li><a href="?pageno=1">First</a></li>
        		<li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
            		<a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
        		</li>
        		<li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
            		<a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
        		</li>
        		<li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
    		</ul>-->

		</div>
    </div>
	<?php include('includes/modal.php'); ?>
</body>
</html>
<script>
	$(document).ready(function(){
		$('.w3-btn').on('click',function(){
			document.getElementById('modal_editar_pregunta').style.display='block';

			$tr = $(this).closest('tr');

			var data = $tr.children("td").map(function(){
				return $(this).text();
			}).get();

			$('#examen').val(data[0]);
			$('#pregunta').val(data[1]);
			$('#tipo').val(data[2]);
			$('#justificacion').val(data[3]);
			//$('#respuesta').val(data[4]);
			var resp = data[4].split(', *');
			var resp0 = dataempty(resp[0]);
			var resp1 = dataempty(resp[1]);
			var resp2 = dataempty(resp[2]);
			var resp3 = dataempty(resp[3]);
			$('#respuesta1').val(resp0);
			$('#respuesta2').val(resp1);
			$('#respuesta3').val(resp2);
			$('#respuesta4').val(resp3);

			//$('#justresp').val(data[5]);
			var just = data[5].split(', *');
			var just0 = dataempty(just[0]);
			var just1 = dataempty(just[1]);
			var just2 = dataempty(just[2]);
			var just3 = dataempty(just[3]);
			$('#justresp1').val(just0);
			$('#justresp2').val(just1);
			$('#justresp3').val(just2);
			$('#justresp4').val(just3);

			$('#area').val(data[6]);
			$('#subarea').val(data[7]);
			$('#imagen').val(data[8]);
			$('#registro').val(data[9]);
			var estado = estados(data[10]);
			$('#estado').val(estado);
		
		});

		function dataempty(data) {
			if(data == null) {
				data = 'No hay dato';
				return data;
			}else {
				return data;
			}
		}

		function estados(estado) {
			if(estado == '1'){
				estado = 'Aprobado';
				return estado;
			}else if(estado == '2'){
				estado = 'Pendiente';
				return estado;
			}else if(estado == '3'){
				estado = 'Rechazado';
				return estado;
			}
		}

	});
</script>
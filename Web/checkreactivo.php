<style>
table{
	border: 2px solid #FF9100;
	border-radius: 10px;
}
.isDisabled{
	cursor: not-allowed;
	opacity: 0.5;
  	pointer-events: none;
  	text-decoration: none;
}
</style>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Revisar preguntas | Simuval</title>
    <?php 
		include('includes/head.php');
		include('db/cargar_info.php');
		
		if(!$_GET){
			header('Location:checkreactivo.php?pagina=1');
		}

		if($total_pages == 0){
			$pag= "w3-hide";
		}else{
			$pag="";
		}
    ?>
</head>
<body>
	<?php include('includes/nav.php') ?>
    <div class="container">
	<h1><b>Revisar preguntas</b></h1>
			<table class="w3-table w3-striped w3-bordered">
            	<thead>
            		<tr>
						<th>Propuesto</th>
                        <th>Examen</th>
              			<th>Preg&uacute;nta</th>  
						<th>Imagen</th>
                        <th>Justificaci&oacute;n</th>
              			<th>Respuestas</th>
                        <th>&Aacute;rea</th>
						<th>Subarea(s)</th>
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
						<td><?php echo $row['usuario'];?></td>
                		<td><?php echo $row['examen']?></td>
                        <td><?php 
							//echo $row['nombre']
							$tipo = $row['tipo'];
							$body = "";
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
								for($i=2;$i<sizeof($separate)+2;$i++){
									$index = $i;
									$ans = array_filter(explode($index,$pregunta[$i]));
									$body .= $ini.'.-'.$ans[0].'<br>';
									$ini++;
								}
							}
							if($tipo == 3){
								$pregunta = explode(".",$row['nombre']);
								$body .= $pregunta[0].'.';
								if($pregunta[1] == 1){
									$body .= '<br><br>';
									for($i=2;$i<sizeof($pregunta); $i++){
										$ans = explode($i,$pregunta[$i]);
										$body.= $ini.'.-'.$ans[0].'<br>';
										$ini++;
									}
								}else{
									$body .= $pregunta[1].'.';
									$body .= '<br><br>';
									filter_var($pregunta,FILTER_SANITIZE_STRING);
									for($i=3;$i<sizeof($pregunta); $i++){
										$ans = explode($i,$pregunta[$i]);
										$body.= $ini.'.-'.preg_replace('/[0-9]+/', '',$ans[0]).'<br>';
										$ini++;
									}
								}
							}
							if($tipo == 4){
								$numbers = filter_var($row['nombre'], FILTER_SANITIZE_NUMBER_INT);
								$data = implode(',',str_split($numbers));
								$numero = explode(',',$data);
								$pregunta = explode($numero[0],$row['nombre']);
								$preguntaP = explode('.',$pregunta[0]);
								for($i=0;$i<sizeof($preguntaP) - 1;$i++){
									$body .= $preguntaP[$i].'.'.'<br>';
								}

								$datas = explode('2'.'.',$pregunta[1]);
								$body .= '1'.$datas[0].'<br>';
								$temp = $datas[1];

								for($i=2;$i<sizeof($numero)+1;$i++){
									$data = explode(($i+1).'.',$temp);
									if($i == sizeof($numero)){
										$data = explode('.',$temp);
										$body .= $i.'.'.$data[0];
									}else{
										$body .= ($i).'.'.$data[0].'<br>';
									}
									$temp = $data[1];
								}

								$body .= '<br><br>'.$data[1].'.<br>';
								$array = array('cero','a)','b)','c)','d)','e)','f)','g)');
								$incisos = explode(')',$data[2]);
								for($i=1;$i<sizeof($incisos);$i++){
									$body .= $array[$i].substr($incisos[$i], 0, -1).'<br>';
								}
								//$body .= preg_replace('/[0-9]+/', '', $preguntaP[$i]).'.'.'<br>';
								
							}
							if($tipo == 5){
								$body .= $row['nombre'];
							}
							echo $body;
						?></td>
                        <td><?php if($row['imagen'] == null){echo 'No hay imagen';}
						else{echo $row['imagen'];}?></td>
                        <td><?php  if($row['justificacion'] == null){
							echo 'No hay justificación';
							}else{
								echo $row['justificacion'];
							}
							?></td>
                		<td><?php 
						$body = explode(", *",$row['respuestas']);

						echo 'A) '.$body[0].
						'<br><br>'.'B) '.$body[1].
						'<br><br>'.'C) '.$body[2].
						'<br><br>'.'D) '.$body[3];

						?></td>
						<td><?php echo $row['area']?></td>
						<td><?php echo $row['subarea']?></td>
						<td><?php echo $row['f_registro']?></td>
						<td><?php if($row['estado'] == 1){
							echo 'Aprobado';
							}elseif($row['estado'] == 2){
								echo 'Pendiente';
							}elseif($row['estado'] == 3){
								echo 'Rechazado';
							}?></td>
						<td class='w3-hide'><?php echo $row['tipo'];?></td>
						<td class='w3-hide'><?php echo $row['respuestas'];?></td>
						<td class='w3-hide'><?php echo $row['justresp'];?></td>
						<td class="w3-hide"><?php echo $row['id'];?></td>
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

			<div class="w3-center" style="margin-top:10px;">
				<div class="w3-bar <?php echo $pag;?>">
  					<a class="w3-button <?php echo $_GET['pagina']<=1 ? 'isDisabled' : ''?>" href="checkreactivo.php?pagina=<?php echo $_GET['pagina']-1?>">&laquo;</a>
						<?php for($i=0;$i<$total_pages;$i++){?>
  							<a href="checkreactivo.php?pagina=<?php echo $i+1?>" class="w3-button <?php echo $_GET['pagina']==$i+1 ? 'w3-green' : ''?>"><?php echo $i+1?></a>
						<?php }?>	  
  					<a href="checkreactivo.php?pagina=<?php echo $_GET['pagina']+1?>" class="w3-button <?php echo $_GET['pagina']>=$total_pages ? 'isDisabled' : ''?>">&raquo;</a>
				</div>
			</div>

		</div>
    </div>
	<?php include('includes/modal.php'); ?>
</body>
</html>
<script>
	//Funcion para el click Esc cierre el modal
	$(document).keyup(function(e) {
	  if(e.keyCode === 27){ 
		document.getElementById('modal_editar_pregunta').style.display='none';
	  }
	});

	$(document).ready(function(){
		//Funcion para el click de accion para abrir el modal para aprobar o rechazar la pregunta
		$('.w3-btn').on('click',function(){
			//Hacemos aparecer el modal editar pregunta
			document.getElementById('modal_editar_pregunta').style.display='block';

			//Hacemos un recorrido hasta el final de la etiqueta 'tr'
			$tr = $(this).closest('tr');

			//Obtenemos todos los texto de la etiqueta 'td'
			var data = $tr.children("td").map(function(){
				return $(this).text();
			}).get();

			//Empezamos a parsear(acomodar) los datos con sus respectivos inputs
			$('#examen').val(data[1]);
			$('#tipo').val(data[10]);
			$('#pregunta').val(data[2]);
			$('#justificacion').val(data[4]);
			//$('#respuesta').val(data[4]);
			//Separamos los datos que estan marcados por el punto y asterisco y cada dato lo ponemos con sus respectivos inputs, en este caso separamos cada pregunta
			var resp = data[11].split(', *');
			var resp0 = dataempty(resp[0]);
			var resp1 = dataempty(resp[1]);
			var resp2 = dataempty(resp[2]);
			var resp3 = dataempty(resp[3]);

			$('#respuesta1').val(resp0);
			$('#respuesta2').val(resp1);
			$('#respuesta3').val(resp2);
			$('#respuesta4').val(resp3);

			//$('#justresp').val(data[5]);
			//Hacemos lo mismo que las preguntas pero ahora con las justificaciones de cada pregunta
			var just = data[12].split(', *');
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
			$('#imagen').val(data[3]);
			$('#registro').val(data[8]);
			var estado = (data[9]);
			//$('#estado').val(estado);
			//Obtenemos el valor del estado y dependiendo del estado es el primero en la fina para que aparezca el estado que esta y el usuario decida cambiarlo o no
			if(estado=="Aprobado"){
				//Removemos las opciones que tuvo con anterioridad y agregamos las nuevas
				$("#estado option").remove();
				//Aqui comenzamos agregarlos
				$('#estado').append($('<option>').val('1').text('Aprobado'));
				$('#estado').append($('<option>').val('2').text('Pendiente'));
				$('#estado').append($('<option>').val('3').text('Rechazado'));
			}else if(estado=="Pendiente"){
				$("#estado option").remove();

				$('#estado').append($('<option>').val('2').text('Pendiente'));
				$('#estado').append($('<option>').val('1').text('Aprobado'));
				$('#estado').append($('<option>').val('3').text('Rechazado'));
			}else if(estado=="Rechazado"){
				$("#estado option").remove();

				$('#estado').append($('<option>').val('3').text('Rechazado'));
				$('#estado').append($('<option>').val('1').text('Aprobado'));
				$('#estado').append($('<option>').val('2').text('Pendiente'));
			}
			//Esto nos sirve para identificar el id de cada pregunta y poderlo actualizarlo si el usuario hizo algún cambio.
			$('#idpregunta').val(data[13]);
		
		});

		//Funcion para saber si existe algun dato o no
		function dataempty(data) {
			if(data == null) {
				data = 'No hay dato';
				return data;
			}else {
				return data;
			}
		}

		//Funcion para cambiar el valor numero por un string relacionado al estado
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
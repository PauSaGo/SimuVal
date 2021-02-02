<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Mis Preguntas | Simuval</title>
    <?php 
        include('includes/head.php');
        include('db/cargar_info.php');
    ?>
</head>
<body>
    <?php include('includes/nav.php') ?>
    <div class="container">
	<h1><b>Mis preguntas</b></h1>
			<table class="w3-table w3-striped w3-bordered">
            	<thead>
            		<tr>
              			<th>Pregunta</th>
              			<th>Imagen</th>
						<th>Tipo de pregunta</th>
                        <th>Examen</th>
                        <th>&Aacute;rea</th>
                        <th>Subarea</th>
						<th>Justificaci&oacute;n</th>
						<th>Comentario</th>
						<th>Estado de la pregunta</th>
						<th>Fecha y hora de registro</th>
						<th>Alta</th>
            		</tr>
            	</thead>
            	<tbody>
                    <?php 
                        if(mysqli_num_rows($mypregunta)>0){
                            while($row = mysqli_fetch_array($mypregunta)) {
                    ?>
            		            <tr>
                                    <td><?php echo $row['nombre']?></td>
                                    <td><?php echo $row['imagen']?></td>
                                    <td><?php echo $row['tipo']?></td>
                                    <td><?php echo $row['examen']?></td>
                                    <td><?php echo $row['area']?></td>
					            	<td><?php echo $row['subareas']?></td>
                                    <td><?php echo $row['justificacion']?></td>
                                    <td><?php echo $row['comentario']?></td>
                                    <td><?php echo $row['estado']?></td>  
                                    <td><?php echo $row['f_registro']?></td>              	
                                    <td><?php echo $row['academico']?></td>
            		            </tr>
                    <?php   }
                        }else{
                    ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
					            <td><center>No hay datos</center></td>
                                <td></td>
                                <td></td>
                                <td></td>  
                                <td></td>              	
                                <td></td>
            		        </tr>
                    <?php }?>
            	</tbody>
            </table>
		</div>
    </div>
</body>
</html>
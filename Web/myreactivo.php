<style>
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
    <title>Mis Preguntas | Simuval</title>
    <?php 
        include('includes/head.php');
        include('db/cargar_info.php');
        if(!$_GET){
			header('Location:myreactivo.php?pagina=1');
		}

		if($total_pages_result == 0){
			$pag= "w3-hide";
		}else{
			$pag="";
		}
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
                        <th>Examen</th>
                        <th>&Aacute;rea</th>
                        <th>Sub&aacute;rea</th>
						<th>Justificaci&oacute;n</th>
						<th>Comentario</th>
						<th>Fecha y hora de registro</th>
						<th>Estado</th>
            		</tr>
            	</thead>
            	<tbody>
                    <?php 
                        if(mysqli_num_rows($mypregunta)>0){
                            while($row = mysqli_fetch_array($mypregunta)) {
                    ?>
            		            <tr>
                                    <td><?php echo htmlspecialchars($row['nombre'], ENT_QUOTES, 'UTF-8');?></td>
                                    <td><?php if($row['imagen'] == null || $row['imagen'] == ""){
                                        echo "No hay imagen";
                                    }else{
                                        echo $row['imagen'];
                                    }?></td>
                                    <td><?php echo htmlspecialchars($row['examen'], ENT_QUOTES, 'UTF-8');?></td>
                                    <td><?php echo htmlspecialchars($row['area'], ENT_QUOTES, 'UTF-8');?></td>
					            	<td><?php echo htmlspecialchars($row['subarea'], ENT_QUOTES, 'UTF-8');?></td>
                                    <td><?php if($row['justificacion'] == "" || $row['justificacion'] == null){
                                            echo "No hay justifacion";
                                        }else{
                                            echo $row['justificacion'];
                                        }?></td>
                                    <td><?php echo htmlspecialchars($row['comentario'], ENT_QUOTES, 'UTF-8');?></td>  
                                    <td><?php echo htmlspecialchars($row['f_registro'], ENT_QUOTES, 'UTF-8');?></td> 
                                    <td><?php if($row['estado'] == 1){echo "Aprobado";}
                                    if($row['estado'] == 2){echo "Pendiente";}
                                    if($row['estado'] == 3){echo "Rechazado";}?></td>
            		            </tr>
                    <?php   }
                        }else{
                    ?>
                            <tr>
                                <td></td>
                                <td></td>
                                <td></td>
                                <td></td>
					            <td><center>No hay datos</center></td>
                                <td></td>
                                <td></td>
                                <td></td>  
                                <td></td>
            		        </tr>
                    <?php }?>
            	</tbody>
            </table>

            <div class="w3-center">
				<div class="w3-bar <?php echo $pag;?>">
  					<a class="w3-button <?php echo $_GET['pagina']<=1 ? 'isDisabled' : ''?>" href="myreactivo.php?pagina=<?php echo $_GET['pagina']-1?>">&laquo;</a>
						<?php for($i=0;$i<$total_pages_result;$i++){?>
  							<a href="myreactivo.php?pagina=<?php echo $i+1?>" class="w3-button <?php echo $_GET['pagina']==$i+1 ? 'w3-green' : ''?>"><?php echo $i+1?></a>
						<?php }?>	  
  					<a href="myreactivo.php?pagina=<?php echo $_GET['pagina']+1?>" class="w3-button <?php echo $_GET['pagina']>=$total_pages_result ? 'isDisabled' : ''?>">&raquo;</a>
				</div>
			</div>

		</div>
    </div>
    <script>
    $(document).ready(function(){
    })
    </script>
</body>
</html>
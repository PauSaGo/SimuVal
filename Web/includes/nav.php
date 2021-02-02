<ul class="nav" style="width:20%">
    <a href="index.php"><img id="logo" src="images/logo_nombre.png"></a>
    <?php if(!$_SESSION['numero']) {?>
    <li><a href="index.php">Inicio</a></li>
    <?php }?>
    <li><a href="manual.php">Manual</a></li>
    <li><a href="foro.php">Foro</a></li>
    <?php if($_SESSION['tipo'] == 1): ?>
        <li><a href="crearexamen.php">Nuevo examen</a></li>
        <li><a href="historial.php">Historial</a></li>
    <?php endif;?> 
    <?php if($_SESSION['tipo'] == 2): ?>
        <li><a href="newreactivo.php">Redactar nueva pregunta</a></li>
        <li><a href="myreactivo.php">Mis preguntas</a></li>
    <?php endif;?> 
    <?php if($_SESSION['tipo'] == 3): ?>
        <li><a href="newreactivo.php">Redactar nueva pregunta</a></li>
        <li><a href="checkreactivo.php?pagina=1">Revisar preguntas</a></li>
    <?php endif;?> 
    <?php if($_SESSION['tipo'] == 1 || $_SESSION['tipo'] == 2 || $_SESSION['tipo'] == 3): ?>
        <li><a href="perfil.php">perfil</a></li>
        <form action="index.php" method="POST">
            <li><input id="cs" name="cs" type="submit" value="Cerrar sesión"></li>
        </form>
    <?php endif; ?>
</ul>

<script>
    jQuery(function($) {
        var path = window.location.href;
        $('ul a').each(function() {
            if (this.href === path) {
                $(this).addClass('active');
            }
        });
    });

    

</script>

<?php
    if(isset($_POST['cs'])){ 
        @session_start();
        session_destroy();
        header("Location: index.php");
    }
?>

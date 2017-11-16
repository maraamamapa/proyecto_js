  <?php ob_start();

echo'  <img src="../../img/entrada.jpg" width="100%"  height="500px">';


 $contenido = ob_get_clean(); ?>

 <?php include 'layout.php' ?>

<?php ob_start();

include"../bd/db.php";
  echo '<center>';
  echo '<img src="../../img/pop.png" alt="POP" style="" width="70" height="70">'."<h4>Elija la categoría de funko pop que sea de su interés:</h4>";
  echo '</center>';

    $demoda= new db();
    if ($demoda->getErrorConexion()==true) {
      echo "No hay conexion";
    }

    else {
        $resultado=$demoda->tipos();
        foreach ($resultado as $fila) {
          echo '<center>';
          echo '<p><a target="_blank" href="galeria.php?tipo='.$fila['tipo'].'">'.$fila['tipo'].'</a></p>';
          echo '<br>';
          echo '</center>';

          }

      }

 $contenido = ob_get_clean(); ?>

 <?php include 'layout.php' ?>

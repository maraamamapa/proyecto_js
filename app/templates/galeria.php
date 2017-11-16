  <?php
  ob_start();

include"../bd/db.php";
    $demoda= new db();
    if ($demoda->getErrorConexion()==true) {
      echo "No hay conexion";
    }
    else {
    echo '<a href="productos.php">Atras</a>';
		$tipo = $_GET['tipo'];
        $resultado=$demoda->getGaleryFromType($tipo);
		echo "<div id=\"galeria\">";
    echo '<h3>'.$tipo.'</h3>';
      foreach ($resultado as $fila):
			    echo "<div id=\"imagen\" >";

				  echo '<img  src="../../images/galeria/'.$tipo.'/'.$fila['imagen'].'" />';
				  echo "<div class=\"nombrePrec\">";
					// echo '<p><a target="_blank" href="../../images/galeria/'.$tipo.'/'.$fila['imagen'].'" >'.$fila['nombre'].'</a></p>';
          echo '<p>Nombre:'.$fila['nombre'].'</p>';
          echo '<p>Precio:'.$fila['precio'].'</p>';
					echo '<p>Descripcion:'.$fila['descripcion'].'</p>';
				  echo "</div>";
			    echo "</div>";
		endforeach;
          echo "</div>";
      }

      $contenido = ob_get_clean(); ?>

      <?php include 'layout.php' ?>

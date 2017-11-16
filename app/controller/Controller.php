 <?php

 class Controller
 {

 		function console_log( $data ){
  echo '<script>';
  echo 'console.log('. json_encode( $data ) .')';
  echo '</script>';
}
 
     public function inicio()
     {
		
	    $m = new Model(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                     Config::$mvc_bd_clave, Config::$mvc_bd_hostname);
	     
		$numero="3"; 
		
		$nuevos=$m->buscarLosMasNuevos($numero);
		$valorados=$m->buscarLosMasValorados($numero);
		
		$arraygenero[]= array("nuevos"=>$nuevos);
		$arraygenero[]= array("valorados"=>$valorados);
		
		$juegos[]=$arraygenero;
		$params = array('juegos'=>$juegos);
		
      require realpath(__DIR__ . '/..'). '/templates/inicio.php';
     }
	 public function pantallaLogin()
     {
       require realpath(__DIR__ . '/..').'/templates/login.php';
     }
	 public function register(){	 
		 $m = new Model(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                     Config::$mvc_bd_clave, Config::$mvc_bd_hostname);
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){ 
		
			$nombre_usuario="";
			$contrasenya="";
			$email="";
			$idsteam="0";
			$privacidad="0";
			if(isset($_POST["nombre_usuario"])){
				$nombre_usuario=$_POST["nombre_usuario"];
			}
			if(isset($_POST["contrasenya"])){
				$contrasenya=$_POST["contrasenya"];
			}
			if(isset($_POST["email"])){
				$email=$_POST["email"];
			}
			
			if(isset($_POST["idsteam"])){
				$idsteam=$_POST["idsteam"];
			}
			
			if(isset($_POST["privacidad"])){
				$privacidad="1";
			}	
			
			if(isset($_POST["privacidad"])){
				$privacidad="1";
			}	
			
			$target_dir = "../uploads/";
			$t=time();
				
			$target_file = $target_dir .$t.basename($_FILES["fileToUpload"]["name"]);
			$uploadOk = 1;
			$register=0;
			$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
			// Check if image file is a actual image or fake image
			if(isset($_POST["submit"])) {
				$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
				if($check !== false) {
				echo '<script language="javascript">alert("File is an image");</script>';
					$uploadOk = 1;
				} else {
				echo '<script language="javascript">alert("File is not an image.");</script>';
					$uploadOk = 0;
				}
			}
			// Check if file already exists
			if (file_exists($target_file)) {
				echo '<script language="javascript">alert("Sorry, file already exists.");</script>';
				$uploadOk = 0;
			}
			// Check file size
			if ($_FILES["fileToUpload"]["size"] > 500000) {
			echo '<script language="javascript">alert("Sorry, your file is too large.");</script>';				
				$uploadOk = 0;
			}
			// Allow certain file formats
			if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
			&& $imageFileType != "gif" ) {
				echo '<script language="javascript">alert("Sorry, only JPG, JPEG, PNG & GIF files are allowed.");</script>'; 
				$uploadOk = 0;
			}
			// Check if $uploadOk is set to 0 by an error
			if ($uploadOk == 0) {
			echo '<script language="javascript">alert("Sorry, your file was not uploaded.");</script>'; 
				
			// if everything is ok, try to upload file
			} else {
				if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {					
					echo '<script language="javascript">alert("El archivo  ha sido subido correctamente");</script>'; 
					$image=$target_file;
					$result=$m->register($nombre_usuario,$contrasenya,$email,$idsteam,$privacidad,$image);	
					if($result==1){	
					$register=1;
					}
				} else {
				echo '<script language="javascript">alert("Sorry, there was an error uploading your file.");</script>'; 					
				}			
	    require realpath(__DIR__ . '/..').'/templates/login.php';
		}
	 }
	}
	   public function login()
     {
         $m = new Model(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                     Config::$mvc_bd_clave, Config::$mvc_bd_hostname);
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST'){ 
		
          if(isset($_POST["username"])&&($_POST["username"])!="" && isset($_POST["password"])&&($_POST["password"])!="") {		  
		  $nameUsuario=$_POST["username"];
     	  $contr=$_POST["password"];		  
		  $params = array('usuarios' => $m->login($nameUsuario,$contr));
		   }	
        }
		
		$idUsuario="";
		foreach ($params['usuarios'] as $usuario):
		if(isset($usuario['Id_Usuario']) && $usuario['Id_Usuario']!=""){
			$idUsuario=$usuario['Id_Usuario'];
			$nombre=$usuario['Nombre'];
			$privacidad=$usuario['Privacidad'];
			$steam=$usuario['Id_Steam'];
			$email=$usuario['Email'];
			$image=$usuario['Foto'];
			$administrador=$usuario['Administrador'];			
		}
		endforeach;
		if($idUsuario!=""){		 
		 $_SESSION["idUsuario"] = $idUsuario;
         $_SESSION["nombre"] = $nombre;
         $_SESSION["Privacidad"] = $privacidad;
         $_SESSION["idsteam"] = $steam;	
		 $_SESSION["email"] = $email;	
		 $_SESSION['Foto']=$image;
		 $_SESSION['administrador']=$administrador;			 
         $this->inicio();
		 }
		 else{
		  $this->pantallaLogin();
		 }
     }	 
	 

     public function buscar()
     {
         $m = new Model(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                     Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

		if ($_SERVER['REQUEST_METHOD'] == 'POST'){ 
          if(isset($_POST["juego"])&&($_POST["juego"])!=""){
		   $juego= $_POST["juego"];
			$params = array('juegos' => $m->buscar($juego));
		   }			   
        } 
         require realpath(__DIR__ . '/..').'/templates/buscar.php';
     }	 
	 
	  public function avanzada()
     {
	   $m = new Model(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                     Config::$mvc_bd_clave, Config::$mvc_bd_hostname);
					 
		$params = array('juegos' =>$m->buscarLosMasValoradosPorGenero("3"));			 
        require realpath(__DIR__ . '/..').'/templates/avanzada.php';
     }
	 
	   public function avanzadaresults()
     {
		 $m = new Model(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                     Config::$mvc_bd_clave, Config::$mvc_bd_hostname);

		 if ($_SERVER['REQUEST_METHOD'] == 'POST'){ 
			$points="1000";
			$letra="";
			$estrellas="0";
	
			if(isset($_POST["points"])&&($_POST["points"])!=""){ 
				$points=strtoupper($_POST["points"]);
			}	
	
			if(isset($_POST["letras"])&&($_POST["letras"])!=""){ 
				$letra=strtoupper($_POST["letras"]);
			}
	
			if(isset($_POST["estrellas"])&&($_POST["estrellas"])!=""){ 
				$estrellas=strtoupper($_POST["estrellas"]);
			}			
         
			$params = array('juegos' => $m->busquedaAvanzada($points,$letra,$estrellas));	   
        } 
        
		require realpath(__DIR__ . '/..').'/templates/buscar.php';
     }

     public function genero()
     {
         $m = new Model(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                     Config::$mvc_bd_clave, Config::$mvc_bd_hostname);
		
		$params = array('generos' => $m->buscarGeneros());      
        
		require realpath(__DIR__ . '/..').'/templates/genero.php';
     }
	 
	   public function generoresults()
     {
         $m = new Model(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,
                     Config::$mvc_bd_clave, Config::$mvc_bd_hostname);
		
		if(isset($_POST["nombreGenero"])&&($_POST["nombreGenero"])!=""){ 
				$nombreGenero=strtoupper($_POST["nombreGenero"]);
				$params = array('juegos' => $m->buscarJuegoPorGenero($nombreGenero));
			}	
		
		  
        
		require realpath(__DIR__ . '/..').'/templates/buscar.php';
     }	 
	
	   public function perfil()
     {
        $m = new Model(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,Config::$mvc_bd_clave, Config::$mvc_bd_hostname);
	     
		$favoritos=$m->buscarFavoritos();
		
		$arrayfavoritos[]= array("Tus_Favoritos"=>$favoritos);
		
		
		$juegos[]=$arrayfavoritos;
		$params = array('juegos'=>$juegos);
		
      require realpath(__DIR__ . '/..'). '/templates/perfil.php';
     }
	 
	 public function removeFavoritos(){
	 
	
	 	if(isset($_POST["IdUsuario"])&&($_POST["IdUsuario"])!=""){ 
				$IdUsuario=strtoupper($_POST["IdUsuario"]);
			
	
		if(isset($_POST["IdGame"])&&($_POST["IdGame"])!=""){ 
				$IdGame=strtoupper($_POST["IdGame"]);		
		
		 $m = new Model(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,Config::$mvc_bd_clave, Config::$mvc_bd_hostname);	
	
	
		$favoritos=$m->removeFavoritos($IdUsuario,$IdGame);
		$this->perfil();
	   }
	   
	   }
	}
	
	 public function detalleJuego(){		
	
		if(isset($_GET["idGame"])&&($_GET["idGame"])!=""){ 
				$IdGame=strtoupper($_GET["idGame"]);	
         }
        else if (isset($idGame)&&($idGame)!=""){		
		$IdGame=strtoupper($idGame);
		}		
		 $m = new Model(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,Config::$mvc_bd_clave, Config::$mvc_bd_hostname);
	
	
		$result=$m->searchGame($IdGame);  		
		$detalleJuego = $result[0];
		$comentarios=$m->searchComents($IdGame);		
		require realpath(__DIR__ . '/..'). '/templates/detalleJuego.php';
	   
	}
	
	
	public function updategame(){
	
		if(isset($_POST["idJuego"])&&($_POST["idJuego"])!=""){ 
				$idGame=$_POST["idJuego"];				
			}
		if(isset($_POST["nombre"])&&($_POST["nombre"])!=""){ 
				$nombre=$_POST["nombre"];				
		}	
		if(isset($_POST["precio"])&&($_POST["precio"])!=""){ 
				$precio=$_POST["precio"];
				
		}
		
		if(isset($_POST["desarrollador"])&&($_POST["desarrollador"])!=""){ 
				$desarrollador=$_POST["desarrollador"];				
		}
		
		if(isset($_POST["propietarios"])&&($_POST["propietarios"])!=""){ 
				$propietarios=$_POST["propietarios"];			
		}	
		
		$m = new Model(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,Config::$mvc_bd_clave, Config::$mvc_bd_hostname);
		
		$result=$m->updategame($idGame,$nombre,$precio,$desarrollador,$propietarios); 
		$_GET["idGame"]=$idGame;
		$this->detalleJuego();
	}
	
	
	public function addcomment(){
	
	if(isset($_SESSION["idUsuario"])&&($_SESSION["idUsuario"])!=""){ 
				$usuario=$_SESSION["idUsuario"];				
		}
	if(isset($_POST["juego"])&&($_POST["juego"])!=""){ 
				$juego=$_POST["juego"];				
	}	
	if(isset($_POST["comentario"])&&($_POST["comentario"])!=""){ 
				$comentario=$_POST["comentario"];				
	}
	
	$m = new Model(Config::$mvc_bd_nombre, Config::$mvc_bd_usuario,Config::$mvc_bd_clave, Config::$mvc_bd_hostname);
		
	$result=$m->addcomment($usuario,$juego,$comentario); 
	
	$_GET["idGame"]=$juego;
	$this->detalleJuego();
	
	}
	
 }
 
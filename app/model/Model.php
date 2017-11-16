<?php
  class Model
 {
     protected $conexion;

     public function __construct($dbname,$dbuser,$dbpass,$dbhost)
     {
       $mvc_bd_conexion = mysql_connect($dbhost, $dbuser, $dbpass);

       if (!$mvc_bd_conexion) {
           die('No ha sido posible realizar la conexión con la base de datos: ' . mysql_error());
       }
       mysql_select_db($dbname, $mvc_bd_conexion);

       mysql_set_charset('utf8');

       $this->conexion = $mvc_bd_conexion;
     }
	 
	   public function login($nameUsuario,$contr)
     {
         $nameUsuario = htmlspecialchars($nameUsuario);
		 $contr = htmlspecialchars($contr);
		 

         $sql = "SELECT * FROM usuario WHERE nombre= '$nameUsuario' AND contrasenya ='$contr'";

         $result = mysql_query($sql, $this->conexion);

         $juegos = array();
         while ($row = mysql_fetch_assoc($result))
         {
             $juegos[] = $row;
         }

         return $juegos;
     }
     
	 public function register($nombre_usuario,$contrasenya,$email,$idsteam,$privacidad,$image){
	 
	 $nombre_usuario = htmlspecialchars($nombre_usuario);
	 $contrasenya = htmlspecialchars($contrasenya);
	 $email = htmlspecialchars($email);
	 $idsteam = htmlspecialchars($idsteam);
	 
	 $sql ="INSERT INTO usuario (Id_Usuario,Nombre,Contrasenya,Email,Id_Steam,Foto,Privacidad,Administrador) values (null,'$nombre_usuario','$contrasenya','$email','$idsteam','$image','$privacidad','0')";
	 
	 $result = mysql_query($sql, $this->conexion)  or die(mysql_error());
	 
	 if (!$result){
		return 0;
	 }
	 else{
		return 1;
	 }
		
	 }

	  public function buscar($nombre)
     {
         $nombre = htmlspecialchars($nombre);

         $sql = "SELECT * FROM juego WHERE UPPER (Nombre) LIKE '%$nombre%'";

         $result = mysql_query($sql, $this->conexion);

         $juegos = array();
         while ($row = mysql_fetch_assoc($result))
         {
             $juegos[] = $row;
         }

         return $juegos;
     }
	 
	 public function busquedaAvanzada($points,$letra,$estrellas)
	 {
	 
		$points = htmlspecialchars($points);
		$letra = htmlspecialchars($letra);
		$estrellas = htmlspecialchars($estrellas);
	     
		$sql = "SELECT * FROM juego WHERE  UPPER(nombre) LIKE '$letra%'  AND precio_original <=$points AND  (Valoracion >= '$estrellas'  or Valoracion is null) ";
		 
		$result = mysql_query($sql, $this->conexion);

        $juegos = array();
         while ($row = mysql_fetch_assoc($result))
         {
             $juegos[] = $row;
         }
		 return $juegos;
	 }
	 
	 
	  public function buscarGeneros()
	 {
	 
			     
		$sql = "SELECT * FROM genero order by Id_Genero";
		 
		$result = mysql_query($sql, $this->conexion);

        $generos = array();
         while ($row = mysql_fetch_assoc($result))
         {
             $generos[] = $row;
         }
		 return $generos;
	 }
	 
	 
    public function buscarJuegoPorGenero($nombre)
     {
	     $nombre = htmlspecialchars($nombre);
         $sql = "SELECT jueg.* FROM juego jueg , genero_del_juego genjuego , genero gen WHERE gen.Nombre='$nombre' and jueg.Id_Juego=genjuego.Id_Juego and gen.Id_Genero=genjuego.Id_Genero";
         
         $result = mysql_query($sql, $this->conexion);

         $juegos = array();
         while ($row = mysql_fetch_assoc($result))
         {
             $juegos[] = $row;
         }

         return $juegos;
     }

	   public function buscarLosMasValoradosPorGenero($numero)
     {
	 
	     $sql="SELECT distinct(gen.Nombre) FROM juego jueg , genero_del_juego genjuego , genero gen WHERE jueg.Id_Juego=genjuego.Id_Juego and gen.Id_Genero=genjuego.Id_Genero";
		 
		 
		 $result = mysql_query($sql, $this->conexion);

         $nombres = array();
         while ($row = mysql_fetch_assoc($result))
         {
             $nombres[] = $row;
         }
		 
		  

		 $juegos = array();
		 foreach ($nombres as $nombre):
		 
		 $nombrestr=$nombre['Nombre'];
		 $sql2 = "SELECT jueg.*,gen.Nombre as generoName FROM juego jueg , genero_del_juego genjuego , genero gen WHERE gen.Nombre='$nombrestr' and jueg.Id_Juego=genjuego.Id_Juego and gen.Id_Genero=genjuego.Id_Genero
	     order by jueg.Valoracion desc LIMIT $numero";
		 
		 $result2 = mysql_query($sql2, $this->conexion);
		 
		$juegosgenero = array();
         while ($row2 = mysql_fetch_assoc($result2))
         {
             $juegosgenero[] = $row2;
         }
		 
		 $arraygenero = array( $nombrestr=>$juegosgenero);
		 $juegos[]=$arraygenero;
		 
		 endforeach;        

         return $juegos;
     }
	 
	 
	 public function buscarLosMasNuevos($numero){
	 
	     
		 $sql = "SELECT jueg.* FROM juego jueg order by jueg.fecha desc LIMIT $numero";
		 
		 $result = mysql_query($sql, $this->conexion);
	
         while ($row = mysql_fetch_assoc($result))
         {
		
             $juegos[] = $row;
         }	
		 
		return $juegos;
	 
	 }
	 
	 

    
	 public function buscarLosMasValorados($numero){
	 
	  $sql = "SELECT jueg.* FROM juego jueg order by jueg.valoracion desc LIMIT $numero";
		 
		 $result = mysql_query($sql, $this->conexion);
		
         while ($row = mysql_fetch_assoc($result))
         {
		 
             $juegos[] = $row;
         }		 
		return $juegos;
	 
	 }
	 
	 public function buscarFavoritos(){
	 
	 $idUsuario= $_SESSION["idUsuario"];
	
	 $sql = "SELECT jueg.* FROM juego jueg , usuario us , favoritos fav where us.Id_Usuario=fav.Id_Usuario and fav.Id_Juego=jueg.Id_Juego and us.Id_Usuario='$idUsuario'";
	 $juegos=array();
	 $result = mysql_query($sql, $this->conexion);
		
         while ($row = mysql_fetch_assoc($result))
         {
		 
             $juegos[] = $row;
         }		 
		return $juegos;	 
	 } 
	 
	 public function removeFavoritos($idUsuario,$idGame){
	 
	 $idUsuario= $_SESSION["idUsuario"];
	
	 $sql = " Delete from favoritos WHERE Id_Usuario='$idUsuario' and Id_Juego='$idGame'";
	 $juegos=array();
	 $result = mysql_query($sql, $this->conexion);
		
         while ($row = mysql_fetch_assoc($result))
         {
		 
             $juegos[] = $row;
         }		 
		return $juegos;	 
	 } 
	 
	  public function searchGame($idGame){
	 
	 $idUsuario= $_SESSION["idUsuario"];
	
	 $sql = " Select * from juego WHERE Id_Juego='$idGame'";
	 $juegos=array();
	 $result = mysql_query($sql, $this->conexion) or die(mysql_error());
		
         while ($row = mysql_fetch_assoc($result))
         {
		 
             $juegos[] = $row;
         }		 
		return $juegos;	 
	 } 
	 
	 public function searchComents($idGame){
	 
	 $idUsuario= $_SESSION["idUsuario"];
	
	 $sql = " Select * from comentarios com , usuario us WHERE com.Id_Usuario=us.Id_Usuario and Id_Juego='$idGame'";
	 $juegos=array();
	 $result = mysql_query($sql, $this->conexion) or die(mysql_error());
		
         while ($row = mysql_fetch_assoc($result))
         {
		 
             $juegos[] = $row;
         }		 
		return $juegos;	 
	 }

	public function updategame($idJuego,$nombre,$precio,$desarrollador,$propietarios){
	
	 $sql ="UPDATE juego SET nombre='$nombre',Precio_Original='$precio' , Desarrollador='$desarrollador' ,Numero_Propietarios='$propietarios' WHERE Id_Juego='$idJuego'";
	 
	 $result = mysql_query($sql, $this->conexion)  or die(mysql_error());
	
	}	
	
	public function addcomment($usuario,$juego,$comentario){
	
	 $sql ="INSERT INTO comentarios (Id_Comentario,Id_Usuario,Id_Juego,Comentario) values (null,'$usuario','$juego','$comentario')";
	 
	 $result = mysql_query($sql, $this->conexion)  or die(mysql_error());
	
	}	

 }
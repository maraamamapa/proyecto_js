<?php

class db{
  private $IP="localhost";
  private $USUARIO="root";
  private $CONTRASEÑA="";
  private $DB="funko";

  private $conexion;
  private $error=false;


  function __construct(){
    $this->conexion = new mysqli($this->IP, $this->USUARIO, $this->CONTRASEÑA, $this->DB);
    if ($this->conexion->connect_errno){
      $this->error=true;
    }
  }
  //funciones
  public function getErrorConexion(){
    return $this->error;
  }
  // public function moda(){
  //   return $this->conexion->query("SELECT descripcion FROM descripcion_tienda ");
  // }
  public function tipos(){
    return $this->conexion->query("SELECT distinct(tipo) FROM tipos_producto ");
  }
  public function todo(){
    return $this->conexion->query("SELECT * FROM item ");
  }

   public function getGaleryFromType($tipo){
    return $this->conexion->query("select it.* from  item it , tipos_producto tip where tip.id=it.tipo and tip.tipo='$tipo'");
  }


 }
 ?>

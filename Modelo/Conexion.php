<?php

/**
 *
 */
class Conexion
{

  public function getConexion(){
    try {
      $user = 'root';
      $pass = 'admin1mysql';
      $host = 'localhost';
      $bd = 'tutorialpdo';
      $conexion = new PDO('mysql:host='.$host . ';dbname=' .$bd ,$user , $pass);
      return $conexion;
    } catch (Exception $e) {
      die($e->getMessage());
    }
  }

}
?>

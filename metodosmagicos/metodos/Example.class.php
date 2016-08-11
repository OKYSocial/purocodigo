<?php

class Product{

  private $_name;
  private $_qty;
  public $instance = 'Propiedad';


  public function __get($property){
    echo $property;
  }
  public function __set($property , $value){
    $property = $value;
  }
}


?>

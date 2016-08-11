<?php

  class Magicos{
    private $campo1, $campo2;
    private $datos = array();

    public function __set($propiedad, $valor){
      if (property_exists(get_class(),$propiedad)) {
        $this->datos[$propiedad] = $valor;
      }
    }

    public function __get($propiedad){
      if (array_key_exists($propiedad,$this->datos)) {
        return $this->datos[$propiedad];
      }
    }

  }

?>

<?php


public function guardar(){
      //Devuelve el array con las columnas
      $values = $this->getColumnas();

      $filtered = null; // una variable que va almacenar las columnas
      foreach ($values as $key => $value) {
          // separa si es id - sino lo agrega al array
          if ($value !== null && !is_integer($key) && $value !== '' && strpos($key, 'obj_') === false && $key !== 'id') {
              if ($value === false) {
                  $value = 0;
              }
              $filtered[$key] = $value;
              //echo $key." - ".$value;
          }
          //echo $key."<br>";
      }
      $columns = array_keys($filtered); // obteniendo las columnas
      //echo json_encode($columns);

      if ($this->id) {
          $params = "";
          foreach($columns as $columna){
              $params .= $columna." = :".$columna.",";
          }
          $params =  trim($params,",");
          $query = "UPDATE " . static ::$table . " SET $params WHERE id =" . $this->id;
          //echo $query;
      } else {
          $params = join(", :", $columns);
          $params = ":".$params;
          $columns = join(", ", $columns);
          $query = "INSERT INTO " . static ::$table . " ($columns) VALUES ($params)";
      }
      //echo $query;
      //preparamos la consulta
      self::getConexion();
      $res = self::$cnx->prepare($query);
      foreach ($filtered as $key => &$val) {//cargamos todos los valores de los parametros
          $res->bindParam(":".$key, $val);
      }
      //realizamos una respuesta
      if($res->execute()){
          $this->id = self::$cnx->lastInsertId();
          self::getDesconectar();
          return true;
      }else{
          return false;
      }
  }

 ?>

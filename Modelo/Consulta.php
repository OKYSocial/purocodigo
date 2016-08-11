<?php

/**
 *
 */
  class Consulta
  {

    public function insertarProducto ($nombre, $descripcion, $categoria, $precio){
      $modelo = New Conexion ();
      $conexion = $modelo->getConexion();
      // Metodo de insercion con procedimientos almacenado,
      $sql = 'CALL insertarProductos(:nombre, :descripcion, :categoria, :precio)';
      // Metodo de Insercion, con sentencia sql;
      // $sql = 'INSERT INTO productos (nombre, descripcion, categoria, precio) values (:nombre, :descripcion, :categoria, :precio)';
      $statement = $conexion->prepare($sql);
      $statement->bindParam(':nombre',$nombre);
      $statement->bindParam(':descripcion',$descripcion);
      $statement->bindParam(':categoria',$categoria);
      $statement->bindParam(':precio',$precio);
      if (!$statement) {
        return 'Error al Crear el Registro';
      }else{
        $statement->execute();
        return 'Registro Creado Correctamente';
      }
    }

    public function cargarProductos(){
      $rows = null;
      $modelo = New Conexion();
      $conexion = $modelo->getConexion() ;
      $sql = 'SELECT * FROM productos';
      $statement =  $conexion->prepare($sql);
      $statement->execute();
      while ($result = $statement->fetch()) {
        $rows[] = $result;
      }
      //var_dump ($rows);
      return $rows;
    }

    public function eliminarProducto($id_producto){
      $modelo = new Conexion();
      $conexion = $modelo->getConexion();
      $sql = 'DELETE FROM productos WHERE id_producto = :id_producto';
      $statement = $conexion->prepare($sql);
      $statement->bindParam(':id_producto', $id_producto);
      if (!$statement) {
        return 'Error al eliminar registrp';
      }else{
        $statement->execute();
        return 'Registro eliminado correctamente';
      }
    }

    public function buscarProductos($_nombre){
        $rows = null;
        $modelo = New Conexion();
        $nombre = '%'.$_nombre.'%';
        $conexion = $modelo->getConexion();
        $sql = 'SELECT * FROM productos WHERE nombre LIKE :nombre';
        $statement =  $conexion->prepare($sql);
        $statement->bindParam(':nombre',$nombre);
        $statement->execute();
        while ($result = $statement->fetch()) {
          $rows[] = $result;
        }
        //var_dump ($rows);
        return $rows;
    }

    public function filtrarProductoID($id){
      $rows = null;
      $modelo = New Conexion();
      $conexion = $modelo->getConexion();
      $sql = 'SELECT * FROM productos WHERE id_producto = :id';
      $statement =  $conexion->prepare($sql);
      $statement->bindParam(':id',$id);
      $statement->execute();
      while ($result = $statement->fetch()) {
        $rows[] = $result;
      }
      //var_dump ($rows);
      return $rows;
    }

    public function modificarProducto($campo, $valor, $id){
      $rows = null;
      $modelo = New Conexion();
      $conexion = $modelo->getConexion();
      $sql = "UPDATE productos SET $campo = :valor WHERE id_producto = :id";
      $statement = $conexion->prepare($sql);
      $statement->bindParam(':valor',$valor);
      $statement->bindParam(':id',$id);
      if (!$statement) {
        return 'Error al modificar el producto';
      }else{
      $statement->execute();
      return 'Registro Modificado Correctamente';
      }
    }



  }
?>

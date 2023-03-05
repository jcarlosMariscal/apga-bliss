<?php
  require ("../config/Connection.php");
  session_start(); 
  class Update{
    public $cnx;
    function __construct(){
      $this -> cnx = Connection::connectDB();
    }
    function agregarTotalIngreso($total, $id_espacio){
      try {
        $sql = "INSERT INTO total_ingreso(descripcion, total, id_espacio) VALUES (?,?,?)";
        $desc = "Total acumulado de ingresos de un espacio";
        $query = $this->cnx->prepare($sql);
        $data = array($desc,$total,$id_espacio);
        $query -> execute($data);
        if($query){
          return true;
        }else {
          return false;
        }
      } catch (PDOException $th) {
        return false;
      }
    }
    // ---------- AGREGAR INGRESO ---------------
    function editarIngreso($cantidad, $categoria, $fecha, $tipo, $descripcion, $espacio, $id_ingreso) {
      try {
        $sql = "UPDATE ingreso SET cantidad = ?, descripcion = ?, fecha = ?, id_espacio = ?, id_cIngreso = ?, id_tipoIngreso = ? WHERE id_ingreso = ?";
        $query = $this->cnx->prepare($sql);
        $data = array($cantidad,$descripcion,$fecha, $espacio, $categoria, $tipo, $id_ingreso);
        $query -> execute($data);
        if($query){
            $json = '{"status": "success","message": "El ingreso se ha modificado","data": false}';
          echo $json;
        }else {
          $json = '{"status": "error","message": "No se ha podido modificar el ingreso.","data": false}';
          echo $json;
        }
      } catch (PDOException $th) {
        $json = '{"status": "err","message": "No se ha podido actualizar el ingreso","data": false}';
          echo $json;
      }
    }
    function editarGasto($cantidad, $categoria, $fecha, $espacio, $id_gasto) {
      try {
        $sql = "UPDATE gasto SET cantidad = ?, fecha = ?, id_espacio = ?, id_cGasto = ? WHERE id_gasto = ?";
        $query = $this->cnx->prepare($sql);
        $data = array($cantidad,$fecha, $espacio, $categoria, $id_gasto);
        $query -> execute($data);
        if($query){
            $json = '{"status": "success","message": "El gasto se ha modificado","data": false}';
          echo $json;
        }else {
          $json = '{"status": "error","message": "No se ha podido modificar el ingreso.","data": false}';
          echo $json;
        }
      } catch (PDOException $th) {
        $json = '{"status": "err","message": "No se ha podido actualizar el ingreso","data": false}';
          echo $json;
      }
    }
    // ---------- AGREGAR INGRESO ---------------
    // ---------- ACTUALIZAR CATEGORIA PARA INGRESOS ---------------
    function editarCatIng($nombre, $descripcion,$icono, $color,$id) {
      try {
        $sql = "UPDATE categoria_ingreso SET nombre = ?, descripcion = ?, icono = ?, color = ? WHERE id_cIngreso = ?";
        $query = $this->cnx->prepare($sql);
        $data = array($nombre, $descripcion, $icono,$color,$id);
        $query -> execute($data);
        if($query){
          $json = '{"status": "success","message": "La categoria se ha actualizado","data": false}';
          echo $json;
        }else {
          $json = '{"status": "error","message": "No se ha podido actualizar la categoria.","data": false}';
          echo $json;
        }
      } catch (PDOException $th) {
        $json = '{"status": "err","message": "No se ha podido registrar la categoria Exception. '.$nombre.','.$descripcion.','.$color.','.$icono.'","data": false}';
          echo $json;
      }
    }
    // ---------- ACTUALIZAR CATEGORIA PARA GASTOS ---------------
    function editarCatGas($nombre, $descripcion,$icono, $color,$id) {
      try {
        $sql = "UPDATE categoria_gasto SET nombre = ?, descripcion = ?, icono = ?, color = ? WHERE id_cGasto = ?";
        $query = $this->cnx->prepare($sql);
        $data = array($nombre, $descripcion, $icono,$color,$id);
        $query -> execute($data);
        if($query){
          $json = '{"status": "success","message": "La categoria se ha actualizado","data": false}';
          echo $json;
        }else {
          $json = '{"status": "error","message": "No se ha podido actualizar la categoria.","data": false}';
          echo $json;
        }
      } catch (PDOException $th) {
        $json = '{"status": "err","message": "No se ha podido registrar la categoria Exception. '.$nombre.','.$descripcion.','.$color.','.$icono.'","data": false}';
          echo $json;
      }
    }
  }
  ?>
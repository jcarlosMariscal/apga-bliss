<?php
  require ("../config/Connection.php");
  session_start(); 
  class Create{
    public $cnx;
    function __construct(){
      $this -> cnx = Connection::connectDB();
    }
    function verificarTotalIngreso($id_espacio){
      try {
        $sql = "SELECT total FROM total_ingreso WHERE id_espacio = ?";
        $query = $this->cnx->prepare($sql);
        $query -> bindParam(1, $id_espacio);
        $query -> execute();
        $total = $query->rowCount();
        if($total > 0){
          $total = $query->fetch()['total'];
          return [true, $total];
        }else{
          return [false,0];
        }
      } catch (PDOException $th) {
        return false;
      }
    }
    function verificarTotalGasto($id_espacio){
      try {
        $sql = "SELECT total FROM total_gasto WHERE id_espacio = ?";
        $query = $this->cnx->prepare($sql);
        $query -> bindParam(1, $id_espacio);
        $query -> execute();
        $total = $query->rowCount();
        if($total > 0){
          $total = $query->fetch()['total'];
          return [true, $total];
        }else{
          return [false,0];
        }
      } catch (PDOException $th) {
        return false;
      }
    }
    function agregarTotalIngreso($total, $id_espacio){
      try {
        $verificarEspacio = $this->verificarTotalIngreso($id_espacio);
        if($verificarEspacio[0]){
          $sumaTotal = $total + $verificarEspacio[1];
          $sql = "UPDATE total_ingreso SET total = ? WHERE id_espacio = ?";
          $query = $this->cnx->prepare($sql);
          $data = array($sumaTotal,$id_espacio);
          $query -> execute($data);
          if(!$query) return false;
          return true;
        }
        if(!$verificarEspacio[0]){
          $sql = "INSERT INTO total_ingreso(descripcion, total, id_espacio) VALUES (?,?,?)";
          $desc = "Total acumulado de ingresos de un espacio";
          $query = $this->cnx->prepare($sql);
          $data = array($desc,$total,$id_espacio);
          $query -> execute($data);
          if(!$query) return false;
          return true;
        }
      } catch (PDOException $th) {
        return false;
      }
    }
    function agregarTotalGasto($total, $id_espacio){
      try {
        $verificarEspacio = $this->verificarTotalGasto($id_espacio);
        if($verificarEspacio[0]){
          $sumaTotal = $total + $verificarEspacio[1];
          $sql = "UPDATE total_gasto SET total = ? WHERE id_espacio = ?";
          $query = $this->cnx->prepare($sql);
          $data = array($sumaTotal,$id_espacio);
          $query -> execute($data);
          if(!$query) return false;
          return true;
        }
        if(!$verificarEspacio[0]){
          $sql = "INSERT INTO total_gasto(descripcion, total, id_espacio) VALUES (?,?,?)";
          $desc = "Total de gastos de un espacio";
          $query = $this->cnx->prepare($sql);
          $data = array($desc,$total,$id_espacio);
          $query -> execute($data);
          if(!$query) return false;
          return true;
        }
      } catch (PDOException $th) {
        return false;
      }
    }
    // ---------- AGREGAR INGRESO ---------------
    function agregarIngreso($cantidad, $categoria, $fecha, $tipo, $descripcion, $espacio) {
      try {
        $sql = "INSERT INTO ingreso(cantidad, descripcion, fecha, id_espacio, id_cIngreso, id_tipoIngreso) VALUES (?,?,?,?,?,?)";
        $query = $this->cnx->prepare($sql);
        $data = array($cantidad,$descripcion,$fecha, $espacio, $categoria, $tipo);
        $query -> execute($data);
        if($query){
          $ad = $this->agregarTotalIngreso($cantidad,$espacio);
          if($ad){
            $json = '{"status": "success","message": "El ingreso se ha registrado","data": false}';
          }
          echo $json;
        }else {
          $json = '{"status": "error","message": "No se ha podido registrar el ingreso.","data": false}';
          echo $json;
        }
      } catch (PDOException $th) {
        $json = '{"status": "err","message": "No se ha podido registrar el ingreso PDO '.$cantidad.','.$categoria.','.$fecha.','.$tipo.','.$descripcion.','.$espacio.',","data": false}';
          echo $json;
      }
    }
    // ---------- AGREGAR GASTO ---------------
    function agregarGasto($cantidad, $categoria, $fecha, $espacio) {
      try {
        $sql = "INSERT INTO gasto(cantidad, fecha, id_espacio, id_cGasto) VALUES (?,?,?,?)";
        $query = $this->cnx->prepare($sql);
        $data = array($cantidad,$fecha,$espacio, $categoria);
        $query -> execute($data);
        if($query){
          $ad = $this->agregarTotalGasto($cantidad,$espacio);
          if($ad){
            $json = '{"status": "success","message": "El gasto se ha registrado","data": false}';
          }
          echo $json;
        }else {
          $json = '{"status": "error","message": "No se ha podido registrar el gasto.","data": false}';
          echo $json;
        }
      } catch (PDOException $th) {
        $json = '{"status": "err","message": "No se ha podido registrar el ingreso PDO '.$cantidad.','.$categoria.','.$fecha.','.$tipo.','.$descripcion.','.$espacio.',","data": false}';
          echo $json;
      }
    }
        // ---------- AGREGAR CATEGORIA PARA INGRESOS ---------------
    function agregarCatIng($nombre, $descripcion,$icono, $color) {
      try {
        $sql = "INSERT INTO categoria_ingreso(nombre, descripcion, icono, color) VALUES (?,?,?,?)";
        $query = $this->cnx->prepare($sql);
        $data = array($nombre, $descripcion, $icono,$color);
        $query -> execute($data);
        if($query){
          $json = '{"status": "success","message": "La categoria se ha registrado","data": false}';
          echo $json;
        }else {
          $json = '{"status": "error","message": "No se ha podido registrar la categoria.","data": false}';
          echo $json;
        }
      } catch (PDOException $th) {
        $json = '{"status": "err","message": "No se ha podido registrar la categoria Exception. '.$nombre.','.$descripcion.','.$color.','.$icono.'","data": false}';
          echo $json;
      }
    }
    // ---------- AGREGAR CATEGORIA PARA GASTOS ---------------
    function agregarCatGas($nombre, $descripcion,$icono, $color) {
      try {
        $sql = "INSERT INTO categoria_gasto(nombre, descripcion, icono, color) VALUES (?,?,?,?)";
        $query = $this->cnx->prepare($sql);
        $data = array($nombre, $descripcion, $icono,$color);
        $query -> execute($data);
        if($query){
          $json = '{"status": "success","message": "La categoria se ha registrado","data": false}';
          echo $json;
        }else {
          $json = '{"status": "error","message": "No se ha podido registrar la categoria.","data": false}';
          echo $json;
        }
      } catch (PDOException $th) {
        $json = '{"status": "err","message": "No se ha podido registrar la categoria Exception. '.$nombre.','.$descripcion.','.$color.','.$icono.'","data": false}';
          echo $json;
      }
    }
  }
  ?>
<?php
  require ("../config/Connection.php");
  session_start(); 
  class Read{
    public $cnx;
    function __construct(){
      $this -> cnx = Connection::connectDB();
    }
    // ---------- OBTENER DATOS DEL USUARIO AL INICIAR SESIÓN ---------------
    function obtenerDatos($token){
      try {
        $sql = "SELECT id_usuario,nombre,apellidos,email,picture FROM usuario WHERE token = ?";
        $query = $this->cnx->prepare($sql);
        $query -> bindParam(1, $token);
        $query -> execute();
        if($query){
          $res = $query->fetch();
          $json = '{
            "status": "success",
            "message": "Datos obtenidos",
            "result": {
              "id_usuario": "'.$res['id_usuario'].'",
              "nombre": "'.$res['nombre'].'",
              "apellidos": "'.$res['apellidos'].'",
              "email": "'.$res['email'].'",
              "picture": "'.$res['picture'].'"
            }
          }';
          echo $json;
        }else {
          $json = '{
            "status": "error",
            "message": "No se ha podido obtener los datos del usuario","result": false}';
          echo $json;
        }
      } catch (PDOException $th) {
        $json = '{"status": "err","message": "Ha ocurrido un error al intentar cargar los datos del usuario","result": false}';
          echo $json;
      }
    }
    // ---------- OBTENER DATOS DEL USUARIO AL INICIAR SESIÓN ---------------
    // ---------- OBTENER DATOS DE ESPACIOS DE UN USUARIO ---------------
    function obtenerEspacios($token){
      try {
        $espacios=array();
        $sql = "SELECT A.id_espacio, A.alias,A.detalles,A.activo,A.fecha, C.nombre, C.descripcion FROM espacio A INNER JOIN usuario B ON A.id_usuario = B.id_usuario INNER JOIN tipo_espacio C ON A.id_tipoEspacio = C.id_tipoEspacio WHERE B.token= ?";
        $query = $this->cnx->prepare($sql);
        $query -> bindParam(1, $token);
        $query -> execute();
        if($query){
          $result = $query->fetchAll(PDO::FETCH_ASSOC);
          if ($result) {
              $json = json_encode(
                array('status' => 'success','message' => 'Datos obtenidos','result' => $result)
              );
          } else {
              $json = json_encode(
                array('status' => 'error','message' => 'No se encontraron datos', 'result' => false
              ));
          }
          header('Content-Type: application/json');
          echo $json;
        }else {
          $json = '{
            "status": "error",
            "message": "No se ha podido obtener los datos de los espacios",
            "result": false}';
          echo $json;
        }
      } catch (PDOException $th) {
        $json = '{"status": "err","message": "Ha ocurrido un error al intentar obtener la información de espacios","result": false}';
          echo $json;
      }
    }
    // ---------- OBTENER DATOS DE ESPACIOS DE UN USUARIO ---------------
    // ---------- OBTENER DATOS DE ESPACIOS DE UN USUARIO ---------------
    function obtenerIngresos($espacio){
      try {
        $sql = "SELECT A.id_ingreso, A.cantidad, A.descripcion, A.fecha, B.nombre,B.icono,B.color FROM ingreso A INNER JOIN categoria_ingreso B ON A.id_cIngreso = B.id_cIngreso INNER JOIN espacio C ON A.id_espacio = C.id_espacio INNER JOIN tipo_espacio D ON C.id_tipoEspacio = D.id_tipoEspacio WHERE LOWER(D.nombre) = LOWER(?)";
        $query = $this->cnx->prepare($sql);
        $query -> bindParam(1, $espacio);
        $query -> execute();
        if ($query) {
          $result = $query->fetchAll(PDO::FETCH_ASSOC);
          if ($result) {
            $ingresos_obj = array();
            foreach ($result as $row) {
              $ingreso = array(
                'fecha' => $row['fecha'],
                'descripcion' => $row['descripcion'],
                'cantidad' => $row['cantidad'],
                'categoria' => '<div class="d-flex align-items-center justify-content-center" style="width:35px; height:35px; background:'.$row["color"].';border-radius:50%; color:#fff;" title="'.$row['nombre'].'">'.$row['icono'].'</div>',
                'editar' => '<button type="button" name="editar" eId="'.$row["id_ingreso"].'" class="btn btn-success editar"><i class="bx bx-edit-alt"></i></a>',
                'eliminar' => '<button type="button" name="eliminar" dId=""'.$row["id_ingreso"].'"" class="btn btn-danger editar"><i class="bx bx-trash"></i></a>'
              );
              $ingresos_obj[] = $ingreso;
            }
            $json = json_encode(
              array('status' => 'success', 'message' => 'Datos obtenidos', 'where' => $espacio, 'result' => $ingresos_obj)
            );
          } else {
            $json = json_encode(
              array('status' => 'error', 'message' => 'No se encontraron datos ingresos', 'where' => $espacio, 'result' => false)
            );
          }
          header('Content-Type: application/json');
          echo $json;
      } else {
          $json = '{
              "status": "error",
              "message": "No se ha podido obtener los datos de los espacios",
              "result": false
          }';
          echo $json;
      }

      } catch (PDOException $th) {
        $json = '{"status": "err","message": "Ha ocurrido un error al intentar obtener la información de espacios","result": false}';
          echo $json;
      }
    }
    // ---------- OBTENER DATOS DE ESPACIOS DE UN USUARIO ---------------
    // ---------- OBTENER LAS CATEGORIAS DE UN INGRESO ---------------
    function categoriaIngresos(){
      try {
        // $ingresos=array();
        $sql = "SELECT id_cIngreso, nombre FROM categoria_ingreso";
        $query = $this->cnx->prepare($sql);
        $query -> execute();
        if($query){
          $result = $query->fetchAll(PDO::FETCH_ASSOC);
          if ($result) {
            $json = json_encode(array('status' => 'success','message' => 'Datos obtenidos','result' => $result));
          } else {
            $json = json_encode(array('status' => 'error','message' => 'No se encontraron datos', 'result' => false));
          }
          header('Content-Type: application/json');
          echo $json;
        }else {
          $json = '{"status": "error","message": "No se ha podido obtener los datos de los espacios","result": false}';
          echo $json;
        }
      } catch (PDOException $th) {
        $json = '{"status": "err","message": "Ha ocurrido un error al intentar obtener la información de categorias","result": false}';
          echo $json;
      }
    }
    function categoriaIngresosMostrar(){
      try {
        // $ingresos=array();
        $sql = "SELECT * FROM categoria_ingreso";
        $query = $this->cnx->prepare($sql);
        $query -> execute();
        if($query){
          $result = $query->fetchAll(PDO::FETCH_ASSOC);
          $ingresos_obj = array();
          if ($result) {
            foreach ($result as $row) {
              $ingreso = array(
                'nombre' => $row['nombre'],
                'descripcion' => $row['descripcion'],
                'icono' => $row['icono'],
                'color' => "<div style='width:20px; height:20px;border-radius:50%;background:".$row['color'].";'></div>",
                'editar' => '<button type="button" name="editarCategoriaIngreso" editIdIngreso="'.$row["id_cIngreso"].'" class="btn btn-primary editarCategoriaIngreso"><i class="bx bx-edit-alt"></i></a>',
                'archivar' => '<button type="button" name="deleteCategoriaIngreso" deleteIdIngreso=""'.$row["id_cIngreso"].'"" class="btn btn-danger deleteCategoriaIngreso"><i class="bx bx-archive"></i></a>'
              );
              $ingresos_obj[] = $ingreso;
            }
            $json = json_encode(
              array('status' => 'success', 'message' => 'Datos obtenidos', 'result' => $ingresos_obj)
            );
          } else {
            $json = json_encode(array('status' => 'error','message' => 'No se encontraron datos', 'result' => false));
          }
          header('Content-Type: application/json');
          echo $json;
        }else {
          $json = '{"status": "error","message": "No se ha podido obtener los datos de los espacios","result": false}';
          echo $json;
        }
      } catch (PDOException $th) {
        $json = '{"status": "err","message": "Ha ocurrido un error al intentar obtener la información de categorias","result": false}';
          echo $json;
      }
    }
    function categoriaGastosMostrar(){
      try {
        // $ingresos=array();
        $sql = "SELECT * FROM categoria_gasto";
        $query = $this->cnx->prepare($sql);
        $query -> execute();
        if($query){
          $result = $query->fetchAll(PDO::FETCH_ASSOC);
          $gastos_obj = array();
          if ($result) {
            foreach ($result as $row) {
              $ingreso = array(
                'nombre' => $row['nombre'],
                'descripcion' => $row['descripcion'],
                'icono' => $row['icono'],
                'color' => "<div style='width:20px; height:20px;border-radius:50%;background:".$row['color'].";'></div>",
                'editar' => '<button type="button" name="editarCategoriaGasto" editIdGasto="'.$row["id_cGasto"].'" class="btn btn-primary editarCategoriaGasto"><i class="bx bx-edit-alt"></i></a>',
                'archivar' => '<button type="button" name="deleteCategoriaGasto" deleteIdGasto=""'.$row["id_cGasto"].'"" class="btn btn-danger deleteCategoriaGasto"><i class="bx bx-archive"></i></a>'
              );
              $gastos_obj[] = $ingreso;
            }
            $json = json_encode(
              array('status' => 'success', 'message' => 'Datos obtenidos', 'result' => $gastos_obj)
            );
          } else {
            $json = json_encode(array('status' => 'error','message' => 'No se encontraron datos', 'result' => false));
          }
          header('Content-Type: application/json');
          echo $json;
        }else {
          $json = '{"status": "error","message": "No se ha podido obtener los datos de los espacios","result": false}';
          echo $json;
        }
      } catch (PDOException $th) {
        $json = '{"status": "err","message": "Ha ocurrido un error al intentar obtener la información de categorias","result": false}';
          echo $json;
      }
    }
    function tiposIngresosMostrar(){
      try {
        // $ingresos=array();
        $sql = "SELECT * FROM tipo_ingreso";
        $query = $this->cnx->prepare($sql);
        $query -> execute();
        if($query){
          $result = $query->fetchAll(PDO::FETCH_ASSOC);
          $ingresos_obj = array();
          if ($result) {
            foreach ($result as $row) {
              $color = sprintf('#%06X', mt_rand(0, 0xFFFFFF));
              $ingreso = array(
                'nombre' => $row['nombre'],
                'descripcion' => "Texto estático para descripción.",
                'color' => "<div style='width:20px; height:20px;border-radius:50%;background:".$color.";'></div>",
                'editar' => '<button type="button" name="editar" eId="'.$row["id_tipoIngreso"].'" class="btn btn-primary editar" disabled><i class="bx bx-edit-alt"></i></a>',
                'archivar' => '<button type="button" name="archivar" dId=""'.$row["id_tipoIngreso"].'"" class="btn btn-danger archivar" disabled><i class="bx bx-archive"></i></a>'
              );
              $ingresos_obj[] = $ingreso;
            }
            $json = json_encode(
              array('status' => 'success', 'message' => 'Datos obtenidos', 'result' => $ingresos_obj)
            );
          } else {
            $json = json_encode(array('status' => 'error','message' => 'No se encontraron datos', 'result' => false));
          }
          header('Content-Type: application/json');
          echo $json;
        }else {
          $json = '{"status": "error","message": "No se ha podido obtener los datos de los espacios","result": false}';
          echo $json;
        }
      } catch (PDOException $th) {
        $json = '{"status": "err","message": "Ha ocurrido un error al intentar obtener la información de categorias","result": false}';
          echo $json;
      }
    }
    // ---------- OBTENER LAS CATEGORIAS DE UN INGRESO ---------------
    // ---------- OBTENER LAS ESPACIOS ---------------
    function espacioIngresos(){
      try {
        $sql = "SELECT id_tipoEspacio, nombre FROM tipo_espacio";
        $query = $this->cnx->prepare($sql);
        $query -> execute();
        if($query){
          $result = $query->fetchAll(PDO::FETCH_ASSOC);
          if ($result) {
            $json = json_encode(array('status' => 'success','message' => 'Datos obtenidos','result' => $result));
          } else {
            $json = json_encode(array('status' => 'error','message' => 'No se encontraron datos', 'result' => false));
          }
          header('Content-Type: application/json');
          echo $json;
        }else {
          $json = '{"status": "error","message": "No se ha podido obtener los datos de los espacios","result": false}';
          echo $json;
        }
      } catch (PDOException $th) {
        $json = '{"status": "err","message": "Ha ocurrido un error al intentar obtener la información de categorias","result": false}';
          echo $json;
      }
    }
    // ---------- OBTENER LAS ESPACIOS  ---------------
    // ---------- OBTENER LAS CATEGORIAS DE INGRESOS ---------------
    function categoriaIngresosForm(){
      try {
        $sql = "SELECT id_cIngreso, nombre FROM categoria_ingreso";
        $query = $this->cnx->prepare($sql);
        $query -> execute();
        if($query){
          $result = $query->fetchAll(PDO::FETCH_ASSOC);
          if ($result) {
            $json = json_encode(array('status' => 'success','message' => 'Datos obtenidos','result' => $result));
          } else {
            $json = json_encode(array('status' => 'error','message' => 'No se encontraron datos', 'result' => false));
          }
          header('Content-Type: application/json');
          echo $json;
        }else {
          $json = '{"status": "error","message": "No se ha podido obtener los datos de los espacios","result": false}';
          echo $json;
        }
      } catch (PDOException $th) {
        $json = '{"status": "err","message": "Ha ocurrido un error al intentar obtener la información de categorias","result": false}';
          echo $json;
      }
    }
    // ---------- OBTENER LAS CATEGORIAS DE INGRESOS ---------------
    function categoriaGastosForm(){
      try {
        $sql = "SELECT id_cGasto, nombre FROM categoria_gasto";
        $query = $this->cnx->prepare($sql);
        $query -> execute();
        if($query){
          $result = $query->fetchAll(PDO::FETCH_ASSOC);
          if ($result) {
            $json = json_encode(array('status' => 'success','message' => 'Datos obtenidos','result' => $result));
          } else {
            $json = json_encode(array('status' => 'error','message' => 'No se encontraron datos', 'result' => false));
          }
          header('Content-Type: application/json');
          echo $json;
        }else {
          $json = '{"status": "error","message": "No se ha podido obtener los datos de los espacios","result": false}';
          echo $json;
        }
      } catch (PDOException $th) {
        $json = '{"status": "err","message": "Ha ocurrido un error al intentar obtener la información de categorias","result": false}';
          echo $json;
      }
    }
    // ---------- OBTENER LAS CATEGORIAS DE INGRESOS  ---------------
     // ---------- OBTENER DATOS DEL INGRESO A EDITAR ---------------
    function getIngresoEditar($id){
      try {
        $sql = "SELECT * FROM ingreso WHERE id_ingreso = ?";
        $query = $this->cnx->prepare($sql);
        $query -> bindParam(1, $id);
        $query -> execute();
        if($query){
          $res = $query->fetch();
          $json = '{
            "status": "success",
            "message": "Datos obtenidos",
            "result": {
              "id_ingreso": "'.$res['id_ingreso'].'",
              "cantidad": "'.$res['cantidad'].'",
              "descripcion": "'.$res['descripcion'].'",
              "fecha": "'.$res['fecha'].'",
              "id_espacio": "'.$res['id_espacio'].'",
              "id_cIngreso": "'.$res['id_cIngreso'].'",
              "id_tipoIngreso": "'.$res['id_tipoIngreso'].'"
            }
          }';
          echo $json;
        }else {
          $json = '{
            "status": "error",
            "message": "No se ha podido obtener los datos del usuario","result": false}';
          echo $json;
        }
      } catch (PDOException $th) {
        $json = '{"status": "err","message": "Ha ocurrido un error al intentar cargar los datos del usuario","result": false}';
          echo $json;
      }
    }
    function getGastoEditar($id){
      try {
        $sql = "SELECT * FROM gasto WHERE id_gasto = ?";
        $query = $this->cnx->prepare($sql);
        $query -> bindParam(1, $id);
        $query -> execute();
        if($query){
          $res = $query->fetch();
          $json = '{
            "status": "success",
            "message": "Datos obtenidos",
            "result": {
              "id_gasto": "'.$res['id_gasto'].'",
              "cantidad": "'.$res['cantidad'].'",
              "fecha": "'.$res['fecha'].'",
              "id_espacio": "'.$res['id_espacio'].'",
              "id_cGasto": "'.$res['id_cGasto'].'"
            }
          }';
          echo $json;
        }else {
          $json = '{
            "status": "error",
            "message": "No se ha podido obtener los datos del usuario","result": false}';
          echo $json;
        }
      } catch (PDOException $th) {
        $json = '{"status": "err","message": "Ha ocurrido un error al intentar cargar los datos del usuario","result": false}';
          echo $json;
      }
    }
    // ---------- OBTENER DATOS DEL INGRESO A EDITAR ---------------
     // ---------- OBTENER DATOS DEL CATEGORIA INGRESO A EDITAR ---------------
    function getCatIngEdit($id){
      try {
        $sql = "SELECT * FROM categoria_ingreso WHERE id_cIngreso = ?";
        $query = $this->cnx->prepare($sql);
        $query -> bindParam(1, $id);
        $query -> execute();
        if($query){
          $res = $query->fetch();
          $icono = str_replace('"', '\\"', $res['icono']);
          $json = '{
              "status": "success",
              "message": "Datos obtenidos",
              "result": {
                  "id_cIngreso": "'.$res['id_cIngreso'].'",
                  "nombre": "'.$res['nombre'].'",
                  "descripcion": "'.$res['descripcion'].'",
                  "icono": "'.$icono.'",
                  "color": "'.$res['color'].'"
              }
          }';
          echo $json;
        }else {
          $json = '{
            "status": "error",
            "message": "No se ha podido obtener los datos de la categoria","result": false}';
          echo $json;
        }
      } catch (PDOException $th) {
        $json = '{"status": "err","message": "Ha ocurrido un error al intentar cargar los datos de la categoria","result": false}';
          echo $json;
      }
    }
    // ---------- OBTENER DATOS DEL CATEGORIA INGRESO A EDITAR ---------------
     // ---------- OBTENER DATOS DEL CATEGORIA GASTO A EDITAR ---------------
    function getCatGasEdit($id){
      try {
        $sql = "SELECT * FROM categoria_gasto WHERE id_cGasto = ?";
        $query = $this->cnx->prepare($sql);
        $query -> bindParam(1, $id);
        $query -> execute();
        if($query){
          $res = $query->fetch();
          $icono = str_replace('"', '\\"', $res['icono']);
          $json = '{
              "status": "success",
              "message": "Datos obtenidos",
              "result": {
                  "id_cGasto": "'.$res['id_cGasto'].'",
                  "nombre": "'.$res['nombre'].'",
                  "descripcion": "'.$res['descripcion'].'",
                  "icono": "'.$icono.'",
                  "color": "'.$res['color'].'"
              }
          }';
          echo $json;
        }else {
          $json = '{
            "status": "error",
            "message": "No se ha podido obtener los datos de la categoria","result": false}';
          echo $json;
        }
      } catch (PDOException $th) {
        $json = '{"status": "err","message": "Ha ocurrido un error al intentar cargar los datos de la categoria","result": false}';
          echo $json;
      }
    }
    // ---------- OBTENER DATOS DEL CATEGORIA GASTO A EDITAR ---------------

        // ---------- OBTENER DATOS DE ESPACIOS DE UN USUARIO ---------------
    function obtenerGastos($espacio){
      try {
        $sql = "SELECT A.id_gasto, A.cantidad, A.fecha, B.alias, C.nombre, C.icono, C.color FROM gasto A INNER JOIN espacio B ON A.id_espacio = B.id_espacio INNER JOIN categoria_gasto C ON A.id_cGasto = C.id_cGasto INNER JOIN tipo_espacio D ON B.id_tipoEspacio = D.id_tipoEspacio WHERE D.nombre = ?";
        $query = $this->cnx->prepare($sql);
        $query -> bindParam(1, $espacio);
        $query -> execute();
        if ($query) {
          $result = $query->fetchAll(PDO::FETCH_ASSOC);
          if ($result) {
            $gastos_obj = array();
            foreach ($result as $row) {
              $ingreso = array(
                'fecha' => $row['fecha'],
                'cantidad' => $row['cantidad'],
                'espacio' => $row['alias'],
                'categoria' =>'<div class="d-flex align-items-center justify-content-center" style="width:35px; height:35px; background:'.$row["color"].';border-radius:50%; color:#fff;" title="'.$row['nombre'].'">'.$row['icono'].'</div>',
                'editar' => '<button type="button" name="editar" eId="'.$row["id_gasto"].'" class="btn btn-warning editar"><i class="bx bx-edit-alt"></i></a>',
                'eliminar' => '<button type="button" name="eliminar" dId=""'.$row["id_gasto"].'"" class="btn btn-danger editar"><i class="bx bx-trash"></i></a>'
              );
              $gastos_obj[] = $ingreso;
            }
            $json = json_encode(
              array('status' => 'success', 'message' => 'Datos obtenidos', 'where' => $espacio, 'result' => $gastos_obj)
            );
          } else {
            $json = json_encode(
              array('status' => 'error', 'message' => 'No se encontraron datos ingresos', 'where' => $espacio, 'result' => false)
            );
          }
          header('Content-Type: application/json');
          echo $json;
      } else {
          $json = '{
              "status": "error",
              "message": "No se ha podido obtener los datos de los espacios",
              "result": false
          }';
          echo $json;
      }

      } catch (PDOException $th) {
        $json = '{"status": "err","message": "Ha ocurrido un error al intentar obtener la información de espacios","result": false}';
          echo $json;
      }
    }
    // ---------- OBTENER DATOS DE ESPACIOS DE UN USUARIO ---------------
  }
  ?>
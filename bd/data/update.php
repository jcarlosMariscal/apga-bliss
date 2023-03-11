<?php
require ("../class/Update.php"); // LLAMAMOS A LA CLASE
$query = new Update();
$action = (isset($_POST['action']) ? $_POST['action'] : NULL); 
if(!empty($_POST)){
  switch ($action) {
    case 'editarIngreso':
      $cantidad = (isset($_POST['cantidad']) ? $_POST['cantidad'] : NULL); 
      $categoria = (isset($_POST['categoria']) ? $_POST['categoria'] : NULL); 
      $fecha = (isset($_POST['fecha']) ? $_POST['fecha'] : NULL); 
      $tipo = (isset($_POST['tipo']) ? $_POST['tipo'] : NULL); 
      $descripcion = (isset($_POST['descripcion']) ? $_POST['descripcion'] : NULL); 
      $espacio = (isset($_POST['espacio']) ? $_POST['espacio'] : NULL);
      $id_ingreso = (isset($_POST['id_ingreso']) ? $_POST['id_ingreso'] : NULL);
      $query -> editarIngreso($cantidad, $categoria, $fecha, $tipo, $descripcion, $espacio, $id_ingreso);
      break;
    case 'editarGasto':
      $cantidad = (isset($_POST['cantidad']) ? $_POST['cantidad'] : NULL); 
      $categoria = (isset($_POST['categoria']) ? $_POST['categoria'] : NULL); 
      $fecha = (isset($_POST['fecha']) ? $_POST['fecha'] : NULL); 
      $espacio = (isset($_POST['espacio']) ? $_POST['espacio'] : NULL);
      $id_gasto = (isset($_POST['id_gasto']) ? $_POST['id_gasto'] : NULL);
      $query -> editarGasto($cantidad, $categoria, $fecha, $espacio, $id_gasto);
      break;
    case 'editarCatIng': // Agregar categoria para ingresos
      $id = (isset($_POST['id']) ? $_POST['id'] : NULL); 
      $nombre = (isset($_POST['nombre']) ? $_POST['nombre'] : NULL); 
      $descripcion = (isset($_POST['descripcion']) ? $_POST['descripcion'] : NULL); 
      $icono = (isset($_POST['iconoIngreso']) ? $_POST['iconoIngreso'] : NULL);
      $color = (isset($_POST['colorIngreso']) ? $_POST['colorIngreso'] : NULL); 
      $query -> editarCatIng($nombre, $descripcion, $icono, $color, $id);
      break;
    case 'editarCatGas': // Agregar categoria para ingresos
      $id = (isset($_POST['id']) ? $_POST['id'] : NULL); 
      $nombre = (isset($_POST['nombre_gas']) ? $_POST['nombre_gas'] : NULL); 
      $descripcion = (isset($_POST['descripcion_gas']) ? $_POST['descripcion_gas'] : NULL); 
      $icono = (isset($_POST['iconoGasto']) ? $_POST['iconoGasto'] : NULL);
      $color = (isset($_POST['colorGasto']) ? $_POST['colorGasto'] : NULL); 
      $query -> editarCatGas($nombre, $descripcion, $icono, $color, $id);
      break;
    case 'editarEspacio': // Agregar categoria para ingresos
      $id_espacio = (isset($_POST['id_espacio']) ? $_POST['id_espacio'] : NULL); 
      $alias = (isset($_POST['alias']) ? $_POST['alias'] : NULL); 
      $detalles = (isset($_POST['detalles']) ? $_POST['detalles'] : NULL); 
      $espacio = (isset($_POST['espacio']) ? $_POST['espacio'] : NULL);
      $query -> editarEspacio($alias, $detalles, $espacio, $id_espacio);
      break;
    default:
      # code...
      break;
  }
}

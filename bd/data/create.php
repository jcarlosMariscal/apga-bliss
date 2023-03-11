<?php
require ("../class/Create.php"); // LLAMAMOS A LA CLASE
$query = new Create();
$action = (isset($_POST['action']) ? $_POST['action'] : NULL); 
if(!empty($_POST)){
  switch ($action) {
    case 'agregarGasto':
      $cantidad = (isset($_POST['cantidad']) ? $_POST['cantidad'] : NULL); 
      $categoria = (isset($_POST['categoria']) ? $_POST['categoria'] : NULL); 
      $fecha = (isset($_POST['fecha']) ? $_POST['fecha'] : NULL); 
      $espacio = (isset($_POST['espacio']) ? $_POST['espacio'] : NULL);
      $query -> agregarGasto($cantidad, $categoria, $fecha, $espacio);
      break;
    case 'agregarIngreso':
      $cantidad = (isset($_POST['cantidad']) ? $_POST['cantidad'] : NULL); 
      $categoria = (isset($_POST['categoria']) ? $_POST['categoria'] : NULL); 
      $fecha = (isset($_POST['fecha']) ? $_POST['fecha'] : NULL); 
      $tipo = (isset($_POST['tipo']) ? $_POST['tipo'] : NULL); 
      $descripcion = (isset($_POST['descripcion']) ? $_POST['descripcion'] : NULL); 
      $espacio = (isset($_POST['espacio']) ? $_POST['espacio'] : NULL);
      $query -> agregarIngreso($cantidad, $categoria, $fecha, $tipo, $descripcion, $espacio);
      break;
    case 'agregarCatIng': // Agregar categoria para ingresos
      $nombre = (isset($_POST['nombre']) ? $_POST['nombre'] : NULL); 
      $descripcion = (isset($_POST['descripcion']) ? $_POST['descripcion'] : NULL); 
      $icono = (isset($_POST['iconoIngreso']) ? $_POST['iconoIngreso'] : NULL);
      $color = (isset($_POST['colorIngreso']) ? $_POST['colorIngreso'] : NULL); 
      $query -> agregarCatIng($nombre, $descripcion, $icono, $color);
      break;
    case 'agregarCatGas': // Agregar categoria para ingresos
      $nombre = (isset($_POST['nombre_gas']) ? $_POST['nombre_gas'] : NULL); 
      $descripcion = (isset($_POST['descripcion_gas']) ? $_POST['descripcion_gas'] : NULL); 
      $icono = (isset($_POST['iconoGasto']) ? $_POST['iconoGasto'] : NULL);
      $color = (isset($_POST['colorGasto']) ? $_POST['colorGasto'] : NULL); 
      $query -> agregarCatGas($nombre, $descripcion, $icono, $color);
      break;
    case 'crearEspacio': // Agregar categoria para ingresos
      $alias = (isset($_POST['alias']) ? $_POST['alias'] : NULL); 
      $detalles = (isset($_POST['detalles']) ? $_POST['detalles'] : NULL); 
      $espacio = (isset($_POST['espacio']) ? $_POST['espacio'] : NULL);
      $token = (isset($_POST['token']) ? $_POST['token'] : NULL);
      $query -> crearEspacio($alias, $detalles, $espacio,$token);
      break;
    default:
      # code...
      break;
  }
}

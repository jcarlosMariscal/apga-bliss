<?php
require ("../class/Read.php"); // LLAMAMOS A LA CLASE
$query = new Read(); // INSTANCIAMOS LA CLASE PARA ACCEDER A LOS MÉTODOS
// CAMPO OCULTO DE FORMULARIO PARA TOMAR LA DESICIÓN DE QUE ACCIÓN TOMAR
$action = (isset($_POST['action']) ? $_POST['action'] : NULL); 
if(!empty($_POST)){
  switch ($action) {
    case 'obtenerDatos':
      $token = (isset($_POST['user_token']) ? $_POST['user_token'] : NULL); 
      $query -> obtenerDatos($token);
      break;
    case 'obtenerEspacios':
      $token = (isset($_POST['user_token']) ? $_POST['user_token'] : NULL); 
      $query -> obtenerEspacios($token);
      break;
    case 'obtenerIngresos':
      $espacio = (isset($_POST['espacio']) ? $_POST['espacio'] : NULL); 
      $query -> obtenerIngresos($espacio);
      break;
    case 'obtenerCategoriaIngresos':
      $query -> categoriaIngresosMostrar();
      break;
    case 'obtenerCategoriaGastos':
      $query -> categoriaGastosMostrar();
      break;
    case 'obtenerTiposIngresos':
      $query -> tiposIngresosMostrar();
      break;
    case 'obtenerEspacioIngresos':
      $query -> espacioIngresos();
      break;
    case 'categoriaIngresosForm': // Obtener categoria para mostrar en formulario de ingresos
      $query -> categoriaIngresosForm();
      break;
    case 'categoriaGastosForm': // Obtener categoria para mostrar en formulario de ingresos
      $query -> categoriaGastosForm();
      break;
    case 'getIngresoEditar':
      $id = (isset($_POST['id']) ? $_POST['id'] : NULL); 
      $query -> getIngresoEditar($id);
      break;
    case 'getGastoEditar':
      $id = (isset($_POST['id']) ? $_POST['id'] : NULL); 
      $query -> getGastoEditar($id);
      break;
    case 'getCatIngEdit':
      $id = (isset($_POST['id']) ? $_POST['id'] : NULL); 
      $query -> getCatIngEdit($id);
      break;
    case 'getCatGasEdit':
      $id = (isset($_POST['id']) ? $_POST['id'] : NULL); 
      $query -> getCatGasEdit($id);
      break;
    case 'obtenerGastos':
      $espacio = (isset($_POST['espacio']) ? $_POST['espacio'] : NULL); 
      $query -> obtenerGastos($espacio);
      break;
    case 'getEspacioEditar':
      $id_espacio = (isset($_POST['id_espacio']) ? $_POST['id_espacio'] : NULL); 
      $query -> obtenerEspacioEditar($id_espacio);
      break;
    default:
      # code...
      break;
  }
}

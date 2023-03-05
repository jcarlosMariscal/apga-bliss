<?php
require ("../class/Login.php"); // LLAMAMOS A LA CLASE
$query = new Login(); // INSTANCIAMOS LA CLASE PARA ACCEDER A LOS MÉTODOS
// CAMPO OCULTO DE FORMULARIO PARA TOMAR LA DESICIÓN DE QUE ACCIÓN TOMAR
$action = (isset($_POST['action']) ? $_POST['action'] : NULL); 
if(!empty($_POST)){
  switch ($action) {
    case 'register':
      function generar_token($longitud){
        if ($longitud < 10) $longitud = 10;
        return bin2hex(random_bytes(($longitud - ($longitud % 2)) / 2));
      }
      $nombre = (isset($_POST['nombre']) ? $_POST['nombre'] : NULL);
      $apellidos = (isset($_POST['apellidos']) ? $_POST['apellidos'] : NULL);
      $email = (isset($_POST['email']) ? $_POST['email'] : NULL);
      $password = (isset($_POST['password']) ? $_POST['password'] : NULL);
      $email_verified = 0;
      $picture = "http://localhost/clever-cloud/Apga-bliss/assets/img/profile.png";
      $token = generar_token(22);
        $query -> register($nombre, $apellidos, $email, $password, $email_verified, $picture, $token);
      break;
    case 'login': // INICIAR SESIÓN
      $email = (isset($_POST['email']) ? $_POST['email'] : NULL);
      $password = (isset($_POST['password']) ? $_POST['password'] : NULL);
      $query -> login($email, $password);
      break;
    default:
      # code...
      break;
  }
}

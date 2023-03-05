<?php
  require ("../config/Connection.php");
  session_start(); 
  class Login{
    public $cnx;
    function __construct(){
      $this -> cnx = Connection::connectDB();
    }
    // ---------- REGISTRAR ESPACIO POR DEFECTO [PERSONAL] ---------------
    function crearEspacioPersonal($nombre, $apellidos,$id_usuario){
      try {
        $alias = "Espacio personal de {$nombre} {$apellidos}";
        $detalles = "Hola {$nombre}, aquí podrá administrar sus gastos personales.";
        $activo = 1;
        $id_tipoEspacio = 1;
        $sql = "INSERT INTO espacio(alias, detalles, activo, id_usuario, id_tipoEspacio) VALUES (?,?,?,?,?)";
        $query = $this->cnx->prepare($sql);
        $data = array($alias,$detalles,$activo, $id_usuario, $id_tipoEspacio);
        $query -> execute($data);
      } catch (PDOException $th) {
        echo $th;
      }
    }
    // ---------- REGISTRAR ESPACIO POR DEFECTO [PERSONAL] ---------------
    // ---------- REGISTRAR USUARIO ---------------
    function register($nombre, $apellidos, $correo, $password, $email_verified, $picture, $token){
      try {
        $sql = "INSERT INTO usuario(nombre, apellidos, email, email_verified, password, picture, token) VALUES (?,?,?,?,?,?,?)";
        $query = $this->cnx->prepare($sql);
        $encrypt = password_hash($password, PASSWORD_BCRYPT); // Encriptar la contraseña
        $data = array($nombre,$apellidos,$correo, $email_verified, $encrypt, $picture, $token);
        $query -> execute($data);
        if($query){
          $json = '{"status": "success","message": "Sus datos se han registrado","data": false}';
          $last_id = $this->cnx->lastInsertId();
           $this->crearEspacioPersonal($nombre, $apellidos,$last_id);
          echo $json;
        }else {
          $json = '{"status": "error","message": "No se ha podido registrar su usuario, intente de nuevo más tarde.","data": false}';
          echo $json;
        }
      } catch (PDOException $th) {
        $json = '{"status": "err","message": "No se ha podido registrar su usuario, parece que el correo ya está registrado en la base de datos.","data": false}';
          echo $json;
      }
    }
    // ---------- REGISTRAR USUARIO ---------------
    // ---------- INICIAR SESIÓN ---------------
    function login($email, $password){
      try {
        $sql = "SELECT * FROM usuario WHERE email = ?";
        $query = $this->cnx->prepare($sql);
        $query -> bindParam(1,$email);
        $query->execute();
        $count = $query->rowCount();
        if($count === 0){
          $json = '{"status": "error","message": "El correo no coincide con ninguna en la base de datos","token": false}';
          echo $json;
        }else{
          foreach($query as $data){
            if(password_verify($password,$data['password'])){
              $_SESSION['user_token'] = $data['token'];
              // $_SESSION['usuario'] = $data['nombre'];
              $json = '{"status": "success","message": "Bienvenido a Apga, administre y controle sus gastos","token": "'.$data['token'].'"}';

              echo $json;
            }else{
              $json = '{"status": "error","message": "Verifique que su contraseña sea correcto","data": false}';
              echo $json;
            }
          }
        }
      } catch (PDOException $th) {
        $json = '{"status": "err","message": "No se ha podido iniciar sesión, intente de nuevo más tarde","token": false}';
        echo $json;
      }
    }
    // ---------- INICIAR SESIÓN ---------------
  }
  ?>
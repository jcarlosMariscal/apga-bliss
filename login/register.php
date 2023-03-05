<?php
  session_start();//iniciamos una sesión
  if(isset($_SESSION['user_token'])){
      header('location: ../index.php');
  }
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="shortcut icon" href="../assets/img/icon.png" type="image/x-icon">

    <title>Register | Apga Bliss</title>

    <!-- Custom fonts for this template-->
    <link href="../vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <script src="../assets/js/sweetalert2.min.js"></script>
    <link href="../assets/css/sb-admin-2.css" rel="stylesheet">
    <script  src="../assets/js/vue.global.js"></script>

</head>

<body class="bg-gradient-primary">
  <div class="container" id="vue-register">
    <div class="card o-hidden border-0 shadow-lg my-5">
      <div class="card-body p-0">
        <!-- Nested Row within Card Body -->
        <div class="row">
          <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
          <div class="col-lg-7">
            <div class="p-5">
              <div class="text-center">
                <h1 class="h4 text-gray-900 mb-4">Regístrese!</h1>
              </div>
              <form class="user needs-validation" @submit.prevent="register" id="formulario" novalidate>
                <div class="form-group row">
                  <div class="col-sm-6 mb-3 mb-sm-0">
                    <input type="text" v-model="nombre" name="nombre" class="form-control form-control-user"  minlength="4" maxlength="20" pattern="[A-Za-zÀ-ÿ\s]+" required  placeholder="Nombre">
                    <div class="valid-feedback">
                      ¡Gracias por proporcionar su nombre!
                    </div>
                    <div class="invalid-feedback">
                      Campo obligatorio, entre 4-20 carácteres. Sólo se permiten letras
                    </div>
                  </div>
                  <div class="col-sm-6">
                    <input type="text" v-model="apellidos" name="apellidos" class="form-control form-control-user" minlength="4" maxlength="40" pattern="[A-Za-zÀ-ÿ\s]+" required placeholder="Apellidos">
                    <div class="valid-feedback">
                      ¡Gracias por proporcionar sus apellidos!
                    </div>
                    <div class="invalid-feedback">
                      Campo bligatorio, entre 4-40 carácteres. Sólo se permiten letras
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <input type="email" v-model="email" name="email" class="form-control form-control-user" pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$" required placeholder="Correo Electrónico">
                  <div class="valid-feedback">
                    ¡Gracias por proporcionar su correo!
                  </div>
                  <div class="invalid-feedback">
                    Por favor, introduzca un correo válido.
                  </div>
                </div>
                <div class="form-group row">
                  <div class="col-sm-12 mb-3 mb-sm-0">
                    <input type="password" v-model="password" name="password" class="form-control form-control-user" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" required placeholder="Password">
                    <div class="valid-feedback">Su contraseña es fuerte!</div>
                    <div class="invalid-feedback">
                      Mínimo ocho caracteres, al menos una letra y un número
                    </div>
                  </div>
                <!-- <div class="col-sm-6">
                  <input type="password" class="form-control form-control-user" id="exampleRepeatPassword" placeholder="Repeat Password">
                </div> -->
                </div>
                <div class="alert alert-danger mt-3" role="alert" v-if="statusErr">{{error}}</div>
                <button type="submit" class="btn btn-primary btn-user btn-block">Crear Cuenta</button>
                <!-- <hr>
                <a href="index.html" class="btn btn-google btn-user btn-block">
                  <i class="fab fa-google fa-fw"></i> Register with Google
                </a>
                <a href="index.html" class="btn btn-facebook btn-user btn-block">
                  <i class="fab fa-facebook-f fa-fw"></i> Register with Facebook
                </a> -->
              </form>
              <hr>
              <div class="text-center">
                <a class="small" href="forgot-password.php">¿Olvidó su contraseña?</a>
              </div>
              <div class="text-center">
                <a class="small" href="login.php">¿Ya tiene una cuenta? Inicie sesión</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

    <!-- Bootstrap core JavaScript-->
    <script src="../vendor/jquery/jquery.min.js"></script>
    <script src="../vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../assets/js/sb-admin-2.js"></script>
    <script src="./register.js"></script>
    <script>
    let msj = localStorage.getItem("register");
    if(msj == "false"){
      Swal.fire({
            title: "Error al registrar usuario",
            text: "Intente registrarse más tarde.",
            icon: "error",
            timer: 3000,
            toast: true,
            position: 'top-end',
            showConfirmButton: false,
            confirmButtonColor: '#47874a',
      });
      setTimeout(function(){
          localStorage.removeItem("register");
      }, 1500);
    }
</script>
</body>

</html>
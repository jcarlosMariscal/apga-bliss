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

    <title>Login | Apga Bliss</title>

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

    <div class="container" id="vue-login">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Bienvenido a Apga!</h1>
                                    </div>
                                    <form class="user needs-validation" @submit.prevent="login" id="formulario" novalidate>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="email" v-model="email" name="email"
                                                placeholder="Escriba su correo electrónico"  pattern="^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$" required>
                                          <div class="valid-feedback">
                                            ¡Gracias por proporcionar su correo!
                                          </div>
                                          <div class="invalid-feedback">
                                            Por favor, introduzca un correo válido.
                                          </div>
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control form-control-user"
                                                id="password" v-model="password" name="password" placeholder="Contraseña" pattern="^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$" required>
                                            <div class="valid-feedback"> Su contraseña es fuerte!</div>
                                            <div class="invalid-feedback">
                                              <!-- La contraseña debe contener un dígito del 1 al 9, una letra minúscula, una letra mayúscula, un carácter especial, sin espacio, y debe tener entre 8 y 16 caracteres. -->
                                              Mínimo ocho caracteres, al menos una letra y un número
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Recordarme</label>
                                            </div>
                                        </div>
                                        <div class="alert alert-danger mt-3" role="alert" v-if="statusErr">
                  {{error}}
                </div>
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Iniciar Sesión
                                        </button>
                                        <!-- <hr> -->
                                        <!-- <a href="index.html" class="btn btn-google btn-user btn-block">
                                            <i class="fab fa-google fa-fw"></i> Login with Google
                                        </a>
                                        <a href="index.html" class="btn btn-facebook btn-user btn-block">
                                            <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                                        </a> -->
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password.php">¿Olvidó su contraseña?</a>
                                    </div>
                                    <div class="text-center">
                                        <a class="small" href="register.php">Regístrarse</a>
                                    </div>
                                </div>
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
    <script src="../assets/js/sb-admin-2.min.js"></script>
    <script src="./login.js"></script>
    <script>
    let msj = localStorage.getItem("register");
    if(msj == "success"){
      Swal.fire({
          title: "Registro de usuario exitoso",
          text: "Inicie sesión a continuación para acceder a Apga.",
          icon: "success",
          timer: 3000,
          toast: true,
          position: 'top-end',
          showConfirmButton: false,
          confirmButtonColor: '#47874a',
    });
    }
    setTimeout(function(){
        localStorage.removeItem("register");
    }, 1500);
</script>
</body>

</html>
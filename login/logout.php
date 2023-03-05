<?php
session_start();


//Destroy entire session data.
// session_destroy();
unset($_SESSION['user_token']);
session_destroy();

//redirect page to index.php
header('location: ../index.php');

?>
<?php
// recordar la variable de sesion
session_start();
include 'includes/conecta.php';
// validar que se cree una variable de sesion al pasar por login
$usuario = $_SESSION['Usuario'];
if(!isset($usuario)){
  header("location:login.php");
}
$consulta = "SELECT * FROM Usuarios WHERE Usuario = '$usuario'";
$ejecuta = $conecta->query($consulta);
$row = $ejecuta->fetch_assoc();
 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/fontello.css">
    <link rel="stylesheet" type="text/css" href="css/preloader.css">
    <link rel="stylesheet" type="text/css" href="css/main.css">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="js/jquery-3.5.1.min.js"></script>
    <title>Bienvenido al sistema</title>
  </head>
  <body>
  <div class="container py-4">
       <h3>Bienvenido al sistema</h3>
       <div class="row text-center col-sm-12 col-md-12 col-lg-12 py-4">
         <ul class="nav nav-tabs">
            <li class="nav-item">
               <a class="nav-link active" href="#">Validación de sesión</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#">Crear Tabla con PHP y MysQL</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="#">Registro con PHP y MysQL</a>
            </li>
            <li class="nav-item">
               <a class="nav-link disabled" href="#">Busqueda de registros Con PHP y MysQL</a>
           </li>
          </ul>
       </div>
       <div class="container py-4">
            <h4>Hola :<?php echo $usuario; ?></h4>
            <p><a href="includes/cerrars.php">Cerrar Sesión</a></p>
       </div>
       <div class="container py-3">
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                  <p>Nombre: <?php echo $row['Nombre'];?></p>
                  <p>Apellidos: <?php echo $row['ApellidoP']; ?> <?php echo $row['ApellidoM']; ?></p>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                  <p>Telefono: <?php echo $row['Telefono']; ?></p>
                  <p>Email: <?php echo $row['Email']; ?></p>
                </div>

            </div>
       </div>
  </div>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/preloader.js"></script>
  <script src="js/main.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  </body>
</html>

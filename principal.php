<?php
// recordar la variable de sesion
session_start();
// se manda llamar el archivo de conexion a la base de datos
include 'includes/conecta.php';
// validar que se cree una variable de sesion al pasar por login
$usuario = $_SESSION['Usuario'];
if(!isset($usuario)){
  header("location:login.php");
}
// extraer lo datos de el usuario que se tine dentro de la variable de sesion
$consulta = "SELECT * FROM Usuarios WHERE Usuario = '$usuario'";
$ejecuta = $conecta->query($consulta);
$extraer = $ejecuta->fetch_assoc();
// una consulta con inner join
$unir = "SELECT u.Id_Usuarios, u.Nombre, u.ApellidoP, u.ApellidoM, u.F_Nacimiento, u.Id_Genero, u.Telefono,
u.Id_Plantel, u.Id_Tusuario, u.Email, u.Usuario, u.Password, u.Img, u.Estado, u.Online, g.Id_Genero, g.NombreG,
p.Id_Plantel, p.NombreP, t.Id_Tusuario, t.TNombre FROM Usuarios u INNER JOIN Genero g ON u.Id_Genero = g.Id_Genero
INNER JOIN Plantel p ON u.Id_Plantel = p.Id_Plantel INNER JOIN Tusuario t ON u.Id_Tusuario = t.Id_Tusuario WHERE Usuario = '$usuario'";
$verificar = $conecta->query($unir);
$separar = $verificar->fetch_array();
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
               <a class="nav-link active" href="principal.php">Validación de sesión</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="tabla.php">Crear Tabla con PHP y MysQL</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="registro.php">Registro con PHP y MysQL</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="busqueda.php">Busqueda de registros Con PHP y MysQL</a>
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
                   <p>Imegen de perfil:</p>
                   <img src="img/perfil/<?php echo $separar['Img']; ?>" alt="Imegen" width="250px" height="190px">
                 </div>
            </div>
            <div class="row">
                <div class="col-sm-6 col-md-6 col-lg-6">
                  <p>Nombre: <?php echo $separar['Nombre']; ?></p>
                  <p>Apellidos: <?php echo $separar['ApellidoP']; ?> <?php echo $extraer['ApellidoM']; ?></p>
                  <p>Plantel: <?php echo $separar['NombreP']; ?></p>
                </div>
                <div class="col-sm-6 col-md-6 col-lg-6">
                  <p>Telefono: <?php echo $separar['Telefono']; ?></p>
                  <p>Email: <?php echo $separar['Email']; ?></p>
                  <p>Genero: <?php echo $separar['NombreG']; ?></p>
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

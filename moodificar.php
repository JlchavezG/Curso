<?php
session_start();
include 'includes/conecta.php';
$usuario = $_SESSION['Usuario'];
if (!isset($usuario)) {
  header("location:index.php");
}
// generar la consulta para extraer lo datos
$id = $_GET['Id_Alumnos'];
$m = "SELECT * FROM Alumnos WHERE Id_Alumnos = '$id'";
$modificar = $conecta->query($m);
$dato = $modificar->fetch_array();
if(isset($_POST['modificar'])){
// recuparar los datos que se encuentran en cada uno de los imputs
 $id = $_POST['id'];
 $nombre = $conecta->real_escape_string($_POST['mNombre']);
 $apellido1 = $conecta->real_escape_string($_POST['mApellidoP']);
 $apellido2 = $conecta->real_escape_string($_POST['mAppelidoM']);
 $tel = $conecta->real_escape_string($_POST['mTelefono']);
 // realizar la consulta para modificar los datos
 $actuliza = "UPDATE Alumnos SET Nombre = '$nombre', ApellidoP = '$apellido1',  ApellidoM = '$apellido2', Telefono = '$tel' WHERE Id_Alumnos = '$id'";
 $actualizar = $conecta->query($actuliza);
 header("location:tabla.php");
}
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
       <h3>Crear una tabla con Php</h3>
       <div class="row text-center col-sm-12 col-md-12 col-lg-12 py-4">
         <ul class="nav nav-tabs">
            <li class="nav-item">
               <a class="nav-link" href="principal.php">Validación de sesión</a>
            </li>
            <li class="nav-item">
               <a class="nav-link active" href="tabla.php">Crear Tabla con PHP y MysQL</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="registro.php">Registro con PHP y MysQL</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="busqueda.php">Busqueda de registros Con PHP y MysQL</a>
           </li>
          </ul>
       </div>
       <div class="container">
           <div class="col-sm-12 col-md-12 col-lg-12">
               <h3 class="text-center"> Modificar Datos con Php y Mysql</h3>
                 <form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                    <div class="row">
                        <input type="hidden" name="id" value="<?php echo $dato['Id_Alumnos']; ?>">
                        <input type="text" name="mNombre" class="form-control" value="<?php echo $dato['Nombre']; ?>" placeholder="Nombre" required>
                    </div>
                    <div class="row">
                        <input type="text" name="mApellidoP" class="form-control" value="<?php echo $dato['ApellidoP']; ?>" placeholder="Apellido Paterno" required>
                    </div>
                    <div class="row">
                        <input type="text" name="mAppelidoM" class="form-control" value="<?php echo $dato['ApellidoM']; ?>" placeholder="Apellido Materno" required>
                    </div>
                    <div class="row">
                        <input type="text" name="mTelefono" class="form-control" value="<?php echo $dato['Telefono']; ?>" placeholder="Telefono" required>
                    </div>
                    <div class="row">
                        <input type="submit" name="modificar" class="btn btn-success btn-sm btn-block" value="Modificar">
                    </div>
                 </form>
           </div>
       </div>
       </body>
       </html>

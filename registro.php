<?php
error_reporting(0);
include 'includes/conecta.php';
// consulta para extraer datos de genero
$genero = "SELECT * FROM Genero";
$guardar = $conecta->query($genero);
// validar que exita un boton enviar
if (isset($_POST['registrar'])) {
  $mensaje = "";
  $nombre = $conecta->real_escape_string($_POST['Nombre']);
  $apellido1 = $conecta->real_escape_string($_POST['Apellodop']);
  $apellido2 = $conecta->real_escape_string($_POST['Apellodom']);
  $fecha = $conecta->real_escape_string($_POST['Fecha']);
  $genero = $conecta->real_escape_string($_POST['genero']);
  $telefono = $conecta->real_escape_string($_POST['Telefono']);
  $idP = "1";
  $idt = "3";
  $email = $conecta->real_escape_string($_POST['Email']);
  $user = $conecta->real_escape_string($_POST['Usuario']);
  $pass = $conecta->real_escape_string(md5($_POST['password']));
  $img = "user.png";
  $estado = "Activo";
  $on= "0";
  // consulta para verifcar que el registro no exista
  $validar = "SELECT * FROM Usuarios WHERE Email = '$email' || Usuario = '$user'";
  $validando = $conecta->query($validar);
  if($validando->num_rows > 0){
    $mensaje.="<h5 class='text-danger text-center'> El usuario y/o Email ya se encuantran registrados</h5>";
  } else {
  // consulta para insertar los datos
  $insertar = "INSERT INTO Usuarios (Nombre, ApellidoP, ApellidoM, F_Nacimiento, Id_Genero, Telefono, 	Id_Plantel,
  Id_Tusuario, Email, Usuario, Password, Img, Estado, Online)VALUES('$nombre','$apellido1','$apellido2','$fecha','$genero',
  '$telefono','$idP','$idt','$email','$user','$pass','$img','$estado','$on')";
  $guardando = $conecta->query($insertar);
  if ($guardando > 0) {
    $mensaje.="<h5 class='text-success text-center'> Tu registro se realizo con exito</h5>";
  }
  else{
      $mensaje.="<h5 class='text-danger text-center'> Tu registro no se realizo con exito</h5>";
  }
  }
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
               <a class="nav-link" href="tabla.php">Crear Tabla con PHP y MysQL</a>
            </li>
            <li class="nav-item">
               <a class="nav-link active" href="registro.php">Registro con PHP y MysQL</a>
            </li>
            <li class="nav-item">
               <a class="nav-link" href="busqueda.php">Busqueda de registros Con PHP y MysQL</a>
           </li>
          </ul>
       </div>
       <div class="container">
           <div class="col-sm-12 col-md-12 col-lg-12">
              <h4 class="text-center">Registro con php y mysql</h4>
              <form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                   <input type="text" name="Nombre" placeholder="Nombre" class="form-control" required>
                   <input type="text" name="Apellodop" placeholder="Apellido Paterno" class="form-control" required>
                   <input type="text" name="Apellodom" placeholder="Apellido Paterno" class="form-control" required>
                   <input type="date" name="Fecha" class="form-control" required>
                   <select class="form-control" name="genero">
                     <option value="">Selecciona un genero</option>
                     <?php while($row = $guardar->fetch_assoc()){?>
                     <option value="<?php echo $row['Id_Genero']; ?>"><?php echo $row['NombreG']; ?></option>
                     <?php } ?>

                   </select>
                   <input type="tel" name="Telefono" placeholder="Telefono" class="form-control" required>
                   <input type="email" name="Email" placeholder="Email" class="form-control" required>
                   <input type="text" name="Usuario" placeholder="Usuario" class="form-control" required>
                   <input type="password" name="password" placeholder="Password" class="form-control" required>
                   <input type="submit" name="registrar" value="registrar" class="btn btn-sm btn-block btn-success">
              </form>
           </div>
           <?php echo $mensaje; ?>
      </div>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/preloader.js"></script>
      <script src="js/main.js"></script>
      <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
      </body>
    </html>

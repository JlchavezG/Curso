<?php
session_start();
error_reporting(0);
// llamar ala conexión de base de datos
include 'includes/conecta.php';
if(isset($_POST['entrar'])){
$usuario = $conecta->real_escape_string($_POST['usuario']);
$password = $conecta->real_escape_string(md5($_POST['pass']));
// generar una consulta que extraigo los datos de la bd
$consulta = "SELECT * FROM Usuarios WHERE Usuario = '$usuario' and Password = '$password'";
if($resultado = $conecta->query($consulta)){
   while($row = $resultado->fetch_array()){
     $userok = $row['Usuario'];
     $passwordok = $row['Password'];
   }
   $resultado->close();
}
$conecta->close();
if(isset($usuario) && isset($password)){
  if($usuario == $userok &&  $password == $passwordok ){
    $_SESSION['login'] = TRUE;
    $_SESSION['Usuario'] = $usuario;
    header("location:principal.php");
  }
  else {
    $mensaje.="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
               <strong>Error no se encontraron tus datos</strong> Por favor verifica tus datos.
               <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
               <span aria-hidden='true'>&times;</span>
              </button>
               </div>";
     }
}
else{
  $mensaje.="<div class='alert alert-danger alert-dismissible fade show' role='alert'>
             <strong>Error no se encontraron tus datos</strong> Por favor verifica tus datos.
             <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
             <span aria-hidden='true'>&times;</span>
            </button>
             </div>";
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
    <title>Login de Usuario</title>
  </head>
  <body>
  <div class="container py-4">
     <div class="row justify-content-center h-100 py-4">
         <div class="card col-sm-6 col-md-6 col-lg-6 shadow-lg p-3 mb-5 bg-white rounded">
            <article class="card-body">
                <h4 class="card-title text-center">Login al sistema</h4>
                <hr>
                <p class="text-success text-center">Digita tus credenciales</p>
                <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                  <div class="form-grup">
                     <div class="input-group">
                       <input type="text" name="usuario" placeholder="Usuario" class="form-control">
                     </div>
                     <div class="input-group py-2">
                       <input type="password" name="pass" placeholder="Password" class="form-control">
                     </div>
                     <div class="input-group">
                       <input type="submit" name="entrar" value="Entrar" class="btn btn-sm btn-success btn-block">
                     </div>
                  </div>
                </form>
            </article>
         </div>
     </div>
     <?php echo $mensaje; ?>
  </div>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/preloader.js"></script>
  <script src="js/main.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  </body>
</html>

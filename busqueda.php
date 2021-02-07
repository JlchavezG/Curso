<?php
  error_reporting(0);
  include 'includes/conecta.php';
  $where = "";
  if (!empty($_POST)) {
      $valor = $_POST['buscar'];
      if (!empty($valor)) {
         $where = "WHERE ApellidoP LIKE '%$valor%'";
      }
  }
  $consulta = "SELECT * FROM Usuarios $where";
  $resultado = $conecta->query($consulta);
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
               <a class="nav-link" href="registro.php">Registro con PHP y MysQL</a>
            </li>
            <li class="nav-item">
               <a class="nav-link active" href="busqueda.php">Busqueda de registros Con PHP y MysQL</a>
           </li>
          </ul>
       </div>
       <div class="container">
           <div class="col-sm-12 col-md-12 col-lg-12">
              <h4 class="text-center">Busqueda con php y mysql</h4>
              <div class="col-sm-12 col-md-12 col-lg12">
                   <form class="" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
                       <input type="text" name="buscar" class="form-control" placeholder="Busqueda por Apellido Paterno"><br>
                       <input type="submit" name="buscando" value="Buscar" class="btn-block btn-sm btn-success">
                   </form>
                   <div class="col-sm-12 col-md-12 col-lg-12">
                      <?php if($resultado->num_rows > 0) { ?>
                       <br><div class="table-responsive">
                          <table class="table">
                              <thead class="text-muted">
                                 <th>Nombre</th>
                                 <th>Apellido Paterno</th>
                                 <th>Apellido Materno</th>
                                 <th>Telefono</th>
                                 <th>Email</th>
                                 <th>Usuario</th>
                                 <th>Estado</th>
                              </thead>
                              <tbody>
                              <?php while($row = $resultado->fetch_assoc()){?>
                                <tr>
                                  <td><?php echo $row['Nombre']; ?></td>
                                  <td><?php echo $row['ApellidoP']; ?></td>
                                  <td><?php echo $row['ApellidoM']; ?></td>
                                  <td><?php echo $row['Telefono']; ?></td>
                                  <td><?php echo $row['Email']; ?></td>
                                  <td><?php echo $row['Usuario']; ?></td>
                                  <td><?php echo $row['Estado']; ?></td>
                                </tr>
                              <?php } ?>
                              </tbody>
                          </table>
                        <?php } else {?>
                           <div class="row py-4">
                               <div class="text-danger text-center">
                                    <h5>No hay datos</h5>
                               </div>
                           </div>
                        <?php } ?>
                       </div>
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

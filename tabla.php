<?php
include 'includes/conecta.php';
// consulta
$consulta = "SELECT * FROM Alumnos";
$guardar = $conecta->query($consulta);
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
               <h3 class="text-center"> Tabla Dinamica</h3>
               <div class="table-responsive table-hover" id="TablaConsulta">
                  <table class="table">
                      <thead class="text-muted">
                           <th class="text-center">Nombre</th>
                           <th class="text-center">Apellido Paterno</th>
                           <th class="text-center">Apellido Materno</th>
                           <th class="text-center">Fecha Nacimiento</th>
                           <th class="text-center">Genero</th>
                           <th class="text-center">Telefono</th>
                           <th class="text-center">Opciones</th>
                      </thead>
                      <tbody>
                         <?php while($row = $guardar->fetch_assoc()){?>
                         <tr>
                            <td><?php echo $row['Nombre']; ?></td>
                            <td><?php echo $row['ApellidoP']; ?></td>
                            <td><?php echo $row['ApellidoM']; ?></td>
                            <td><?php echo $row['F_Nacimiento']; ?></td>
                            <td><?php echo $row['Id_Genero']; ?></td>
                            <td><?php echo $row['Telefono']; ?></td>
                            <td><a href="moodificar.php?Id_Alumnos=<?php echo $row['Id_Alumnos'];?>">Editar</a> <a href="eliminar.php?Id_Alumnos=<?php echo $row['Id_Alumnos'];?>">-Borrar</a></td>
                         </tr>
                       <?php } ?>
                      </tbody>
                  </table>
               </div>
           </div>
       </div>

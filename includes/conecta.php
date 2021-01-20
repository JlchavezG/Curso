<?php
// declarar las variables en donde se guardaran los valores de la conexión
$servidor = "localhost";
$usuario = "root";
$password = "";
$bd = "Informatica";
$conecta = mysqli_connect($servidor, $usuario,$password,$bd);
if($conecta->connect_error){
  die("Error al conectar la base de datos de la pagina".$conecta->connect_error);
}
?>

<?php
include 'includes/conecta.php';
$id = $_GET['Id_Alumnos'];
$eliminar = "DELETE FROM Alumnos WHERE Id_Alumnos = '$id'";
$elimina = $conecta->query($eliminar);
header("location:tabla.php");
$conecta->close();
 ?>

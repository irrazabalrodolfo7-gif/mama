<?php
//eliminar_img.php
require "conexion.php";
session_start();

$id = intval($_GET['id']); // id imagen secundaria
$p = intval($_GET['p']);   // id producto

$img = $conn->query("SELECT imagen FROM productos_imagenes WHERE id=$id")->fetch_assoc()['imagen'];

if(file_exists("../images/".$img)) unlink("../images/".$img);

$conn->query("DELETE FROM productos_imagenes WHERE id=$id");

header("Location: admin_editar.php?id=$p");
exit;

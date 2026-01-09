<?php
//eliminar.php
require_once "conexion.php";
session_start();

if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit;
}

$id = intval($_GET['id']); // id imagen
$p  = intval($_GET['p']);  // id producto

$img = $conn->query("
    SELECT archivo FROM fotos_producto WHERE id=$id
")->fetch_assoc();

if ($img && file_exists("../images/".$img['archivo'])) {
    unlink("../images/".$img['archivo']);
}

$conn->query("DELETE FROM fotos_producto WHERE id=$id");

header("Location: admin_editar.php?id=$p");
exit;

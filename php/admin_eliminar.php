<?php
// admin_eliminar.php
require_once "conexion.php";
session_start();

if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit;
}

$id = $_GET['id'];

// Obtener nombre de la imagen para borrarla
$sql = "SELECT imagen FROM productos WHERE id = $id";
$res = $conn->query($sql);
$data = $res->fetch_assoc();
$img = $data['imagen'];

// Borrar el archivo de imagen
$path = "../images/" . $img;
if (file_exists($path)) {
    unlink($path);
}

// Borrar de la base de datos
$conn->query("DELETE FROM productos WHERE id = $id");

// Volver al panel
header("Location: admin_panel.php");
exit;
?>

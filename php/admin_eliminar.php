<?php
require_once "conexion.php";
session_start();

if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit;
}

$id = intval($_GET['id']);

// imagen principal
$p = $conn->query("SELECT imagen FROM productos WHERE id=$id")->fetch_assoc();
if ($p && $p['imagen'] && file_exists("../images/".$p['imagen'])) {
    unlink("../images/".$p['imagen']);
}

// imágenes secundarias
$res = $conn->query("SELECT archivo FROM fotos_producto WHERE producto_id=$id");
while ($f = $res->fetch_assoc()) {
    if (file_exists("../images/".$f['archivo'])) {
        unlink("../images/".$f['archivo']);
    }
}

// borrar registros
$conn->query("DELETE FROM fotos_producto WHERE producto_id=$id");
$conn->query("DELETE FROM productos WHERE id=$id");

header("Location: admin_panel.php")_

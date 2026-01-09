<?php
// procesar_editar.php
require_once "conexion.php";
session_start();

if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit;
}

$id = intval($_POST['id']);

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$categoria = $_POST['categoria'];

// ===== UPDATE TEXTO =====
$conn->query("
    UPDATE productos SET
        nombre='$nombre',
        descripcion='$descripcion',
        precio='$precio',
        categoria='$categoria'
    WHERE id=$id
");

// ===== IMAGEN PRINCIPAL (opcional) =====
if (!empty($_FILES['imagen']['name'])) {

    // buscamos la imagen vieja para borrarla
    $old = $conn->query("SELECT imagen FROM productos WHERE id=$id")->fetch_assoc();
    if ($old['imagen'] && file_exists("../images/".$old['imagen'])) {
        unlink("../images/".$old['imagen']);
    }

    $img = time()."_".$_FILES['imagen']['name'];
    move_uploaded_file($_FILES['imagen']['tmp_name'], "../images/".$img);

    $conn->query("UPDATE productos SET imagen='$img' WHERE id=$id");
}

// ===== IMÁGENES SECUNDARIAS =====
if (!empty($_FILES['galeria']['name'][0])) {

    foreach ($_FILES['galeria']['name'] as $i => $nombre_archivo) {

        if ($nombre_archivo == "") continue;

        $final = time()."_".$nombre_archivo;
        move_uploaded_file(
            $_FILES['galeria']['tmp_na_]()_

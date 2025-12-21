<?php
//procesar_editar.php
require_once "conexion.php";
session_start();

$id = intval($_POST['id']);

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$categoria = $_POST['categoria'];

if(!empty($_FILES['imagen']['name'])){
    $imagen = $_FILES['imagen']['name'];
    move_uploaded_file($_FILES['imagen']['tmp_name'], "../images/$imagen");
    $conn->query("UPDATE productos SET imagen='$imagen' WHERE id=$id");
}

$conn->query("UPDATE productos SET nombre='$nombre',descripcion='$descripcion',precio='$precio',categoria='$categoria' WHERE id=$id");


// múltiples
if(!empty($_FILES['galeria']['name'][0])){
    foreach($_FILES['galeria']['name'] as $k=>$filename){
        move_uploaded_file($_FILES['galeria']['tmp_name'][$k],"../images/$filename");
        $conn->query("INSERT INTO fotos_producto (producto_id,archivo) VALUES ($id,'$filename')");
    }
}

header("Location: admin_panel.php");
exit;

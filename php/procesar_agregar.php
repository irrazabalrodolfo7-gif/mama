<?php
// procesar_agregar.php
// =====================
// Este archivo:
// 1) Guarda el producto
// 2) Guarda la imagen principal
// 3) Guarda TODAS las imágenes secundarias
// 4) Sin cambiar botones ni formularios

require_once "conexion.php";
session_start();

// Seguridad básica
if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit;
}

// ===== DATOS DEL FORM =====
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
$categoria = $_POST['categoria'];

// ===== IMAGEN PRINCIPAL =====
$imagen_principal = null;

if (!empty($_FILES['imagen']['name'])) {
    $imagen_principal = time() . "_" . $_FILES['imagen']['name'];
    move_uploaded_file(
        $_FILES['imagen']['tmp_name'],
        "../images/" . $imagen_principal
    );
}

// ===== INSERT PRODUCTO =====
$conn->query("
    INSERT INTO productos (nombre, descripcion, precio, categoria, imagen)
    VALUES (
        '$nombre',
        '$descripcion',
        '$precio',
        '$categoria',
        '$imagen_principal'
    )
");

// ID del producto recién creado
$producto_id = $conn->insert_id;

// ===== IMÁGENES SECUNDARIAS =====
// Respeta EXACTAMENTE tu input: name='galeria[]'
if (!empty($_FILES['galeria']['name'][0])) {

    foreach ($_FILES['galeria']['name'] as $i => $nombre_archivo) {

        if ($nombre_archivo == "") continue;

        // nombre único para evitar pisar archivos
        $archivo_final = time() . "_" . $nombre_archivo;

        move_uploaded_file(
            $_FILES['galeria']['tmp_name'][$i],
            "../images/" . $archivo_final
        );

        // Guardamos en TU tabla
        $conn->query("
            INSERT INTO fotos_producto (producto_id, archivo)
            VALUES ($producto_id, '$archivo_final')
        ");
    }
}

// Volvemos al panel (sin romper nada)
header("Location: admin_panel.php");
exit;

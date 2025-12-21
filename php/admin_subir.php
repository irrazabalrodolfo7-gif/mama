<?php
//admin_subir.php
session_start();
if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<title>Agregar producto</title>
</head>
<body>

<h2>Agregar un nuevo producto</h2>

<form action="procesar_agregar.php" method="POST" enctype="multipart/form-data">
    
    <label>Nombre:</label><br>
    <input type="text" name="nombre" required><br><br>

    <label>Descripción:</label><br>
    <textarea name="descripcion" required></textarea><br><br>

    <label>Precio:</label><br>
    <input type="number" name="precio" step="0.01" required><br><br>

    <label>Categoría:</label><br>
    <input type="text" name="categoria" required><br><br>

    <label>Imagen principal:</label><br>
    <input type="file" name="imagen" accept="image/*" required><br><br>

    <label>Imágenes secundarias (opcional):</label><br>
    <input type="file" name="galeria[]" multiple accept="image/*"><br><br>

    <button type="submit">Guardar producto</button>
</form>

<br>
<a href="admin_panel.php">Volver al panel</a>

</body>
</html>

<?php
//admin_editar.php
require_once "conexion.php";
session_start();

if (!isset($_SESSION["admin"])) {
    header("Location: login.php");
    exit;
}

$id = intval($_GET['id']);

// producto
$res = $conn->query("SELECT * FROM productos WHERE id=$id");
$prod = $res->fetch_assoc();

// secundarias
$gal = $conn->query("SELECT * FROM fotos_producto WHERE producto_id=$id");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Editar</title>
</head>
<body>

<h2>Editar producto</h2>

<form action="procesar_editar.php" method="POST" enctype="multipart/form-data">
<input type="hidden" name="id" value="<?= $prod['id'] ?>">

Nombre:<br>
<input type="text" name="nombre" value="<?=$prod['nombre']?>" required><br><br>

Descripcion:<br>
<textarea name="descripcion"><?=$prod['descripcion']?></textarea><br><br>

Precio:<br>
<input type="number" name="precio" value="<?=$prod['precio']?>" step="0.01"><br><br>

Categoria:<br>
<input type="text" name="categoria" value="<?=$prod['categoria']?>"><br><br>

Imagen principal:<br>
<img src="../images/<?=$prod['imagen']?>" width="150"><br>
<input type="file" name="imagen"><br><br>

<h3>Imágenes secundarias</h3>

<?php while($r=$gal->fetch_assoc()): ?>
    <img src="../images/<?=$r['imagen']?>" width="120">
    <a href="eliminar_img.php?id=<?=$r['id']?>&p=<?=$id?>">Eliminar</a>
    <br><br>
<?php endwhile; ?>

Agregar más imágenes:<br>
<input type="file" name="galeria[]" multiple><br><br>

<button>Guardar</button>
</form>

<br>
<a href="admin_panel.php">Volver</a>
</body>
</html>

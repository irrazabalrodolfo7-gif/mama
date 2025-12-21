<?php
// admin_panel.php
session_start();
if(!isset($_SESSION['admin'])){
    header("Location: login.php");
    exit;
}

require_once "obtener_productos.php";
$productos = obtenerProductos();
?>
<!DOCTYPE html>
<html>
<head>
<title>Panel Admin</title>
</head>
<body>
<h2>Panel de administración</h2>
<a href="logout.php">Cerrar sesión</a>
<hr>

<h3>Agregar producto</h3>
<form action="procesar_agregar.php" method="POST" enctype="multipart/form-data">
    <input type="text" name="nombre" placeholder="Nombre">
    <input type="text" name="descripcion" placeholder="Descripción">
    <input type="number" name="precio" placeholder="Precio">
    <input type="text" name="categoria" placeholder="Categoría">
    <input type="file" name="imagen">
    <button>Agregar</button>
</form>

<hr>

<h3>Productos cargados</h3>
<table border="1" cellpadding="6">
<tr><th>ID</th><th>Nombre</th><th>Precio</th><th>Imagen</th><th>Acciones</th></tr>

<?php foreach($productos as $p): ?>
<tr>
   <td><?= $p['id'] ?></td>
   <td><?= $p['nombre'] ?></td>
   <td><?= $p['precio'] ?></td>
   

   <td><img src="../images/<?= htmlspecialchars($p['imagen']) ?>" width="60"></td>
   <td>
     <a href="admin_editar.php?id=<?= $p['id'] ?>">Editar</a> |
     <a href="admin_eliminar.php?id=<?= $p['id'] ?>">Eliminar</a>

   </td>
</tr>
<?php endforeach; ?>
</table>

</body>
</html>

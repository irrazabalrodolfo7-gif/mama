<?php
//ver_fotos.php
require_once "php/conexion.php";

$id = intval($_GET['id']);

// producto
$res = $conn->query("SELECT * FROM productos WHERE id=$id");
$prod = $res->fetch_assoc();

// fotos secundarias
$gal = $conn->query("SELECT * FROM productos_imagenes WHERE producto_id=$id");
?>
<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<title><?= $prod['nombre'] ?></title>

<!-- Bootstrap -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>

<div class="container py-4">

    <a href="index.php" class="btn btn-secondary mb-4">← Volver</a>

    <h2><?= $prod['nombre'] ?></h2>
    <p><?= $prod['descripcion'] ?></p>

    <!-- Carousel -->
    <div id="carouselFotos" class="carousel slide" data-bs-ride="carousel">
      
      <div class="carousel-inner">

        <!-- imagen principal -->
        <div class="carousel-item active">
          <img src="images/<?= $prod['imagen'] ?>" class="d-block w-100" alt="">
        </div>

        <!-- recorrer secundarias -->
        <?php while($f = $gal->fetch_assoc()): ?>
          <div class="carousel-item">
            <img src="images/<?= $f['imagen'] ?>" class="d-block w-100" alt="">
          </div>
        <?php endwhile; ?>
      </div>

      <button class="carousel-control-prev" type="button" data-bs-target="#carouselFotos" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>

      <button class="carousel-control-next" type="button" data-bs-target="#carouselFotos" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>

    </div>

</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>

<?php
// Traer los productos desde el backend
require_once "php/obtener_productos.php";
$productos = obtenerProductos(); // devuelve array con todos los productos
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Pamola Creaciones</title>
  <link rel="stylesheet" href="css/style.css">

</head>
<body>

<header>
  <div class="container">
    
    <div style="display:flex;justify-content:flex-end;gap:10px;">
      <a href="php/login.php" class="btn">Iniciar sesión</a>
      <a href="#galeria-real" class="btn ghost">Ver piezas cargadas</a>
    </div>

    <h1>Pamola creaciones</h1>
    <p class="tagline" id="nico" >Piezas artesanales en yeso — figuras, decorativos y diseños personalizados.</p>

    <div class="hero-card">
      <p>Bienvenidos a la vitrina digital de Pamola. Aquí verás piezas reales cargadas por el administrador.</p>
    </div>
  </div>
</header>

<main class="container">

  <h2 id="galeria-real">Catálogo de todas las piezas de yeso:</h2>

  <div class="gallery">
    <?php foreach($productos as $p): ?>
      <article class="card">
        <img class="thumb" src="images/<?php echo $p['imagen']; ?>" alt="<?php echo $p['nombre']; ?>">
        <div class="meta">
          <div class="name"><?php echo $p['nombre']; ?></div>
          <div class="cat"><?php echo $p['categoria']; ?></div>
          <div class="desc"><?php echo $p['descripcion']; ?></div>
          <div class="price-box">Precio: <strong>$<?php echo $p['precio']; ?></strong></div>
          <a href="ver_fotos.php?id=<?= $p['id'] ?>" class="btn-ver-mas">Ver más fotos</a>
        </div>
      </article>
    <?php endforeach; ?>
  </div>

  <section class="moldes">
    <h2>Moldes (Próximamente)</h2>
    <p>Estamos creando y organizando los moldes. </p>
  </section>

  <footer>
    <p>Contacto: pamola@example.com — IG: @pamola.creaciones</p>
  </footer>

</main>

</body>
</html>

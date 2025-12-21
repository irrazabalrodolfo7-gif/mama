<?php
session_start();

// usuario fijo simple
$user = "admin";
$pass = "1234";

if($_POST['user'] === $user && $_POST['pass'] === $pass){
    $_SESSION['admin'] = true;
    header("Location: admin_panel.php");
    exit;
}

// Si llegó acá es porque falló ↑↑
// Mostramos mensaje + botón volver
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Error</title>

    <style>
        .btn-volver{
            display:inline-block;
            padding:10px 18px;
            background:#e91e63;
            color:white;
            text-decoration:none;
            border-radius:8px;
            font-weight:bold;
            margin-top:15px;
        }
        .btn-volver:hover{
            background:#c2185b;
        }
        body{
            text-align:center;
            margin-top:50px;
            font-family:sans-serif;
        }
    </style>
</head>
<body>

<h2>Credenciales incorrectas</h2>

<a class="btn-volver" href="login.php">Volver</a>

</body>
</html>

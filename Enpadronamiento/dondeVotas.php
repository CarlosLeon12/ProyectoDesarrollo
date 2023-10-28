<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Donde Votas</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos.css">
</head>

<style>
    body, html {
    margin: 0;
    padding: 0;
    height: 100%;
    overflow: hidden;
  }
  
  .fullscreen-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
    position: absolute;
    top: 0;
    left: 0;
    z-index: -1;
  }
</style>

<body>
<img class="fullscreen-image" src="https://i.pinimg.com/originals/83/77/c2/8377c28975c559f9ad494e64367dc048.jpg" alt="Imagen a pantalla completa">

    <?php
    include('conexion.php');

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Verifica si se ha enviado un DPI válido
        $dpi = $_POST['dpi'];

        $sql = "SELECT nombre, apellido, numero_mesa FROM votante WHERE dpi = '$dpi'";
        $result = $conexion->query($sql);

        if ($result->num_rows > 0) {
            // Se encontraron resultados, muestra los datos del votante
            $row = $result->fetch_assoc();
            $nombre = $row['nombre'];
            $apellido = $row['apellido'];
            $numeroMesa = $row['numero_mesa'];
        } else {
            // No se encontraron resultados
            $errorMensaje = "No se encontraron resultados para el DPI: $dpi";
        }
    }
    ?>

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="inicio.php">Inicio</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.php">Cerrar Sesión</a>
                </li>
            </ul>
        </div>
        <img class="usuario" src="imagenes/usuario.png" alt="">
        <label class="nav-link navbar-brand nombre-usuario" href="">
            <?php
            // Al iniciar sesión se muestra el nombre
            session_start();
            if (isset($_SESSION['nombre_usuario'])) {
                echo $_SESSION['nombre_usuario'];
            } else {
                // Si no hay nombre "algo imposible" se mostrará este mensaje
                echo "Usuario no identificado";
            }
            ?>
        </label>
    </nav>

    <!-- Formulario para buscar por DPI -->
    <div class="row">
    <div class="col-md-4 mx-auto mt-5">
        <form method="post" class="text-center">
            <div class="form-group">
                <label for="dpi" class="text-center" style="font-size: 25px;">Número de DPI:</label>
                <input type="text" class="form-control mx-auto text" id="dpi" name="dpi" placeholder="Ingrese el número de DPI">
            </div>
            <button type="submit" class="btn btn-primary mx-auto">Buscar</button>
        </form>
    </div>
</div>

  <!-- Mostrar resultados si se encontró un votante -->
<?php if (isset($nombre)): ?>
<div class="text mt-5">
    <h2 class="display-4">Resultado de la búsqueda:</h2>
    <label class="text" style="font-size: 30px;"><strong>Nombre:</strong> <?php echo $nombre; ?></label><br>
    <label class="font-large" style="font-size: 30px;"><strong>Apellido:</strong> <?php echo $apellido; ?></label><br>
    <label class="font-large" style="font-size: 30px;"><strong>Número de Mesa:</strong> <?php echo $numeroMesa; ?></label><br>
</div>
<?php endif; ?>

    <!-- Mostrar mensaje de error si no se encontraron resultados -->
    <?php if (isset($errorMensaje)): ?>
    <div class="container mt-4">
        <div class="alert alert-danger" role="alert">
            <?php echo $errorMensaje; ?>
        </div>
    </div>
    <?php endif; ?>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

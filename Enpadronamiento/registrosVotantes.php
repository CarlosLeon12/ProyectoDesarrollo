<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>
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

    $sql = "SELECT id, nombre, apellido, dpi, municipio, departamento, numero_mesa FROM votante";
    $result = $conexion->query($sql);
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
            //al iniciar sesion se muestra el nombre
            session_start();
            if (isset($_SESSION['nombre_usuario'])) {
                echo $_SESSION['nombre_usuario'];
            } else {
                //si no hay nombre "algo imposible" se mostrara este mensaje
                echo "Usuario no identificado";
            }
            ?>
        </label>
      
    </nav>

    <!-- Área de trabajo -->
    <div>
    
        <?php
        // Comprobar si hay resultados y mostrarlos en la tabla
        if ($result->num_rows > 0) {
            echo '<table class="table table-striped">';
            echo '<thead>';
            echo '<th>Nombre</th>';
            echo '<th>Apellido</th>';
            echo '<th>DPI</th>';
            echo '<th>Municipio</th>';
            echo '<th>Departamento</th>';
            echo '<th>Número de Mesa</th>';
            echo '</tr>';
            echo '</thead>';
            echo '<tbody>';

            while ($row = $result->fetch_assoc()) {
                echo '<tr>';
                echo '<td>' . $row['nombre'] . '</td>';
                echo '<td>' . $row['apellido'] . '</td>';
                echo '<td>' . $row['dpi'] . '</td>';
                echo '<td>' . $row['municipio'] . '</td>';
                echo '<td>' . $row['departamento'] . '</td>';
                echo '<td>' . $row['numero_mesa'] . '</td>';
                echo '</tr>';
            }

            echo '</tbody>';
            echo '</table>';
        } else {
            echo 'No se encontraron resultados.';
        }
        ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

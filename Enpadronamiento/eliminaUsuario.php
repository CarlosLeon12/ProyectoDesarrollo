<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Config User</title>
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

<!--------------------------------------menu bar------------------------------------------------>
<body>
<img class="fullscreen-image" src="https://i.pinimg.com/originals/83/77/c2/8377c28975c559f9ad494e64367dc048.jpg" alt="Imagen a pantalla completa">
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
            //al iniciar sesión se muestra el nombre
            session_start();
            if (isset($_SESSION['nombre_usuario'])) {
                echo $_SESSION['nombre_usuario'];
            } else {
                //si no hay nombre "algo imposible" se mostrará este mensaje
                echo "Usuario no identificado";
            }
            ?>
        </label>
    </nav>

    <!-----------------------------------area de trabajo---------------------------------------------------->

    <?php
    // Conecta a la base de datos y recupera los datos de usuarios
    include('conexion.php');
    $sql = "SELECT * FROM usuarios";
    $result = $conexion->query($sql);
    ?>

    <div>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nombre de Usuario</th>
                    <th>Apellido de Usuario</th>
                    <th>DPI</th>
                    <th>Usuario</th>
                    <th>Contraseña</th>
                    <th>Cargo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['nombre_usuario'] . "</td>";
                    echo "<td>" . $row['apellido_usuario'] . "</td>";
                    echo "<td>" . $row['dpi'] . "</td>";
                    echo "<td>" . $row['usuario'] . "</td>";
                    echo "<td>" . $row['contrasena'] . "</td>";
                    echo "<td>" . $row['cargo'] . "</td>";

                    //botones de accion
                    echo '<td>
                            <a class="btn btn-primary" href="editar.php?id=' . $row['id'] . '">Editar</a>
                            <a class="btn btn-danger" href="eliminar.php?id=' . $row['id'] . '">Eliminar</a>
                          </td>';
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

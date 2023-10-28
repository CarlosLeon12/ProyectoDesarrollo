<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos.css">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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

  .tituloPresidente{
    text-align: center;
  }
</style>

<!--------------------------------------menu bar------------------------------------------------>
<body>

<img class="fullscreen-image" src="https://i.pinimg.com/originals/83/77/c2/8377c28975c559f9ad494e64367dc048.jpg" alt="Imagen a pantalla completa">

    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                <div class="dropdown">
    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownSesion" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        Otros
    </a>

    <!---------aqui se verifica si mi cargo es 1 que es administrador podre crear usuario de lo contrario no----------------------->
    <div class="dropdown-menu" aria-labelledby="navbarDropdownSesion">
        <?php
        session_start();

        // se verifica si el cargo del usuario que inicio sesion es 1
        if (isset($_SESSION['cargo']) && $_SESSION['cargo'] == 1) {
            echo '<a class="dropdown-item" href="crearUsuario.php">Crear Usuario</a>';
            echo '<a class="dropdown-item" href="eliminaUsuario.php">Editar Usuario</a>';
            echo '<a class="dropdown-item" href="registrosVotantes.php">Registros</a>'; // Agregamos el enlace a Registros
        }
        ?>
    </div>
</div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="login.php">Cerrar Sesión</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="registrar.php">Empadronar</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="dondeVotas.php">Donde Votas</a>
                </li>

                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownOpciones" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Votos
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownOpciones">
                    <a class="dropdown-item" href="1grafica-presidente.php">Presidente</a>
                    <a class="dropdown-item" href="2grafica-alcalde.php">Alcalde</a>
                    <a class="dropdown-item" href="3grafica-diputado.php">Diputado</a>
                </div>
            </li>

            
            </ul>
        </div>
        <img class="usuario" src="imagenes/usuario.png" alt="">
       
        <label class="nav-link navbar-brand nombre-usuario" href="">
            <?php
            // Al iniciar sesión, muestra el nombre del usuario
            if (isset($_SESSION['nombre_usuario'])) {
                echo $_SESSION['nombre_usuario'];
            } else {
                // Si no hay nombre de usuario (imposible), muestra un mensaje
                echo "Usuario no identificado";
            }
            ?>
        </label>
    </nav>

    <!-----------------------------------area de trabajo---------------------------------------------------->

    <!---------------------fondo de pantalla------------------------------------------>
    <img class="LogoPrin" src="https://portalweb.tse.org.gt/assets/navIcon.svg" alt="">
    <!----------------------aqui se llama el scrip y se da vida a la grafica---------->
    <div class="container mt-4">
    <canvas class="barra" id="graficaBarras"></canvas>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</html>

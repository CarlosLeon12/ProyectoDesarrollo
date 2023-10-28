<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>New User</title>
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

                <li class="nav-item">
                    <div class="dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarOtros" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Otros
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarOtros">
                            <a class="dropdown-item" href="#">Donde Votas</a>
                            <a class="dropdown-item" href="#">Registro</a>
                        </div>
                    </div>
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

    <!-----------------------------------area de trabajo---------------------------------------------------->

    <img class="LogoPrin" src="https://portalweb.tse.org.gt/assets/navIcon.svg" alt="">

    <div class="container mt-5">
        <form action="guardarUsuario.php" method="post">

            <div class="form-row">
                <div class="col-md-4 mb-4">
                    <input type="text" class="form-control text" id="nombreU" name="nombreU" placeholder="Nombre Usuario" required>
                </div>
                <div class="col-md-4 mb-4">
                    <input type="text" class="form-control text" id="apellidoU" name="apellidoU" placeholder="Apellido Usuario" required>
                </div>
                <div class="col-md-4 mb-5">
                    <input type="text" class="form-control text" id="dpiU" name="dpiU" placeholder="DPI" required>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-4 mb-4">
                    <input type="text" class="form-control text" id="usuarioU" name="usuarioU" placeholder="Usuario" required>
                </div>
                <div class="col-md-4 mb-4">
                    <input type="password" class="form-control text" id="passwordU" name="passwordU" placeholder="Contraseña" required>
                </div>
                <div class="col-md-4 mb-5">
                    <input type="text" class="form-control text" id="cargoU" name="cargoU" placeholder="Cargo" required>
                </div>
            </div>

            <div class="form-row">
                <div class="col-md-12">
                    <button type="submit" class="btn btn-primary btn-block arriba">Guardar</button>
                </div>
            </div>

        </form>
    </div>


    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

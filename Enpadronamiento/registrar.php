<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empadronamiento</title>
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
<div id="mensajeAlerta" class="alert alert-danger" style="display: none;"></div>
<img class="fullscreen-image" src="https://i.pinimg.com/originals/83/77/c2/8377c28975c559f9ad494e64367dc048.jpg" alt="Imagen a pantalla completa">

    <!-------------------------------------------menu bar---------------------------------------------->

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
                            <a class="dropdown-item" href="dondeVotas.php">Donde Votas</a>
                            <a class="dropdown-item" href="registrosVotantes.php">Registros</a>
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

    <img class="LogoPrin" src="https://portalweb.tse.org.gt/assets/navIcon.svg" alt="">

    <!-----------------------------------------campos------------------------------------------------------------->

    <div class="container mt-5">

        <form action="guardar.php" method="post">

            <div class="form-row">
                <div class="col-md-4 mb-4">
                    <input type="text" class="form-control text" id="nombreV" name="nombreV" placeholder="Nombres" required>
                </div>
                <div class="col-md-4 mb-4">
                    <input type="text" class="form-control text" id="apellidoV" name="apellidoV" placeholder="Apellidos" required>
                </div>
                <div class="col-md-4 mb-5">
                    <input type="text" class="form-control text" id="dpiV" name="dpiV" placeholder="DPI" required>
                </div>
            </div>

            <div class="form-row">
            <div class="col-md-4 mb-4">
        <select class="form-control" id="departamento" name="departamento" required>
            <option value="">Selecciona un departamento</option>
        </select>
    </div>
    <div class="col-md-4 mb-4">
        <select class="form-control" id="municipio" name="municipio" required>
            <option value="">Selecciona un municipio</option>
        </select>
    </div>
                <div class="col-md-4 mb-5">
                    <input type="text" class="form-control text" id="mesaV" name="mesaV" placeholder="No. Mesa" required>
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

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    
<script>
$(document).ready(function() {
    $("form").on("submit", function(event) {
        event.preventDefault();
        
        $.ajax({
    url: "guardar.php",
    type: "POST",
    data: $(this).serialize(),
    success: function(response) {
        if (response === "Guardado Exitosamente") {
            $("#mensajeAlerta").html("Guardado Exitosamente");
            $("#mensajeAlerta").removeClass("alert-danger").addClass("alert-success");
            $("#mensajeAlerta").show();
        } else {
            $("#mensajeAlerta").html(response);
            $("#mensajeAlerta").show();
        }
    }
});


    });
});
</script>

<script>
$(document).ready(function() {
    // Cargar departamentos al cargar la página
    $.ajax({
        url: "cargar_departamentos.php", // Crea un archivo PHP para cargar departamentos
        method: "GET",
        success: function(data) {
            $("#departamento").html(data);
        }
    });

    // Manejar el cambio en el combo de departamentos
    $("#departamento").change(function() {
        var departamentoId = $(this).val();

        // Cargar municipios basados en el departamento seleccionado
        $.ajax({
            url: "cargar_municipios.php", // Crea un archivo PHP para cargar municipios
            method: "POST",
            data: { departamento_id: departamentoId },
            success: function(data) {
                $("#municipio").html(data);
            }
        });
    });

    // Manejar el envío del formulario
    $("form").on("submit", function(event) {
    event.preventDefault();

    $.ajax({
    url: "guardar.php",
    type: "POST",
    data: $(this).serialize(),
    success: function(response) {
        if (response === "Guardado Exitosamente") {
            $("#mensajeAlerta").html("Guardado Exitosamente");
            $("#mensajeAlerta").show();
        } else {
           
        }

        setTimeout(function() {
                    location.reload();
                }, 3000); // Recargar la página después de 3 segundos, independientemente del resultado

    }
});
});
});

</script>

</body>

</html>


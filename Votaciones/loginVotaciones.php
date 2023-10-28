<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="estilos.css">

    <script>
    $(document).ready(function () {
    // Verificar si hay un mensaje de alerta en la URL
    const urlParams = new URLSearchParams(window.location.search);
    const alertParam = urlParams.get('alert');
    
    if (alertParam === '1') {
        // Mostrar la alerta
        $("#errorAlert").text("Mensaje de alerta específico en loginVotaciones.php.");
        $("#errorAlert").show();
    }
});
</script>


</head>
<body>
    <!-----------------fondos de pantalla---------------------->
    <div id="background-container">
        <img src="https://4.bp.blogspot.com/-L5N-u4qmOv4/VPEuakHE84I/AAAAAAAAAOs/bzuGbHjVCrY/s1600/calle-antigua-guatemala-del-arco-santa-catalina-228733.jpg" alt="Imagen 1" class="background-image active">
        <img src="https://c.wallhere.com/photos/0f/0d/landscape_Guatemala_volcano_eruptions_city_mountains_night_night_sky-1402391.jpg!d" alt="Imagen 2" class="background-image">
        <img src="https://mymodernmet.com/wp/wp-content/uploads/2020/05/Quetzal-2.jpg" alt="Imagen 3" class="background-image">
        <img src="https://www.guatemala.com/fotos/201801/Tikal-en-Peten.jpg" alt="Imagen 4" class="background-image">
        <img src="https://th.bing.com/th/id/R.8f1eddb5e260b9043235071fcf0efc17?rik=jeA8Ew5NwvjPow&riu=http%3a%2f%2fk32.kn3.net%2ftaringa%2f4%2f3%2f0%2f6%2f9%2f7%2f7%2fsagaa012%2fFAD.jpg%3f1684&ehk=3yDTcxJ7XR6lLn7PUsbqgelcASLDLN3eW73%2f9zL41KA%3d&risl=&pid=ImgRaw&r=0" alt="Imagen 5" class="background-image">
    </div>
    
    <!---------------------formulario-------------------------------->
    <div class="container">
    <form class="login-form" id="login-form" action="validacion.php" method="post">
        <h2 class="text-center">Utilice su DPI para iniciar sesión</h2>
        <div class="form-group">
            <label for="dpi">DPI</label>
            <input type="text" class="form-control Vdpi" id="dpi" name="dpi" placeholder="Introduzca su DPI">
        </div>
        <button type="submit" class="btn btn-primary btn-block">Iniciar Sesión</button><br><br>
    </form>
    
    <div class="alert alert-danger" id="errorAlert" style="display: none;"></div>
    <script src="script.js"></script>
</div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="script.js"></script>
</body>
</html>

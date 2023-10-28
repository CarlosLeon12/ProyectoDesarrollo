<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Conexión a la base de datos
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "votaciones";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Verificar la conexión
    if ($conn->connect_error) {
        die("Error en la conexión a la base de datos: " . $conn->connect_error);
    }

    // Obtener el DPI del formulario
    $dpi = $_POST['dpi'];

    // Consultar si el DPI existe en la tabla votante
    $sql = "SELECT * FROM votante WHERE dpi = '$dpi'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // La persona ya se ha empadronado
        // Se verifica si ya ha votado

        $sql = "SELECT * FROM registrosdevotos WHERE dpi = '$dpi'";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // El usuario ya ha votado
            header("Location: 1error.html");
        } else {
            // El usuario no ha votado, procede a insertar en registrosdevotos y redirigir a presidente.php
            $insertSql = "INSERT INTO registrosdevotos (dpi) VALUES ('$dpi')";
            if ($conn->query($insertSql) === TRUE) {
                header("Location: presidente.php");
            } else {
               
            }
        }
    } else {
        header("Location: 2error.html");
    }

    $conn->close();
}
?>

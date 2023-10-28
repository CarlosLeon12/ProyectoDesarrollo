<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "votaciones";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error en la conexión a la base de datos: " . $conn->connect_error);
}

// Recupera los datos del formulario
$nombre = $_POST['nombreV'];
$apellido = $_POST['apellidoV'];
$dpi = $_POST['dpiV'];
$municipio_id = $_POST['municipio'];
$departamento_id = $_POST['departamento'];
$numero_mesa = $_POST['mesaV'];

// Consultas SQL para obtener el nombre del municipio y el departamento
$sql_municipio = "SELECT nombre FROM municipios WHERE id = $municipio_id";
$sql_departamento = "SELECT nombre FROM departamentos WHERE id = $departamento_id";

$result_municipio = $conn->query($sql_municipio);
$result_departamento = $conn->query($sql_departamento);

if ($result_municipio->num_rows > 0 && $result_departamento->num_rows > 0) {
    $row_municipio = $result_municipio->fetch_assoc();
    $row_departamento = $result_departamento->fetch_assoc();

    $nombre_municipio = $row_municipio['nombre'];
    $nombre_departamento = $row_departamento['nombre'];

    // Consulta SQL para verificar si el DPI ya existe
    $sql_check_dpi = "SELECT COUNT(*) as count FROM votante WHERE dpi = '$dpi'";

    $result_check_dpi = $conn->query($sql_check_dpi);

    if ($result_check_dpi->num_rows > 0) {
        $row_check_dpi = $result_check_dpi->fetch_assoc();
        $dpi_count = $row_check_dpi['count'];

        if ($dpi_count > 0) {
            echo "El DPI '$dpi' ya está registrado en la base de datos.";
        } else {
            // El DPI no existe en la base de datos
            $sql_insert = "INSERT INTO votante (nombre, apellido, dpi, municipio, departamento, numero_mesa)
                          VALUES ('$nombre', '$apellido', '$dpi', '$nombre_municipio', '$nombre_departamento', '$numero_mesa')";

            if ($conn->query($sql_insert) === TRUE) {
               
            } else {
    
            }
        }
    } else {
        echo "Error al verificar el DPI.";
    }
} else {
    echo "Error al obtener los nombres de municipio o departamento.";
}

$conn->close();
?>

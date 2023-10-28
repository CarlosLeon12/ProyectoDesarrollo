<?php
// Conexión a la base de datos (Asegúrate de configurar tus propias credenciales)
$host = 'localhost';
$usuario = 'root';
$contrasena = '';
$base_de_datos = 'votaciones';

$conn = new mysqli($host, $usuario, $contrasena, $base_de_datos);

if ($conn->connect_error) {
    die("La conexión a la base de datos ha fallado: " . $conn->connect_error);
}

// Consulta para obtener los departamentos
$sql = "SELECT id, nombre FROM departamentos";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $optionsHTML = '<option value="">Selecciona un departamento</option>';
    while ($row = $result->fetch_assoc()) {
        $optionsHTML .= '<option value="' . $row['id'] . '">' . $row['nombre'] . '</option>';
    }
    echo $optionsHTML;
} else {
    echo '<option value="">No se encontraron departamentos</option>';
}

$conn->close();
?>

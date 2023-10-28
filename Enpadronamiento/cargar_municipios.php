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

if (isset($_POST['departamento_id'])) {
    $departamento_id = $_POST['departamento_id'];

    // Consulta para obtener los municipios basados en el departamento seleccionado
    $sql = "SELECT id, nombre FROM municipios WHERE departamento_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $departamento_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $optionsHTML = '<option value="">Selecciona un municipio</option>';
        while ($row = $result->fetch_assoc()) {
            $optionsHTML .= '<option value="' . $row['id'] . '">' . $row['nombre'] . '</option>';
        }
        echo $optionsHTML;
    } else {
        echo '<option value="">No se encontraron municipios</option>';
    }

    $stmt->close();
}

$conn->close();
?>

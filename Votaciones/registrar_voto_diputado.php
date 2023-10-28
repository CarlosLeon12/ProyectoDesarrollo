<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "votaciones";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Recibe los datos de votación desde la solicitud POST
$data = json_decode(file_get_contents('php://input'), true);
$partido = $data['partido'];

// Realiza la actualización de votos en la tabla de diputado
$sql = "UPDATE diputado_votos SET votos = votos + 1 WHERE partido = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("s", $partido);

// Ejecuta la consulta sin verificar explícitamente el resultado
$stmt->execute();

$stmt->close();
$conn->close();

?>
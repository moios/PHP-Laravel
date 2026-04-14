# para ejecutar el programa: http://localhost/julio_php/PHP-Laravel/index.html
<?php
header("Content-Type: application/json");

// conexión
$conn = new mysqli("localhost", "root", "root", "notes_api");

if ($conn->connect_error) {
    echo json_encode(["error" => "Conexión fallida"]);
    exit;
}

// método
$method = $_SERVER['REQUEST_METHOD'];

// rutas simples
$action = $_GET['action'] ?? '';

switch ($action) {

    case 'list':
        $result = $conn->query("SELECT * FROM notes");
        $data = [];

        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }

        echo json_encode($data);
        break;

    case 'get':
        $id = $_GET['id'] ?? 0;

        $stmt = $conn->prepare("SELECT * FROM notes WHERE id=?");
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        echo json_encode($result->fetch_assoc());
        break;

    case 'create':
        if ($method !== 'POST') {
            echo json_encode(["error" => "Usa POST"]);
            break;
        }

        $title = $_POST['title'] ?? '';
        $content = $_POST['content'] ?? '';

        $stmt = $conn->prepare("INSERT INTO notes (title, content) VALUES (?, ?)");
        $stmt->bind_param("ss", $title, $content);

        if ($stmt->execute()) {
            echo json_encode(["success" => true]);
        } else {
            echo json_encode(["error" => "No se pudo crear"]);
        }
        break;

    case 'delete':
        $id = $_GET['id'] ?? 0;

        $stmt = $conn->prepare("DELETE FROM notes WHERE id=?");
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            echo json_encode(["deleted" => true]);
        } else {
            echo json_encode(["error" => "Error al eliminar"]);
        }
        break;

    default:
        echo json_encode([
            "message" => "API de Notas",
            "endpoints" => [
                "?action=list",
                "?action=get&id=1",
                "?action=create (POST)",
                "?action=delete&id=1"
            ]
        ]);
}
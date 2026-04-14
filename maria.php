<?php
// Archivo donde se guardan los votos
$archivo = "votos.txt";

// Inicializar votos si el archivo no existe
if (!file_exists($archivo)) {
    file_put_contents($archivo, "0|0");
}

// Leer votos
$contenido = file_get_contents($archivo);
$votos = explode("|", $contenido);

$libro1 = $votos[0];
$libro2 = $votos[1];

// Procesar voto
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["libro"])) {
        if ($_POST["libro"] == "1") {
            $libro1++;
        } elseif ($_POST["libro"] == "2") {
            $libro2++;
        }

        // Guardar nuevos votos
        file_put_contents($archivo, $libro1 . "|" . $libro2);

        // Recargar para evitar reenvío
        header("Location: index.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Club de Lectura</title>
</head>
<body>

<h2>📚 Votación del Club de Lectura</h2>

<form method="POST">
    <p>Elige el próximo libro:</p>

    <input type="radio" name="libro" value="1" required>
    <label>El Principito</label><br><br>

    <input type="radio" name="libro" value="2">
    <label>Cien Años de Soledad</label><br><br>

    <button type="submit">Votar</button>
</form>

<h3>Resultados:</h3>
<p>El Principito: <?php echo $libro1; ?> votos</p>
<p>Cien Años de Soledad: <?php echo $libro2; ?> votos</p>

</body>
</html>
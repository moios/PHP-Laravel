<?php
// Archivo creado por Dariuxpy
// Sistema de votación: Comida favorita

$archivo = "comida.txt";

// Inicializar votos si no existe el archivo
if (!file_exists($archivo)) {
    file_put_contents($archivo, "0|0");
}

// Leer votos
$contenido = file_get_contents($archivo);
$votos = explode("|", $contenido);

$hamburguesa = $votos[0];
$pizza = $votos[1];

// Procesar voto
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["comida"])) {
        if ($_POST["comida"] == "1") {
            $hamburguesa++;
        } elseif ($_POST["comida"] == "2") {
            $pizza++;
        }

        // Guardar votos
        file_put_contents($archivo, $hamburguesa . "|" . $pizza);

        // Recargar página
        header("Location: dario.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Votación de Comida</title>
</head>
<body>

<h2>🍽️ Votación de Comida Favorita</h2>

<form method="POST">
    <p>Elige tu comida favorita:</p>

    <input type="radio" name="comida" value="1" required>
    <label>Hamburguesa</label><br><br>

    <input type="radio" name="comida" value="2">
    <label>Pizza</label><br><br>

    <button type="submit">Votar</button>
</form>

<h3>Resultados:</h3>
<p>Hamburguesa: <?php echo $hamburguesa; ?> votos</p>
<p>Pizza: <?php echo $pizza; ?> votos</p>

</body>
</html>
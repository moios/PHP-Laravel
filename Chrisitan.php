<?php
// Configuración de estilo y colores
$bg_color = "#0d1117"; // Fondo estilo GitHub
$text_color = "#e6edf3";
$accent_color = "#2f81f7";

echo "<!DOCTYPE html>
<html lang='es'>
<head>
    <meta charset='UTF-8'>
    <title>Presentación de Christian Aguilar</title>
    <style>
        body {
            background-color: $bg_color;
            color: $text_color;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            height: 100vh;
            margin: 0;
            overflow: hidden;
        }

        /* Animación de entrada para el título */
        .header {
            margin-top: 50px;
            text-align: center;
            animation: fadeInDown 1.5s ease-out;
        }

        h1 {
            font-size: 2.5rem;
            margin-bottom: 30px;
        }

        /* Contenedor de links con retraso */
        .links-container {
            display: flex;
            flex-direction: column;
            gap: 20px;
            align-items: center;
            animation: fadeInUp 2s ease-out;
        }

        a {
            color: $accent_color;
            text-decoration: none;
            font-size: 1.2rem;
            padding: 10px 20px;
            border: 1px solid $accent_color;
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        a:hover {
            background-color: $accent_color;
            color: white;
            transform: scale(1.1);
        }

        /* Keyframes para las animaciones */
        @keyframes fadeInDown {
            from { opacity: 0; transform: translateY(-50px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(50px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .video-label {
            margin-top: 10px;
            font-weight: bold;
            color: #8b949e;
        }
    </style>
</head>
<body>

    <div class='header'>
        <h1>Hola a todos soy Christian Aguilar</h1>
    </div>

    <div class='links-container'>";
        
        // Definimos los links en un array de PHP
        $links = [
            "Mi GitHub" => "https://github.com/ChistianAguilar",
            "Video que les recomiendo" => "https://youtu.be/c5Gwx0RcxNE",
            "Mi Portfolio (Próximamente)" => "#",
            "Documentación de Git" => "https://git-scm.com/doc"
        ];

        // Usamos PHP para iterar y mostrar los links
        foreach ($links as $texto => $url) {
            echo "<span class='video-label'>$texto</span>";
            echo "<a href='$url' target='_blank'>$url</a>";
        }

echo "    </div>

</body>
</html>";
?>
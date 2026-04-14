<!DOCTYPE html>
<html>

<head>
    # Ejercicio 1.5 - Realice un script php que imprima una tabla de 15 filas y 3 columnas. El aspecto debe ser como en el ejemplo. Utilice estructuras de repetición y sentencias condicionales para resolverlo.
    # Realizado por Pablo Benitez
    <meta charset="UTF-8">
    <title>practica 5</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
</head>

<body>
    <div class="container">
        <table class="table table-bordered table-striped">
            <thead class="table-dark">
                <tr>
                    <?php
                    for ($i = 1; $i <= 3; $i++) {
                        echo "<th><br></th>";
                    }
                    ?>
                </tr>
            </thead>
            <tbody>
                <?php
                for ($i = 1; $i <= 15; $i++) {
                    echo "<tr>";
                    for ($j = 1; $j <= 3; $j++) {
                        echo "<td><br></td>";
                    }
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</body>

</html>
<?php
// Establecer la conexión con la base de datos
$link = new PDO('mysql:host=localhost;dbname=micro', 'root', '');

// Consulta a nuestra base de datos
$sql = 'SELECT suenos.contador as contador, suenos.duracion, suenos.fecha FROM suenos INNER JOIN usuario ON suenos.id=usuario.id';

// Ejecutar la consulta
$stmt = $link->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Documento</title>
    <link rel="stylesheet" href="estilos.css">
</head>
<body>
    <table>
        <tr>
            <th>Duracion</th>
            <th>Fecha</th>
        </tr>
        
        <?php 
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $duracion = $row['duracion'];
            $fecha = $row['fecha'];
        ?>

        <tr>
            <td><?php echo $duracion; ?></td>
            <td><?php echo $fecha; ?></td>
        </tr>
        <?php 
        }
        ?>
    </table>
</body>
</html>
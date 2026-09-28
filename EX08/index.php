<!-- CREAR ARRAY ASOCIATIVO CON:
 
    -Nombre
    -Curso
    -Edat
    -Nota_media

    10 alumnos

    MOSTRAR EN HTML
-->
<?php
$alumnes = [
    ['nom' => 'A', 'curso' => 'Primero', 'edat' => 50, 'nota_media' => 7],
    ['nom' => 'B', 'curso' => 'Primero', 'edat' => 50, 'nota_media' => 9],
    ['nom' => 'C', 'curso' => 'Primero', 'edat' => 50, 'nota_media' => 3],
    ['nom' => 'D', 'curso' => 'Primero', 'edat' => 50, 'nota_media' => 1],
    ['nom' => 'E', 'curso' => 'Primero', 'edat' => 50, 'nota_media' => 3],
    ['nom' => 'F', 'curso' => 'Primero', 'edat' => 50, 'nota_media' => 5],
    ['nom' => 'G', 'curso' => 'Primero', 'edat' => 50, 'nota_media' => 7],
    ['nom' => 'H', 'curso' => 'Primero', 'edat' => 50, 'nota_media' => 8],
    ['nom' => 'I', 'curso' => 'Primero', 'edat' => 50, 'nota_media' => 10],
    ['nom' => 'J', 'curso' => 'Primero', 'edat' => 50, 'nota_media' => 7],
];
?>
// count($a)	
// in_array($x, $a, true)	
// array_key_exists('k',$a)	
// sort / rsort / ksort	
// array_sum / max / min	
// array_column($a, 'preu')	
// implode(',',$a) / explode


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla</title>
</head>
<body>
    <table border = "2">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Curso</th>
                <th>Edad</th>
                <th>Nota media</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($alumnes as $a): ?>
                <tr>
                    <td><?= $a['nom'] ?></td>
                    <td><?= $a['curso'] ?></td>
                    <td><?= $a['edat'] ?></td>
                    <td><?= $a['nota_media'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
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

// array_column: treu una columna sencera
$notas = array_column($alumnes, 'nota_media');
$noms  = array_column($alumnes, 'nom');

// sort i rsort: treballem amb còpies perquè modifiquen l'array
$asc = $notas;
sort($asc);

$desc = $notas;
rsort($desc);

// ksort: ordena per clau (el fem sobre el primer alumne)
$primer = $alumnes[0];
ksort($primer);

// explode: de text a array
$lletres = explode(',', 'A,B,C');
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Alumnes</title>
</head>
<body>

    <h2>Taula d'alumnes</h2>
    <table border="2">
        <tr>
            <th>Nom</th>
            <th>Curs</th>
            <th>Edat</th>
            <th>Nota mitjana</th>
        </tr>
        <?php foreach ($alumnes as $a): ?>
            <tr>
                <td><?= $a['nom'] ?></td>
                <td><?= $a['curso'] ?></td>
                <td><?= $a['edat'] ?></td>
                <td><?= $a['nota_media'] ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

    <h2>Exemples de funcions</h2>

    <p><b>count($alumnes)</b> → <?= count($alumnes) ?></p>

    <p><b>in_array(7, $notas, true)</b> → <?php var_dump(in_array(7, $notas, true)); ?></p>
    <p><b>in_array('7', $notas, true)</b> → <?php var_dump(in_array('7', $notas, true)); ?></p>

    <p><b>array_key_exists('nom', $alumnes[0])</b> → <?php var_dump(array_key_exists('nom', $alumnes[0])); ?></p>
    <p><b>array_key_exists('preu', $alumnes[0])</b> → <?php var_dump(array_key_exists('preu', $alumnes[0])); ?></p>

    <p><b>sort($notas)</b> → <?= implode(', ', $asc) ?></p>
    <p><b>rsort($notas)</b> → <?= implode(', ', $desc) ?></p>
    <p><b>ksort($alumnes[0])</b> → <?= implode(', ', array_keys($primer)) ?></p>

    <p><b>array_sum($notas)</b> → <?= array_sum($notas) ?></p>
    <p><b>max($notas)</b> → <?= max($notas) ?></p>
    <p><b>min($notas)</b> → <?= min($notas) ?></p>
    <p><b>Mitjana (array_sum / count)</b> → <?= array_sum($notas) / count($notas) ?></p>

    <p><b>array_column($alumnes, 'nota_media')</b> → <?= implode(', ', $notas) ?></p>
    <p><b>array_column($alumnes, 'nom')</b> → <?= implode(', ', $noms) ?></p>

    <p><b>implode(', ', $noms)</b> → <?= implode(', ', $noms) ?></p>
    <p><b>explode(',', 'A,B,C')</b> → <?php print_r($lletres); ?></p>

</body>
</html>
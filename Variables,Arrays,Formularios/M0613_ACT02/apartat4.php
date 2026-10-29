<!-- EXERCICI 1 -->
<?php
$concerts = [
    ['nom' => 'Oques Grasses',  'escenari' => 'Gran',  'hora' => '22:30', 'assistents' => 4200, 'preu' => 28.0],
    ['nom' => 'Mushkaa',        'escenari' => 'Petit', 'hora' => '20:00', 'assistents' => 1850, 'preu' => 18.0],
    ['nom' => 'Figa Flawas',    'escenari' => 'Gran',  'hora' => '00:30', 'assistents' => 3600, 'preu' => 24.0],
    ['nom' => 'Julieta',        'escenari' => 'Petit', 'hora' => '21:15', 'assistents' => 2100, 'preu' => 20.0],
    ['nom' => 'Txarango',       'escenari' => 'Gran',  'hora' => '23:30', 'assistents' => 5100, 'preu' => 32.0],
    ['nom' => 'La Ludwig Band', 'escenari' => 'Petit', 'hora' => '18:45', 'assistents' => 900,  'preu' => 15.0],
];


 ?>

<!-- EXERCICI 2 -->

<?php
    $escenaris = [
    'Gran' => [
        'capacitat' => 6000,
        'coberta'   => 'no',
        'ubicacio'  => 'Pista central',
    ],
    'Petit' => [
        'capacitat' => 2500,
        'coberta'   => 'sí',
        'ubicacio'  => 'Pavelló',
    ],
];

?>
 <!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <title>Cartell de concerts</title>
</head>
<body>

<table border="1" cellpadding="5">
    <tr>
        <th>Nom</th>
        <th>Escenari</th>
        <th>Hora</th>
        <th>Assistents</th>
        <th>Preu</th>
    </tr>
    <?php foreach ($concerts as $concert): ?>
        <tr>
            <td><?= $concert['nom'] ?></td>
            <td><?= $concert['escenari'] ?></td>
            <td><?= $concert['hora'] ?></td>
            <td><?= $concert['assistents'] ?></td>
            <td><?= number_format($concert['preu'], 2, ',', '.') ?> €</td>
        </tr>
    <?php endforeach; ?>
</table>

<p>Tercer concert: <?= $concerts[2]['nom'] ?></p>


<p>Capacitat de l'escenari Gran: <?= $escenaris['Gran']['capacitat'] ?></p>

<?php foreach ($escenaris as $nomEscenari => $dades): ?>
    <h3><?= $nomEscenari ?></h3>
    <ul>
        <?php foreach ($dades as $camp => $valor): ?>
            <li><?= $camp ?>: <?= $valor ?></li>
        <?php endforeach; ?>
    </ul>
<?php endforeach; ?>
</body>
</html>
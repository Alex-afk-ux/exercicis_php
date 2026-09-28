<?php

$nota = 7.5;
$estoc = 4;
$zona = 'local';
$saldo = 1000;
$objectiu = 5000;
$anys = 0;
$color = "";
$valor = "";

if($nota >= 9){
    $qualif = 'Excel·lent';
} elseif($nota >= 7){
    $qualif = 'Notable';

}elseif($nota >= 5){
    $qualif = 'suficient';
}else{
    $qualif = 'Insuficient';
}
?>
// <!-- if (...): ... endif;   foreach (...) : .... endforeach -->

<?php if($estoc > 0) { ?>
<p>En Estoc</p>
<?php } else { ?>
    <p>Esgotat</p>
<?php } ?>
// <!-- for (...): ...  endfor;    while (...): ... endwhile -->
<?php if($estoc > 0): ?>
    <p>En estoc</p>
<?php else: ?>
    <p>Esgotat</p>
<?php endif; ?>

<?php
switch ($zona){
    case 'local':
        $enviament = 0;
        break;
    case 'peninsula':
        $enviament = 0;
        break;
    default:
        $enviament = 9.95;
}
?>

<?php
$enviament = match ($zona){
    'local' => 0,
    'peninsula' => 4.95,
    default => 9.95,
};
?>
<?php
// <!-- FOR -->
 for($i = 1; $i <= 10; $i++){
    echo $i;
 }

//  <!-- WHILE -->
while($saldo < $objectiu){
    $saldo *= 1.93;
    $anys++;
}
// <!-- DO-WHILE -->
 do{
    $n = rand(1,6);
 }while($n !== 6);
?>


<?php
$colors = ['vermell', 'verd', 'blau'];
echo $colors[0];        // vermell
echo count($colors);    // 3

$colors[] = 'groc';     // añade 'groc' al final
print_r($colors);
?>

<?php
$producte = [
    'nom' => 'Teclat mecanic',
    'preu' => 79.90,
    'estoc' => 4,
    
];
echo $producte['nom'];
$producte['preu'] = 69.90;
?>

<?php
    foreach($colors as $colors){
        echo "<li>$color</li>";
    }

    foreach ($producte as $clau => $valor){
        echo "<dt>$clau</dt>";
        echo "<dd>$valor</dd>";
    }
?>
<!-- ARRAY ASSOCIATIVO -->
<?php
    $productes = [
        ['nom' => 'Teclat', 'preu' => 79.9],
        ['nom' => 'Ratoli', 'preu' => 24.5],
        ['nom' => 'Monitor', 'preu' => 189],
    ];
?>

<?php foreach ($productes as $p): ?>
        <tr>
            <td><?= $p['nom'] ?></td>
            <td><?= $p['preu'] ?>EUR</td>
        </tr>
<?php endforeach;?>

<?php
    // 
?>


 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabla</title>
 </head>
 <style>
    body {
    font-family: "Segoe UI", Arial, sans-serif;
    background: #f4f6fb;
    margin: 0;
    padding: 2rem;
}
 
/* Contenedor con scroll horizontal en pantallas pequeñas */
table {
    width: 100%;
    max-width: 1200px;
    margin: 0 auto;
    border-collapse: collapse;
    background: #ffffff;
    border: none; /* anula el border="3" del HTML */
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 4px 14px rgba(0, 0, 0, 0.1);
}
 
thead {
    background: #4f46e5;
    color: #ffffff;
}
 
th {
    padding: 14px 12px;
    font-family: "Consolas", "Courier New", monospace;
    font-size: 0.85rem;
    font-weight: 600;
    text-align: left;
    border-right: 1px solid rgba(255, 255, 255, 0.2);
}
 
th:last-child,
td:last-child {
    border-right: none;
}
 
td {
    padding: 14px 12px;
    font-size: 0.9rem;
    color: #333333;
    vertical-align: top;
    border-right: 1px solid #e5e7eb;
    line-height: 1.4;
}
 
tbody tr:hover {
    background: #eef2ff;
}
 
/* Responsive: scroll horizontal en móvil */
@media (max-width: 900px) {
    table {
        display: block;
        overflow-x: auto;
        white-space: nowrap;
    }
}
 
 </style>
 <body>
    <table>
        <?php for ($i = 1; $i <= 10; $i++): ?>
            <tr>
                <td><?= $i ?> x 7</td>
            <td><?= $i * 7 ?></td>
            </tr>
            <?php endfor; ?>
    </table>

    <table border = "3">
        <thead>
        <tr>
            <th>count($a)</th>
            <th>in_array($x, $a, true)</th>
            <th>array_key_exists('k',$a)</th>
            <th>sort / rsort / ksort</th>
            <th>array_sum / max / min</th>
            <th>array_column($a, 'preu')</th>
            <th>implode(',',$a) / explode</th>
        </tr>
        </thead>
        <tbody>
            <td>Quants Elements te</td>
            <td>Si un valor hi es (el true fa la comparacio estricta)</td>
            <td>Si una clau existeis</td>
            <td>Ordena per valor o per clau</td>
            <td>Suma,màxim i minim</td>
            <td>treu una columna d'un array d'arrays</td>
            <td>Array a text i text a array</td>
        </tbody>
    </table>
 </body>
 </html>
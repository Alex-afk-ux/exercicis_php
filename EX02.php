<?php
// Declaramos una constante IVA
const IVA = 0.21;

$producte = 'Teclat';
$base = 79.90;
$estoc = 4;
// Funcion predefinida de redondear 2 decimales round
$total = round($base * (1+IVA), 2);

$titulo = 'Dades Personals';
$nom = 'Pedro';
$cognom = 'Piqueras';
$direccio = 'Calle Lavamanos';
?>

<h2><?php echo $producte?></h2>
<p>Preu amb IVA: <?= $total;?> EUR</p>
<p>Disponibilitat: <?= $estoc?></p>



<h2><?php echo $titulo?></h2>
<p>Nom: <?= $nom;?></p>
<p>Cognom: <?= $cognom?></p>
<p>Direccio: <?= $direccio?></p>

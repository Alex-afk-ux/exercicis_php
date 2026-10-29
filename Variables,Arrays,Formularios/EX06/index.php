<?php

define('BOTIGA', 'Tienda Online Guay');
define('MONEDA', 'Euros');
define('IVA', 0.21);              
const DESCOMPTE_SOCI = 0.10;      
 

$nomProducte        = 'Camiseta Guay';
$descripcioProducte = 'Camiseta chupi guay';
$preuSenseIva       = 99.99;
$unitatsDisponibles = 5;
$referencia         = 'CAM-1425376';
 

$importIva = $preuSenseIva * IVA;
$total     = $preuSenseIva + $importIva;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= BOTIGA ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1><?= BOTIGA ?></h1>
        <p>Esto es un tienda online guay</p>
    </header>
 
    <main>
        <article class="producte">
            <h2><?= $nomProducte ?></h2>
            <p class="descripcio"><?= $descripcioProducte ?></p>
            <p class="preu">Preu sense IVA: <?= number_format($preuSenseIva, 2, ',', '.') ?> <?= MONEDA ?></p>
            <p class="preu">IVA (<?= IVA * 100 ?>%): <?= number_format($importIva, 2, ',', '.') ?> <?= MONEDA ?></p>
            <p class="total">TOTAL: <?= number_format($total, 2, ',', '.') ?> <?= MONEDA ?></p>
 
            <p class="estoc">Unitats disponibles: <?= $unitatsDisponibles ?></p>
            <p class="ref"><?= $referencia ?></p>
 
        </article>
    </main>
 
    <footer>
        <p>Footer de la tienda chupi guay S.L</p>
    </footer>
</body>
</html>

<!-- Puja totes les dades a un bloc php al capdemunt del fitxer
 Substitueix cada valor HTL per  i fes que IVA i el total es calculin sol
 Defineix les constants IVA,BOTIGA,MONEDA i DESCOMPTE_SOCI amb define() o const
 Substitueix el teu index.php tots els valors fixos per les constants
 Intenta canviar el valor d'una constant a mitja pagina i anota l'error de dona
 Busca com fer-ho amb number_format per modificar com es veu el preu -->
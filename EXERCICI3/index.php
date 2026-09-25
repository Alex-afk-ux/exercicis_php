<?php
    // ---------- Constants amb les regles del joc ----------
    const NOM_JOC = 'Llegendes de Thalmoria';
    const VIDA_MAXIMA = 150;
    const EXPERIENCIA_PER_NIVELL = 1000;
    const FORCA_MAXIMA = 100;
    const PERCENT_FERIT = 30;

    // ---------- Dades del personatge ----------
    $nom = 'Aldric Ombrallum';
    $classe = 'Guerrer';
    $nivell = 7;
    $vida_actual = 3;
    $forca_actual = 68;
    $experiencia = 650;
    $atac_base = 12;

    // ---------- Calculs ----------
    // Percentatge de vida i de força (arrodonit a 1 decimal)
    $percentatge_vida  = round($vida_actual / VIDA_MAXIMA * 100, 1);
    $percentatge_forca = round($forca_actual / FORCA_MAXIMA * 100, 1);

    // Experiencia que falta per pujar de nivell
    $experiencia_restant = EXPERIENCIA_PER_NIVELL - $experiencia;

    // El poder d'atac creix amb el nivell
    $poder_atac = $atac_base + $nivell * 3;

    // Comparacio: si el percentatge de vida es menor que el llindar, esta ferit
    // (PHP ho mostrara com a 1 si es cert, o buit si es fals)
    $ferit = $percentatge_vida < PERCENT_FERIT;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Fitxa de personatge</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #1e1e2f;
            color: #eee;
            padding: 20px;
        }
        .fitxa {
            background: #2a2a40;
            padding: 20px;
            border-radius: 10px;
            max-width: 420px;
        }
        h1 {
            margin-top: 0;
            color: #f1c40f;
        }
        .barra-fons {
            background: #444;
            border-radius: 5px;
            height: 18px;
            width: 100%;
            overflow: hidden;
            margin-bottom: 14px;
        }
        .barra-vida {
            background: #e74c3c;
            height: 100%;
            display: block;
        }
        .barra-forca {
            background: #3498db;
            height: 100%;
            display: block;
        }
    </style>
</head>
<body>
    <div class="fitxa">

        <h1><?= NOM_JOC ?></h1>

        <!-- Nom, nivell i classe del personatge -->
        <h2>Hola <?= $nom ?>, nivell <?= $nivell ?> (<?= $classe ?>)</h2>

        <!-- Estat: 1 = ferit, buit = no ferit -->
        <p>Ferit: <?= $ferit ?></p>

        <!-- Barra de vida: l'amplada la calcula PHP dins del style -->
        <p>Vida: <?= $vida_actual ?> / <?= VIDA_MAXIMA ?> (<?= $percentatge_vida ?>%)</p>
        <div class="barra-fons">
            <span class="barra-vida" style="width: <?= $percentatge_vida ?>%;"></span>
        </div>

        <!-- Barra de força: mateix funcionament que la de vida -->
        <p>Força: <?= $forca_actual ?> / <?= FORCA_MAXIMA ?> (<?= $percentatge_forca ?>%)</p>
        <div class="barra-fons">
            <span class="barra-forca" style="width: <?= $percentatge_forca ?>%;"></span>
        </div>

        <!-- Experiencia i poder d'atac -->
        <p>Experiència: <?= $experiencia ?> / <?= EXPERIENCIA_PER_NIVELL ?></p>
        <p>Experiència que falta per pujar de nivell: <?= $experiencia_restant ?></p>
        <p>Poder d'atac: <?= $poder_atac ?></p>

    </div>
</body>
</html>
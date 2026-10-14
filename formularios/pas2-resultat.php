<?php
// PAS 2: Recollir les dades correctament.
$nom   = trim($_POST['nom'] ?? '');
$email = trim($_POST['email'] ?? '');
$dia   = trim($_POST['dia'] ?? 'sense triar');
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultat Pas 2</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <p>Hola, <?= htmlspecialchars($nom) ?></p>

    <h1>Dades recollides:</h1>
    <ul>
        <li>Nom: <?= htmlspecialchars($nom) ?></li>
        <li>Email: <?= htmlspecialchars($email) ?></li>
        <li>Dia: <?= htmlspecialchars($dia) ?></li>
    </ul>
    <p>El nom té <?= strlen($nom) ?> caràcters.</p>
</body>
</html>
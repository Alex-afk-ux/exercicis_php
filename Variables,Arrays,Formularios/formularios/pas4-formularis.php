<?php

// Pas 4 Validar, control d'errors i escapar

// Declaració
$nom = '';
$email = '';
$dia = '';
$errores = [];
$inscrit = false;

// Si recibimos los datos
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nom   = trim($_POST['nom'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $dia   = trim($_POST['dia'] ?? '');

    // Validar los errores
    if ($nom === '') {
        $errores['nom'] = 'El nom és obligatori.';
    }

    if ($email === '') {
        $errores['email'] = "L'email és obligatori.";
    } elseif (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
        $errores['email'] = "Aquest email no té un format vàlid.";
    }

    if ($dia !== 'divendres' && $dia !== 'dissabte') {
        $errores['dia'] = 'Has de triar un dia.';
    }

    // Si no hay errores
    if (count($errores) === 0) {
        $inscrit = true;
    }
}
?>

<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscripció al Festival</title>
</head>
<body>
    <h1>Inscripció de festival</h1>

    <?php if ($inscrit): ?>
        <p class="ok">Inscripció feta, <?= htmlspecialchars($nom) ?></p>
        <p class="ok">T'esperem el <?= htmlspecialchars($dia) ?></p>

    <?php else: ?>
        <form method="post" novalidate>
            <label for="nom">Nom</label>
            <input type="text" id="nom" name="nom" value="<?= htmlspecialchars($nom) ?>">
            <?php if (isset($errores['nom'])): ?>
                <p class="error"><?= $errores['nom'] ?></p>
            <?php endif; ?>

            <label for="email">Email</label>
            <input type="text" id="email" name="email" value="<?= htmlspecialchars($email) ?>">
            <?php if (isset($errores['email'])): ?>
                <p class="error"><?= $errores['email'] ?></p>
            <?php endif; ?>

            <label for="dia">Dia</label>
            <select id="dia" name="dia">
                <option value="">Tria un dia</option>
                <option value="divendres" <?= $dia === 'divendres' ? 'selected' : '' ?>>Divendres</option>
                <option value="dissabte" <?= $dia === 'dissabte' ? 'selected' : '' ?>>Dissabte</option>
            </select>
            <?php if (isset($errores['dia'])): ?>
                <p class="error"><?= $errores['dia'] ?></p>
            <?php endif; ?>

            <button>Inscriure'm</button>
        </form>
    <?php endif; ?>
</body>
</html>
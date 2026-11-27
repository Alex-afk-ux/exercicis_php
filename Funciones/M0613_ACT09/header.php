<?php
// Si una pàgina s'oblida del títol, no volem un avís a la pantalla.
if (!isset($titolPagina)) {
    $titolPagina = 'Inici';
}
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="utf-8">
    <title><?= htmlspecialchars($titolPagina) ?> · <?= BOTIGA_NOM ?></title>
    <link rel="stylesheet" href="<?= FULL_ESTILS ?>">
</head>
<body>

    <header>
        <h1><?= BOTIGA_NOM ?></h1>
        <p><?= BOTIGA_LEMA ?></p>

        <p class="usuari">
        <?php if (isset($_SESSION['usuari'])): ?>
            Hola, <strong><?= htmlspecialchars($_SESSION['nom']) ?></strong>
            &middot; <a href="clients.php">Clients</a>
            &middot; <a href="sortir.php">Sortir</a>
        <?php else: ?>
            <a href="login.php">Iniciar sessio</a>
        <?php endif; ?>
        </p>
    </header>

    <main>
<?php
session_start();

require_once 'config.php';
require_once 'funcions.php';

if (!isset($_SESSION['usuari'])) {
    $_SESSION['desti'] = 'perfil.php';   // recordem on volia anar
    header('Location: login.php');
    exit;
}

$titolPagina = 'El teu perfil';
require 'header.php';
?>

        <h2>El teu perfil</h2>

        <p>Nom d'usuari: <strong><?= htmlspecialchars($_SESSION['usuari']) ?></strong></p>
        <p>Nom complet: <strong><?= htmlspecialchars($_SESSION['nom']) ?></strong></p>

        <a class="tornar" href="privat.php">Tornar a l'area privada</a>
        <a class="tornar" href="sortir.php">Tancar la sessio</a>

<?php
require 'footer.php';
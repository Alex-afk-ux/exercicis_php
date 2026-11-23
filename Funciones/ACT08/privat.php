<?php
session_start();

require_once 'config.php';
require_once 'funcions.php';

if (!isset($_SESSION['usuari'])) {
    $_SESSION['desti'] = 'privat.php';   // recordem on volia anar
    header('Location: login.php');
    exit;
}

// Ampliació: salutació segons l'hora
$hora = (int) date('G');

if ($hora >= 6 && $hora < 14) {
    $salutacio = 'Bon dia';
} elseif ($hora >= 14 && $hora < 21) {
    $salutacio = 'Bona tarda';
} else {
    $salutacio = 'Bona nit';
}

$titolPagina = 'La teva area privada';
require 'header.php';
?>

        <h2><?= $salutacio ?>, <?= htmlspecialchars($_SESSION['nom']) ?></h2>

        <p>Has entrat a les
           <strong><?= htmlspecialchars($_SESSION['entrada']) ?></strong>.</p>

        <table>
            <?php foreach ($_SESSION as $clau => $valor): ?>
                <tr>
                    <th><?= htmlspecialchars($clau) ?></th>
                    <td><?= htmlspecialchars((string) $valor) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <a class="tornar" href="perfil.php">El meu perfil</a>
        <a class="tornar" href="sortir.php">Tancar la sessio</a>

<?php
require 'footer.php';
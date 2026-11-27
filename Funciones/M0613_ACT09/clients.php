<?php
session_start();

require_once 'config.php';
require_once 'funcions.php';

if (!isset($_SESSION['usuari'])) {
    $_SESSION['desti'] = 'clients.php';   // recordem on volia anar
    header('Location: login.php');
    exit;
}

$clients = llegeixClients();

$titolPagina = 'Clients registrats';
require 'header.php';
?>

        <h2>Clients registrats</h2>

<?php if (count($clients) === 0): ?>

        <p>Encara no hi ha cap client registrat.</p>
        <a class="tornar" href="<?= PAG_FORMULARI ?>">Anar al formulari de registre</a>

<?php else: ?>

        <p>Hi ha <strong><?= count($clients) ?></strong> client<?= count($clients) === 1 ? '' : 's' ?> registrat<?= count($clients) === 1 ? '' : 's' ?>.</p>

        <table>
            <tr>
                <?php foreach (array_keys($clients[0]) as $camp): ?>
                    <th><?= etiqueta($camp) ?></th>
                <?php endforeach; ?>
            </tr>

            <?php foreach ($clients as $client): ?>
                <tr>
                    <?php foreach ($client as $valor): ?>
                        <td><?= htmlspecialchars((string) $valor) ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </table>

<?php endif; ?>

<?php
require 'footer.php';

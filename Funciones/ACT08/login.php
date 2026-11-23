<?php
session_start();          // la PRIMERA línia, sempre

require_once 'config.php';
require_once 'funcions.php';

$errors = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Ampliació: bloqueig després de 3 intents fallits
    if (($_SESSION['intents'] ?? 0) >= 3) {
        $errors[] = 'Massa intents fallits. Accés bloquejat.';
    } else {
        $usuari = camp('usuari');
        $clau   = $_POST['clau'] ?? '';

        $dades = comprovaCredencials($usuari, $clau);

        if ($dades === null) {
            $_SESSION['intents'] = ($_SESSION['intents'] ?? 0) + 1;
            $errors[] = 'Usuari o contrasenya incorrectes.';
        } else {
            session_regenerate_id(true);
            unset($_SESSION['intents']);

            $_SESSION['usuari']  = $usuari;
            $_SESSION['nom']     = $dades['nom'];
            $_SESSION['entrada'] = date('H:i:s');

            // Ampliació: tornem a la pàgina privada que volia veure
            $desti = $_SESSION['desti'] ?? 'privat.php';
            unset($_SESSION['desti']);

            // Només permetem pàgines privades conegudes
            if (!in_array($desti, ['privat.php', 'perfil.php'], true)) {
                $desti = 'privat.php';
            }

            header('Location: ' . $desti);
            exit;
        }
    }
}

$titolPagina = 'Iniciar sessió';
require 'header.php';
?>

        <h2>Entra al teu compte</h2>
        <pre><?php print_r($_SESSION); ?></pre>

<?php if (count($errors) > 0): ?>
        <div class="errors">
            <ul>
                <?php foreach ($errors as $error): ?>
                    <li><?= $error ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
<?php endif; ?>

        <form action="login.php" method="post">
            <label for="usuari">Nom d'usuari</label>
            <input type="text" id="usuari" name="usuari">

            <label for="clau">Contrasenya</label>
            <input type="password" id="clau" name="clau">

            <button type="submit">Entrar</button>
        </form>

<?php
require 'footer.php';
<?php
require_once 'config.php';
require_once 'funcions.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {

    $titolPagina = 'Acces directe';
    require 'header.php';

    echo '<h2>Aqui no s\'hi arriba directament</h2>';
    echo '<a class="tornar" href="' . PAG_FORMULARI . '">Anar al formulari</a>';

    require 'footer.php';
    exit;
}

$usuari = [
    'nom'           => camp('nom'),
    'cognoms'       => camp('cognoms'),
    'naixement'     => camp('naixement'),
    'telefono'      => camp('telefono'),
    'correu'        => camp('correu'),
    'nomusu'        => camp('nomusu'),
    'Carrerinúmero' => camp('Carrerinúmero'),
    'poblacio'      => camp('poblacio'),
    'codipostal'    => camp('codipostal'),
    'origen'        => camp('origen', 'no ho ha dit'),
    'newsletter'    => isset($_POST['newsletter']) ? 'Si' : 'No',
    'condiciones'   => isset($_POST['condiciones']) ? 'Si' : 'No',
    'tipo'          => camp('tipo'),
];

$contrasenya        = ($_POST['contrasenya'] ?? '');
$repetircontrasenya = ($_POST['repetircontrasenya'] ?? '');

$errors = [];

if ($usuari['nom'] === ''){
    $errors[] = 'El nom te que ser obligatori';
}
if ($usuari['cognoms'] === ''){
    $errors[] = 'El cognom te que ser obligatori';
}
if ($usuari['correu'] === '') {
    $errors[] = 'El correu és obligatori.';
} elseif (filter_var($usuari['correu'], FILTER_VALIDATE_EMAIL) === false) {
    $errors[] = 'El correu no té un format valid.';
}

if ($usuari['nomusu'] === ''){
    $errors[] = 'El nomusu te que ser obligatori';
}elseif(strlen($usuari['nomusu']) < MIN_USUARI ){
    $errors[] = 'L\'apodo ha de tenir com a mínim ' . MIN_USUARI . ' caràcters.';
}

if(strlen($contrasenya) < MIN_CLAU){
    $errors[] = 'La contrasenya te que tindre ' . MIN_CLAU . ' caracters minim';
}
if($contrasenya !== $repetircontrasenya){
    $errors[] = 'La contrasenya tiene que ser la misma';
}

if ($usuari['codipostal'] !== '' &&
    !preg_match('/^[0-9]{5}$/', $usuari['codipostal'])) {
    $errors[] = 'El codi postal ha de tenir exactament 5 xifres.';
}

if (!isset($_POST['condiciones'])) {
    $errors[] = 'Has d\'acceptar les condicions del servei.';
}
if ($usuari['tipo'] === ''){
    $errors[] = 'El tipo te que ser obligatori';
}

$titolPagina = count($errors) > 0
    ? 'No s\'ha creat el compte'
    : 'Compte creat';

require 'header.php';
?>

    <?php if (count($errors) > 0): ?>

        <h2>No s'ha pogut crear el compte</h2>

        <ul>
            <?php foreach ($errors as $error): ?>
                <li><?= htmlspecialchars($error) ?></li>
            <?php endforeach; ?>
        </ul>

        <a href="<?= PAG_FORMULARI ?>">Torna al formulari</a>

    <?php else: ?>

        <h1>Benvingut/da, <?= htmlspecialchars($usuari['nom']) ?>!</h1>

        <p>
            El teu compte s'ha registrat correctament.
            El correu electrònic és:
            <?= htmlspecialchars($usuari['correu']) ?>
        </p>

        <h2>Resum de les dades registrades</h2>

        <table border="1">
            <?php foreach ($usuari as $clauCamp => $valor): ?>
                <tr>
                    <th><?= etiqueta($clauCamp) ?></th>
                    <td><?= htmlspecialchars($valor) ?></td>
                </tr>
            <?php endforeach; ?>
        </table>

        <a href="gracies.php">Continuar</a>

    <?php endif; ?>

<?php
require 'footer.php';

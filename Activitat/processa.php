<?php
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    echo '<p>Has d\'arribar aqui des del formulari. ';
    echo '<a href="registre.html">Torna-hi</a></p>';
    exit;
}
$usuari = [
    'nom'   => trim($_POST['nom'] ?? ''),
    'cognoms' => trim($_POST['cognoms'] ?? ''),
    'naixement'  => trim($_POST['naixement'] ?? ''),
    'telefono'   => trim($_POST['telefono'] ?? ''),
    'correu' => trim($_POST['correu'] ?? ''),
    'nomusu'   => trim($_POST['nomusu'] ?? ''),
    'Carrerinúmero'   => trim($_POST['Carrerinúmero'] ?? ''),
    'poblacio'   => trim($_POST['poblacio'] ?? ''),
    'codipostal'   => trim($_POST['codipostal'] ?? ''),
    'origen' =>  ($_POST['origen'] ?? ''),
    'newsletter' => isset($_POST['newsletter'] )? 'Si' : 'No',
    'condiciones'   => isset($_POST['condiciones']) ? 'Si' : 'No',
    'tipo' => trim($_POST['tipo'] ?? ''),
];

$contrasenya=($_POST['contrasenya'] ?? '');
$repetircontrasenya=($_POST['repetircontrasenya'] ?? '');

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
}elseif(strlen($usuari['nomusu']) < 4 ){
    $errors[] = 'L\'apodo ha de tenir com a mínim 3 caràcters.';
}

if(strlen($contrasenya) < 6){
    $errors[] = 'La contrasenya te que tindre 6 caracters minim';
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
?>
<?php if (count($errors) > 0): ?>

    <h2>No s'ha pogut crear el compte</h2>

    <ul>
        <?php foreach ($errors as $error): ?>
            <li><?= htmlspecialchars($error) ?></li>
        <?php endforeach; ?>
    </ul>

    <a href="registre.html">Torna al formulari</a>

<?php else: ?>

    <h1>Benvingut/da, <?= htmlspecialchars($usuari['nom']) ?>!</h1>

    <p>
        El teu compte s'ha registrat correctament.
        El correu electrònic és:
        <?= htmlspecialchars($usuari['correu']) ?>
    </p>

    <h2>Resum de les dades registrades</h2>

    <table border="1">
        <?php foreach ($usuari as $camp => $valor): ?>
            <tr>
                <th><?= htmlspecialchars($camp) ?></th>
                <td><?= htmlspecialchars($valor) ?></td>
            </tr>
        <?php endforeach; ?>
    </table>

<?php endif; ?>





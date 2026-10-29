<?php
if($_SERVER['REQUEST_METHOD'] !== 'POST'){
    echo '<p>Has d\'arribar aqui des del formulari. ';
    echo '<a href="index.html">Torna-hi</a></p>';
    exit;
}

$cliente = [
    'nom' => trim($_POST['nom'] ?? ''),
    'cognoms' => trim($_POST['cognoms'] ?? ''),
    'telefon' => trim($_POST['telefon'] ?? ''),
    'data' => trim($_POST['data'] ?? ''),
];

$errors = [];

if($cliente['nom'] === ''){
    $errors[] = ' El nombre es obligatorio';
}

if($cliente['cognoms'] === ''){
    $errors[] = ' El apellido es obligatorio ';
}

if($cliente['telefon'] === ''){
    $errors[] = ' El telefono es obligatorio ';
}elseif(strlen($cliente['telefon']) !== 9){
    $errors[] = 'El telefono tiene que tener 9 digitos ';
}

if($cliente['data'] === ''){
    $errors[] = 'La fecha es obligatoria ';
}
?>

<?php if(count($errors) > 0): ?>
    <h2>Pagina de errores</h2>

    <ul>
        <?php foreach($errors as $error) :?>
            <li><?= htmlspecialchars($error)?></li>
        <?php endforeach;?>
    </ul>

    <a href="index.html">TORNA AL FORMULARI</a>

<?php else: ?>
    <h1>Bienvenido <?=htmlspecialchars($cliente['nom'])?></h1>

    <h2>RESUMEN DE LOS DATOS</h2>

    <table border="1">
    <?php foreach ($cliente as $campo => $valor): ?>
        <tr>
        <th><?= htmlspecialchars($campo)?></th>
        <td><?= htmlspecialchars($valor)?></td>
        </tr>
    <?php endforeach;?>
    </table>
<?php endif;?>

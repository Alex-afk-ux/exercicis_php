<?php

// Pas 3 - Una sola pagina,fins ara tenim dos fitxers,el formulari i el resultat
// Mira com es fa la peticio i aixi fara una cosa o un altre 
// La primera visita es amb GET i quanes prem el boto enviar es amb POST

$nom = '';
$email = '';
$dia = '';

$enviat = false;

// Array predenifido $_SERVER nos da informacion del servidor
// echo "<pre>";
// print_r($_SERVER);
// echo "</pre>";

// Si el REQUEST METHOD es POST es qu eya se ha enviado clicado al boton del enviar del formulario con Methodo = POST
if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $nom   = trim($_POST['nom'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $dia   = trim($_POST['dia'] ?? 'sense triar');
    $enviat = true;
}

// Validacion del correo
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error = 'El correu no és vàlid.';
    } else {
        $enviat = true;
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscripcio al Festival</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Inscripcio al festival</h1>
    <?php if($enviat):?>
            <p>Inscripcio Rebuda: <?= htmlspecialchars($nom); ?> 
            (<?= htmlspecialchars($email) ?>),
            dia <?= htmlspecialchars($dia) ?>.</p>
    <?php endif;?>
    <form method="post">
        <label for="">Nombre</label>
        <input type="text" name="nom" id="nom" placeholder="Introduce el nombre">
        <label for="correo">Correu</label>
        <input type="email" id="email" name="email" placeholder="Introduce el email">
        <label for="dia">Dia</label>
        <select name="dia" id="dia">
          <option value="Divendres">Divendres</option>
          <option value="Dissabte">Dissabte</option>
        </select>
        <button>Inscriure</button>
</body>
</html>
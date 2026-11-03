<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apartat 1 - Funcions</title>
</head>
<body>

<?php
/**
 * Mostra la capçalera de la botiga.
 *
 * @return void
 */
function capcalera(): void {
    echo '<header>';
    echo '<h1>SuperMercat</h1>';
    echo '<p>La teva botiga de confiança</p>';
    echo '</header>';
}

/**
 * Mostra el peu de pàgina amb l'any actual.
 *
 * @return void
 */
function peu(): void {
    $any = date('Y');
    echo "<footer>";
    echo "<p>Botiga Online &copy; $any</p>";
    echo "</footer>";
}

/**
 * Funció de prova que no s'arriba a cridar.
 *
 * @return void
 */
function funcioNoCridada(): void {
    echo "<p>Aquesta funció no s'executa mai perquè no es crida.</p>";
}

capcalera();
?>

<main>
    <p>Contingut principal de la pàgina.</p>
</main>

<?php
peu();
peu();
peu();
?>

</body>
</html>

<?php
declare(strict_types=1);
?>
<!DOCTYPE html>
<html lang="ca">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apartat 2</title>
</head>
<body>

<!-- EXERCICI 1 -->
<?php
/**
 * Mostra una salutació amb el nom rebut.
 *
 * @param string $nom Nom de la persona
 * @return void
 */
function saluda(string $nom): void {
    echo "<p>Benvingut, <strong>" . htmlspecialchars($nom) . "</strong></p>";
}

echo "<h2>Benvingut a l'exercici de salutacions</h2>";
saluda("Anna");
saluda("Jesus");
saluda("Alex");
?>

<!-- EXERCICI 2 -->
<?php
/**
 * Mostra una targeta amb les dades d'un producte.
 *
 * @param string $nom Nom del producte
 * @param float $preu Preu del producte
 * @param int $estoc Unitats disponibles
 * @return void
 */
function targeta(string $nom, float $preu, int $estoc): void {
    $preuFormat = number_format($preu, 2, ',', '.');
    echo "<div class='targeta'>";
    echo "<h3>" . htmlspecialchars($nom) . "</h3>";
    echo "<p>$preuFormat EUR</p>";
    echo "<p>Estoc: $estoc</p>";
    echo "</div>";
}

echo "<h2>Exercici 2: Targetes de producte</h2>";
echo "<div class='graella'>";
targeta("Ordinador portàtil", 899.99, 12);
targeta("Ratolí sense fils", 24.5, 150);
targeta("Monitor 27\"", 189.0, 8);
echo "</div>";
?>

<!-- EXERCICI 3 -->
<?php
echo "<h2>Exercici 3</h2>";
echo "<div class='graella'>";
targeta("Ordinador", 899.99, 12);
echo "</div>";

// Els tipus declarats indiquen quin tipus de dada espera la funció.
// Si passem les dades en un ordre incorrecte, podem obtenir
// resultats incorrectes o un error de tipus.
?>

</body>
</html>

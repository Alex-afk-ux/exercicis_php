<?php
/*
Aquest fitxer te 6 errors: 3 de sintaxis (PHP no arrenca)
i 3 de logica funcions,pero ell resultat no el resultat no es el correcte)

Arregla'ls d'un en un comprovant la pagina despres de cad acanvi

Anota a error trobats.md quin era ,com te m has adonat i com l'has result

*/

$nom = 'Aina'; // Faltaba el dolar
$assignatura = 'Desenvolupament web'; // Falta un punto y coma

$nota1 = 7;
$nota2 = 9;
// La jerarquia de la operacio esta malament
$mitjana = ($nota1 + $nota2) / 2;

echo '<h1>Butlleti de notes</h1>';
// Amb les cometes nomes es pot escriure text pla y no les variables
echo "<p> Alumne: $nom</p>";
// El php es concatena amb un . no amb un mes
echo '<p>Assignatura: ' . $assignatura . '</p>';
echo "<p> Mitjana : $mitjana</p>"; // les cometes no estan ben posades

echo '<p>Generat el ' .date('d/m/Y') . '</p>'; 

$n = 3;
echo 'Hola $nom'; --> Hola $nom
echo <"br>";
echo "Hola $nom"'; --> Hola Aina
echo <"br>";
echo 'Hola $nom'; --> Hola $nom
echo <"br>";
echo 'Hola $nom'; --> Hola $nom
echo 'Hola $nom'; --> Hola $nom
echo 'Hola $nom'; --> Hola $nom
echo 'Hola $nom'; --> Hola $nom
echo 'Hola $nom'; --> Hola $nom



?>
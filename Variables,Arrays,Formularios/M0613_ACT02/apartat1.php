<!-- APARTADO 1 -->
<!-- EXERCICI 1 -->
<?php

$grups[0] = 'Pepe';
$grups[1] = 'pipo';
$grups[2] = 'pupa';
$grups[8] = 'papo';
$grups[] = 'Peppapoe';


$estils = array('Futbol', 'Balonpie', 'Soccer');

$edicions = range(2019, 2026);


$paraules = explode(' ','Hola chavaleria');

?>

<html>
    <pre>
        <?php print_r($grups)?>
    </pre>
    <pre>
      <?php print_r($estils)?>  
    </pre>
    <pre>
        <?php print_r($edicions)?>
    </pre>
    <pre>
       <?php print_r($paraules)?>
    </pre>
</html>


<?php
print_r($grups);
echo '<br>';
print_r($estils);
echo '<br>';
print_r($edicions);
echo '<br>';
print_r($paraules);
echo '<br>';

var_dump($grups);
echo '<br>';
var_dump($estils);
echo '<br>';
var_dump($edicions);
echo '<br>';
var_dump($paraules);
echo '<br>';

var_export($grups);
echo '<br>';
var_export($estils);
echo '<br>';
var_export($edicions);
echo '<br>';
var_export($paraules);
echo '<br>';
?> 

<!-- EXERCICI 2 -->
 <?php
    $estils = [
        "nom" => "Alex",
        "valor" => "Rap"
    ];
    // Dos elements amb assignació directa
        $estils["Metallica"] = "Heavy metal";
        $estils["BobMarley"] = "Reggae";
        $estils["Paco de Lucia"] = "Flamenco";
    // Dos elements més amb array()
    $estils += array(
         "Queen" => "Rock",
         "Nirvana" => "Grunge"
         );
    echo "L'estil de Bob Marley es: " . $estils["BobMarley"];
    echo '<br>';
    print_r($estils);
    echo '<br>';
    echo count($grups);
    echo '<br>';
?>

<!-- EXERCICI 3 -->
 <?php
$grups = array("Metallica", "Bob Marley", "Queen", "Nirvana", "Paco de Lucia");
echo "Número de grups: " . count($grups);
echo '<br>';
unset($grups[0]);
echo "Numero de grupos con unset " . count($grups);
echo '<br>';
$grups [] = 'Rocky';
print_r($grups);

// Explica en un comentari per què, després d'un unset(), un bucle for de 0 a count()-1 pot fallar.
// Perque no hi ha ninguna variable que contar,esta el array buit.
?>
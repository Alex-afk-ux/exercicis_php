<?php
// EXERCICI 1
$grup = ["Queen","Metallica","Sting"];

if(in_array("Queen",$grup) && in_array("Sting",$grup)){
    echo "Quenn y Sting esta en el grup";
}
else{
    echo "No estan";
}

?>
<br>
<?php
function buscaGrup(array $llista, string $grup) {
    $posicio = array_search($grup, $llista);

    if ($posicio !== false) {
        return $posicio;
    }
    return -1;
}

$grups = ["Queen", "Metallica", "Sting"];

echo buscaGrup($grups, "Metallica") . "\n"; // 1
echo buscaGrup($grups, "Queen") . "\n";     // 0
echo buscaGrup($grups, "Muse") . "\n";      // -1
?>

<br>

<?php
    echo buscaGrup($grups, "Metallica") . "\n"; // 1
    echo buscaGrup($grups, "Muse") . "\n";      // -1
?>

<!-- EXERCICI 2 -->

<br>
<?php

$grups = [
        "Quenn" => 5000,
        "Kiss" => 6000,
        "Sting" => 4000,
        "Metallica" => 3000,
        "Phil Collins" => 7000, 
];


print_r($grups);

echo '<br>';
$copia = $grups;
asort($copia);
$copia1 = $grups;
arsort($copia1);
$copia2 = $grups;
ksort($copia2);
$copia3 = $grups;
krsort($copia3);

echo "La primera es un asort ";
print_r($copia);
echo '<br>';
echo "La segona es un arsort ";
print_r($copia1);
echo '<br>';
echo "La Tercera es un ksort ";
print_r($copia2);
echo '<br>';
echo "La Quatre es un krsort ";
print_r($copia3);

?>
<br>
<?php
$grups = [
    "Queen" => 5000,
    "Kiss" => 6000,
    "Sting" => 4000,
    "Metallica" => 3000,
    "Phil Collins" => 7000
];

$perdut = $grups;
shuffle($perdut);
print_r($perdut);


$noms = array_keys($grups);   // ["Queen", "Kiss", ...]
shuffle($noms);

echo "<ol>";
foreach ($noms as $nom) {
    echo "<li>" . $nom . "</li>";
}
echo "</ol>";
?>


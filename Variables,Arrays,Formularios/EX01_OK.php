<?php
 echo 'Hola';
    echo 'Hola', ' ', 'món';
    echo '<p>Text</p>';

    $x = 6;
    $dades = 'Llegible';
    print 'Hola'; // Retorna 1
    var_dump($x); // per depurar
    print_r($dades); // llegible

    $nom =  'Aina';
    $edat = 19;
    $actiu = true;


    $nom = 'Bernat'; // Es pot cambiar
    $total = $edat + 1;
    echo $nom;

    $x = 5; // int
    $x = 'eine'; // ara string

    $a = '10'+ 5; // 15 (int)
    $b = '10' .  5;// '105' (string)
    var_dump($a,$b);

    $nom = 'Aina';
    echo 'Hola $nom';

    echo "<br>";
    // Hola $nom

    $nom = 'Aina';
    echo "Hola $nom";

    // Hola Aina

    $nom = 'Aina'; $punts = 8;

    echo 'Hola' . $nom . ', tens' . $punts . 'punts'; // concatenacio amb .
    echo "<br>";
    echo "Hola $nom,  tens $punts punts"; // interpolacio
    echo "<br>";
    echo "Hola ($nom), tens ($punts) punts"; // interpolacio amb claus

    $base = 200;
    define('IVA', 0.21);
    const BOTIGA = 'Ca la Web';
    echo "<br>";
    echo BOTIGA; // sense $
    $total = $base * (1 + IVA);
    echo "<br>";
    // IVA = 0.10; -> ERROR


    $missatge = 'Hola'; //Ambit global
    $intern = 'Adeu';
    function saluda($missatge){
        echo $missatge; //no la veu
        $intern = 'Adeu'; // ambit local
    }
    saluda($missatge);
     echo "<br>";
    echo $intern; // tampoc la veu

?>
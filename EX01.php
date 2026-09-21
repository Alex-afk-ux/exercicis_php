<?php
    echo 'Hola';
    echo 'Hola', ' ', 'món';
    echo '<p>Text</p>';

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

    define('IVA', 0.21);
    const BOTIGA = 'Ca la Web';
    echo "<br>";
    echo BOTIGA; // sense $
    $total = $base * (1 + IVA);

    // IVA = 0.10; -> ERROR

    $missatge = 'Hola'; //Ambit global
    function saluda(){
        echo $missatge; //no la veu
        $intern = 'Adeu'; // ambit local
    }
    saluda();
    echo $intern; // tampoc la veu

    // declare(strict_types=1); // Primera linia del fitxer PHP deixa de convertir tipus pel seu compte
    // ini_set('display_errors' ,  '1'); // Canvia un parametre només per aquesta peticio
    // error_reporting(E_ALL); // Decideix quins nivells d'error es tenen en compte ara mateix
    // setlocale() date_default_timezone_set(); // Idioma i zona horaria per aquest script
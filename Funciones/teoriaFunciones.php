<?php
declare(strict_types=1); //Primera linea del fichero
// Declarar

funtion peu(): void{
    echo '<footer>...</footer>';
}

// Cridar

peu();
peu();
peu();
// S'executa tres vegades

funtion targeta(string $nom,float $preu,int $estoc): void{
    echo "<h3>$nom</h3><p>$preu EUR - $estoc unitats</p>";
}
// targeta('Teclat mecanic' , 79.99,4); L'ordre importa!!

funtion iva($b): void{
    echo $b * 1.21;
}

function iva($b): float{
    return $b * 1.21;
}

funtion preuAmbIva(
    float $base,
    float $iva = 0.21

): float {
    return round($base * (1 + $iva), 2);
}
preuAmbIva(100);
preuAmbIva(100,0.10);

// STRICT TYPES
// SENSE STRICT TYPE
area('3',4.0);
// AMB STRICT TYPE
are('3',4.0);

// Variable global
$botiga = 'BitBazar';

funtion mostra(): string{
    return 'Som a ' . $botiga; // No la veu!!
}

// Warning Undefined variable botiga

function mostra(string $nom): string (return "Som a $nom";) //Be:entra per parametre

// STATIC
funtion compta(): int{
    $n = 0;
    $n++;
    return $n;
}

// 1 1 1

function compta(): int{
    static $n = 0;
    $n++;
    return $n;
}
// 1,2,3


// REP ARRAY TORNA UN VALOR
function valorEstoc(array $p): float{
    $total = 0.0;
    foreach($p as $item){
        $total += $item['preu'];
    }
    return $total;
}

// REP UN ARRAY TORNA UN ARRAY
function disponibles(array $p): array{
    $res = [];
    foreach($p as $item){
        if($item['estoc'] > 0) ($res[] = $item; )
    }
    return $res;
}
?>
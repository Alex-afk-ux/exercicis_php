<!-- APARTAT 2 -->
 <!-- EXERCICI 1 -->
  <?php
$grups = array("Metallica", "Bob Marley", "Queen", "Nirvana", "Paco de Lucia");

$estils = [
        "nom" => "Alex",
        "valor" => "Rap"
    ];
?>

<ul>
    <?php foreach ($grups as $grup): ?>
        <li><?= $grup ?></li>
    <?php endforeach; ?>
</ul>

<ol>
    <?php foreach ($grups as $grup): ?>
        <li><?= $grup ?></li>
    <?php endforeach; ?>
</ol>

<!-- EXEERCICI 2 -->
<table border="1">
    <?php foreach ($estils as $grup => $estil): ?>
        <tr>
            <td><?= $grup ?></td>
            <td><?= $estil ?></td>
        </tr>
    <?php endforeach; ?>
    <tr>
        <td>Total de grups</td>
        <td><?= count($estils) ?></td>
    </tr>
</table>

<!-- EXERCICI 3 -->
<table border="1">
    <?php
    reset($estils);                 
    do {
        $grup  = key($estils);      
        $estil = current($estils); 
        echo "<tr>";
        echo "<td>$grup</td>";
        echo "<td>$estil</td>";
        echo "</tr>";
    } while (next($estils) !== false);  
    ?>
    <tr>
        <td>Total de grups</td>
        <td><?= count($estils) ?></td>
    </tr>
</table>


<!-- EXERCICI 4 -->
<?php
 function recorrerInvers(array $llista) {
    end($llista);                      
    while (key($llista) !== null) {     
        echo key($llista) . " => " . current($llista) . "<br>";
        prev($llista);                  
    }
}

echo "<h3>Recorregut invers:</h3>";
recorrerInvers($estils);

echo "<h3>Recorregut normal (foreach):</h3>";
foreach ($estils as $grup => $estil) {
    echo "$grup => $estil<br>";
}
?>
<?php
$serverName = "localhost";
$userName = "root";
$password = "pass12345";
$dbName = "inmuebles";
$connection = new mysqli($serverName, $userName, $password, $dbName) or die("No fue posible conectarse.");
// echo "Conectado.";
$result = $connection->query("SELECT * FROM inmuebles");

while ($rows = $result->fetch_assoc()) {
  echo '<article class="astro-MGDH35U5">' .
  '<img class="astro-MGDH35U5" src="data:image/webm;base64,' . base64_encode($rows["imagen"]) . '"/>' .
  '<h2 class="astro-MGDH35U5">' . $rows['direccion'] . '</h2>' .
  '<p class="astro-MGDH35U5">' . $rows['descripcion'] . '</p>' .
  '<p class="astro-MGDH35U5">Tipo: ' . ucwords(substr($rows['tipo'], 0, -2)) . '</p>' .
  '<p class="astro-MGDH35U5">$'. number_format($rows['precio']) . '</p>' .
  '</article>';
}

$connection->close();
// echo "\nDesconectado.";
?>
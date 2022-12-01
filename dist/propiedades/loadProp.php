<?php
// echo "Hello world\n";
$server = "localhost";
$user = "root";
$pass = "pass12345";
$db = "inmuebles";
$mysqli = new mysqli($server, $user, $pass, $db) or die("No fue posible conectarse.");
// echo "Conectado.";

$result = mysqli_query($mysqli,"SELECT * FROM $db")->fetch_all();
// mysqli_free_result($result);
// while ($row = mysql_fetch_object($result)){

// }

if ($result = mysqli_query($mysqli, "SELECT * FROM $db")) {
    echo "Returned rows are: " . mysqli_num_rows($result);
    // Free result set
    mysqli_free_result($result);
  }

$mysqli -> close();
echo "Desconectado.";
?>
<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "oficinadasrodas";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}

  $sqlClientes = "SELECT COUNT(*) AS totalClientes FROM cliente";
  $resultClientes = mysqli_query($conn, $sqlClientes);
  $rowClientes = mysqli_fetch_assoc($resultClientes);
  $totalClientes = $rowClientes['totalClientes'];

  $sqlVeiculos = "SELECT COUNT(*) AS totalVeiculos FROM veiculo";
  $resultVeiculos = mysqli_query($conn, $sqlVeiculos);
  $rowVeiculos = mysqli_fetch_assoc($resultVeiculos);
  $totalVeiculos = $rowVeiculos['totalVeiculos'];

  $sqlUsuarios = "SELECT COUNT(*) AS totalUsuarios FROM usuario";
  $resultUsuarios = mysqli_query($conn, $sqlUsuarios);
  $rowUsuarios = mysqli_fetch_assoc($resultUsuarios);
  $totalUsuarios = $rowUsuarios['totalUsuarios'];
?>

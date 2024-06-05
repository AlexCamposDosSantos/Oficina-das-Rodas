<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "oficinadasrodas";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Conexão falhou: " . $conn->connect_error);
}

// Inicializa variáveis de filtro
$filter_status = isset($_GET['status']) ? $_GET['status'] : '';
$filter_cliente = isset($_GET['cliente']) ? $_GET['cliente'] : '';
$filter_mecanico = isset($_GET['mecanico']) ? $_GET['mecanico'] : '';
$filter_num_os = isset($_GET['num_os']) ? $_GET['num_os'] : '';

// Consulta SQL base
$sql = "SELECT os.num_os, os.dat_abert, cliente.nome_razao, os.Status, veiculo.marca, veiculo.modelo, os.Merc_resp FROM os 
        INNER JOIN cliente ON os.cliente = cliente.id
        INNER JOIN veiculo ON os.Veiculo = veiculo.id";

$where_clauses = [];
if (!empty($filter_status)) {
  $where_clauses[] = "os.Status = '$filter_status'";
}
if (!empty($filter_cliente)) {
  $where_clauses[] = "cliente.nome_razao = '$filter_cliente'";
}
if (!empty($filter_mecanico)) {
  $where_clauses[] = "os.Merc_resp = '$filter_mecanico'";
}
if (!empty($filter_num_os)) {
  $where_clauses[] = "os.num_os = '$filter_num_os'";
}

if (!empty($where_clauses)) {
  $sql .= " WHERE " . implode(" AND ", $where_clauses);
}

$result = $conn->query($sql);
?>
<?php
$host = '127.0.0.1';
$db   = 'oficinadasrodas';
$user = 'root';
$pass = '';
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (\PDOException $e) {
    throw new \PDOException($e->getMessage(), (int)$e->getCode());
}

// Contar ordens pendentes
$stmt = $pdo->query("SELECT COUNT(*) as totalPendentes FROM os WHERE Status IN ('Novo', 'Aguardando aprovação', 'Pendente')");
$totalPendentes = $stmt->fetch()['totalPendentes'];

// Contar ordens em andamento
$stmt = $pdo->query("SELECT COUNT(*) as totalAndamento FROM os WHERE Status IN ('Aguardando peças', 'Em atendimento', 'Urgente')");
$totalAndamento = $stmt->fetch()['totalAndamento'];

// Contar ordens concluídas
$stmt = $pdo->query("SELECT COUNT(*) as totalConcluidas FROM os WHERE Status = 'Concluída'");
$totalConcluidas = $stmt->fetch()['totalConcluidas'];
?>

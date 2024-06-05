<?php
include './conection.php';


if(isset($_GET['num_os'])) {
    $num_os = $_GET['num_os'];

    // Consulta no banco de dados para obter os dados da O.S
    $stmt = $pdo->prepare('SELECT os.*, cliente.nome_razao, veiculo.modelo AS veiculo FROM os
                            JOIN cliente ON os.cliente = cliente.id
                            JOIN veiculo ON os.Veiculo = veiculo.id
                            WHERE num_os = ?');
    $stmt->execute([$num_os]);
    $os_data = $stmt->fetch(PDO::FETCH_ASSOC);

    // Retorna os dados da O.S como JSON
    echo json_encode($os_data);
} else {
    echo json_encode(['error' => 'Número da O.S não fornecido']);
}
?>

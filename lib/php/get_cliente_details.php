<?php
include './conection.php';

if(isset($_POST['cliente_id'])) {
    $cliente_id = $_POST['cliente_id'];

    // Prepara e executa a consulta SQL para buscar os detalhes do cliente e do veículo com base no ID do cliente
    $stmt = $pdo->prepare("SELECT c.*, v.* FROM cliente c LEFT JOIN veiculo v ON c.id = v.cliente_id WHERE c.id = :cliente_id");
    $stmt->execute(['cliente_id' => $cliente_id]);
    $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

    if($cliente) {
        // Converte os dados do cliente em JSON para que o JavaScript possa ler
        echo json_encode($cliente);
    } else {
        echo json_encode(['error' => 'Cliente não encontrado']);
    }
} else {
    echo json_encode(['error' => 'ID do cliente não foi enviado']);
}
?>

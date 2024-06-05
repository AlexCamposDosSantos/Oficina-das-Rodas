<?php
include './conection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num_os = $_POST['num_os'];
    $data_abertura = $_POST['data_abertura'];
    $status = $_POST['status'];
    $cliente = $_POST['cliente'];
    $veiculo = $_POST['veiculo'];
    $mecanico = $_POST['mecanico'];
    $descricao = $_POST['descricao_problemas'];
    $inf_adic = $_POST['informacoes_adicionais'];
    $serv_exec = isset($_POST['servicos_executados']) ? $_POST['servicos_executados'] : '';

    // Insere os dados na tabela OS
    $stmt = $pdo->prepare("INSERT INTO OS (num_os, dat_abert, Status, Veiculo, cliente, Merc_resp, Descricao, inf_adic, serv_exec) 
                           VALUES (:num_os, :data_abertura, :status, :veiculo, :cliente, :mecanico, :descricao, :inf_adic, :serv_exec)");
    $stmt->bindParam(':num_os', $num_os);
    $stmt->bindParam(':data_abertura', $data_abertura);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':veiculo', $veiculo);
    $stmt->bindParam(':cliente', $cliente);
    $stmt->bindParam(':mecanico', $mecanico);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':inf_adic', $inf_adic);
    $stmt->bindParam(':serv_exec', $serv_exec);

    if ($stmt->execute()) {
        echo "Ordem de serviço registrada com sucesso.";
    } else {
        echo "Erro ao registrar a ordem de serviço.";
    }
}
?>
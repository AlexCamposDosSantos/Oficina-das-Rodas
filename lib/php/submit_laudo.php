<?php
include './conection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $num_os = $_POST['num_os'];
    $data_abertura = $_POST['data_abertura'];
    $status = $_POST['status'];
    $mecanico = $_POST['mecanico'];
    $descricao = $_POST['descricao_problemas'];
    $inf_adic = $_POST['informacoes_adicionais'];
    $serv_exec = isset($_POST['serv_exec']) ? $_POST['serv_exec'] : '';

    // Insere os dados na tabela OS
    $stmt = $pdo->prepare("UPDATE OS SET dat_abert = :data_abertura, Status = :status, Merc_resp = :mecanico, Descricao = :descricao, inf_adic = :inf_adic, serv_exec = :serv_exec WHERE num_os = :num_os");
    $stmt->bindParam(':num_os', $num_os);
    $stmt->bindParam(':data_abertura', $data_abertura);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':mecanico', $mecanico);
    $stmt->bindParam(':descricao', $descricao);
    $stmt->bindParam(':inf_adic', $inf_adic);
    $stmt->bindParam(':serv_exec', $serv_exec);

    if ($stmt->execute()) {
        echo "Ordem de serviço atualizada com sucesso.";
    } else {
        echo "Erro ao atualizar a ordem de serviço.";
    }
}
?>
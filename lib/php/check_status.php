<?php
include './controle_os.php';

if (isset($_POST['num_os'])) {
    $num_os = $_POST['num_os'];

    try {
        if (!isset($pdo)) {
            throw new Exception('Conexão com o banco de dados não está definida.');
        }

        $query = "SELECT Status FROM os WHERE num_os = ?";
        $stmt = $pdo->prepare($query);
        $stmt->execute([$num_os]);
        $result = $stmt->fetch();

        if ($result) {
            echo json_encode(['status' => $result['Status']]);
        } else {
            echo json_encode(['status' => 'Not Found']);
        }
    } catch (Exception $e) {
        echo json_encode(['error' => $e->getMessage()]);
    }
} else {
    echo json_encode(['status' => 'No OS Number Provided']);
}
?>

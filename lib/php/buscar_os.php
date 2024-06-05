<?php
include './conection.php';

if(isset($_POST['num_os'])){
    $numOS = $_POST['num_os'];
    
    $stmt = $pdo->prepare('SELECT num_os, cliente, veiculo, data_abertura, data_pronto, mecanico FROM OS WHERE num_os = :num_os');
    $stmt->execute(['num_os' => $numOS]);
    
    $result = [];
    
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $result[] = $row;
    }
    
    echo json_encode($result);
}
?>

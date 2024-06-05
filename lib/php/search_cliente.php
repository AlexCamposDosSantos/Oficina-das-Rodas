<?php 
if (isset($_POST['cliente_id'])) {
    $cliente_id = $_POST['cliente_id'];
    $stmt = $pdo->prepare("SELECT * FROM cliente WHERE id = :cliente_id");
    $stmt->execute(['cliente_id' => $cliente_id]);
    $cliente = $stmt->fetch(PDO::FETCH_ASSOC);
}

if(isset($_POST['searchText'])) {
    $searchText = $_POST['searchText'];
    $stmt = $pdo->prepare("SELECT * FROM cliente WHERE nome_razao LIKE :searchText OR cpf_cnpj LIKE :searchText");
    $stmt->execute(['searchText' => "%$searchText%"]);
    $result = $stmt->fetchAll();

    // Constroe a tabela HTML com os resultados da busca
    $output = '';
    foreach($result as $row) {
        $output .= '<tr>';
        $output .= '<td>' . $row['nome_razao'] . '</td>';
        $output .= '<td>' . $row['cpf_cnpj'] . '</td>';
        $output .= '</tr>';
    }
    echo $output;
}
?>

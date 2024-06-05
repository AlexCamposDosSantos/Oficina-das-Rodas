<?php
require './conection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Insere dados do formulário nos campos do BD 
    $razao_social = $_POST['fname'];
    $cnpj = $_POST['lname'];
    $email = $_POST['eaddress'];
    $cep = $_POST['zip'];
    $endereco = $_POST['address'];
    $cidade = $_POST['city'];
    $estado = $_POST['state'];
    $bairro = $_POST['bairro'];
    $telefone = $_POST['phone'];

    // Prepare e executa a inserção no banco de dados
    $sql = "INSERT INTO Empresa (razao_social, cnpj, email, cep, endereco, cidade, estado, bairro, telefone)
            VALUES (:razao_social, :cnpj, :email, :cep, :endereco, :cidade, :estado, :bairro, :telefone)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'razao_social' => $razao_social,
        'cnpj' => $cnpj,
        'email' => $email,
        'cep' => $cep,
        'endereco' => $endereco,
        'cidade' => $cidade,
        'estado' => $estado,
        'bairro' => $bairro,
        'telefone' => $telefone
    ]);

    echo "Dados inseridos com sucesso!";
} else {
    echo "Método de requisição inválido.";
}
?>

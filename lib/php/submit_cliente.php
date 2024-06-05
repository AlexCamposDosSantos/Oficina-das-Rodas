<?php
require './conection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome_razao = $_POST['fname'];
    $cpf_cnpj = $_POST['lname'];
    $endereco = $_POST['address'];
    $cep = $_POST['zip'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['city'];
    $estado = $_POST['state'];
    $email = $_POST['eaddress'];
    $telefone = $_POST['phone'];

    $stmt_cliente = $pdo->prepare("INSERT INTO cliente (nome_razao, cpf_cnpj, endereco, cep, bairro, cidade, estado, email, telefone) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt_cliente->execute([$nome_razao, $cpf_cnpj, $endereco, $cep, $bairro, $cidade, $estado, $email, $telefone]);


    $cliente_id = $pdo->lastInsertId();
    $marcas = $_POST['marca'];
    $modelos = $_POST['modelo'];
    $anos = $_POST['ano'];
    $placas = $_POST['placa'];
    $quilometragens = $_POST['quilometragem'];
    $renavans = $_POST['renavan'];

    // Utiliza os arrays de veículos e insere cada veículo individualmente no banco de dados
    foreach ($marcas as $key => $marca) {
        $modelo = $modelos[$key];
        $ano = $anos[$key];
        $placa = $placas[$key];
        $quilometragem = $quilometragens[$key];
        $renavan = $renavans[$key];

        $stmt_veiculo = $pdo->prepare("INSERT INTO veiculo (cliente_id, marca, modelo, ano, placa, quilometragem, renavan) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $stmt_veiculo->execute([$cliente_id, $marca, $modelo, $ano, $placa, $quilometragem, $renavan]);
    }

    echo "Dados inseridos com sucesso!";
    exit();
} else {
    echo "Método de requisição inválido.";
    exit();
}
?>

<?php
include './lib/php/controle_os.php';

if (isset($_GET['num_os'])) {
    $num_os = $_GET['num_os'];

    $sql = "SELECT os.*, cliente.nome_razao, cliente.endereco, cliente.cidade, cliente.estado, cliente.telefone, cliente.email, veiculo.marca, veiculo.modelo, veiculo.ano, veiculo.placa, veiculo.renavan
            FROM os
            JOIN cliente ON os.cliente = cliente.id
            JOIN veiculo ON os.Veiculo = veiculo.id
            WHERE os.num_os = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $num_os);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        echo "<html><head><title>Relatório de Manutenção</title>";
        echo "<style>body { font-family: Arial, sans-serif; } .print-area { padding: 20px; } button { margin-bottom: 20px; }</style>";
        echo "</head><body>";
        echo "<button onclick='window.print()'>Imprimir</button>";
        echo "<div class='report print-area'>";
        echo "<h2>TERMO DE GARANTIA PARA MANUTENÇÃO VEICULAR</h2>";
        echo "<p><strong>Nome da Empresa:</strong> Oficina das Rodas</p>";
        echo "<p><strong>Telefone:</strong> 75 99999-8888</p>";
        echo "<p><strong>Email:</strong> contato@oficinadasrodas.com</p>";
        echo "<p><strong>CNPJ:</strong> 79.241.604/0001-80</p>";
        echo "<br>";
        echo "<p><strong>Nome do Cliente:</strong> " . $row['nome_razao'] . "</p>";
        echo "<p><strong>Endereço:</strong> " . $row['endereco'] . ", " . $row['cidade'] . ", " . $row['estado'] . "</p>";
        echo "<p><strong>Telefone:</strong> " . $row['telefone'] . "</p>";
        echo "<p><strong>Email:</strong> " . $row['email'] . "</p>";
        echo "<br>";
        echo "<p><strong>Veículo:</strong></p>";
        echo "<p><strong>Marca:</strong> " . $row['marca'] . "</p>";
        echo "<p><strong>Modelo:</strong> " . $row['modelo'] . "</p>";
        echo "<p><strong>Ano:</strong> " . $row['ano'] . "</p>";
        echo "<p><strong>Placa:</strong> " . $row['placa'] . "</p>";
        echo "<p><strong>Renavan:</strong> " . $row['renavan'] . "</p>";
        echo "<br>";
        echo "<p><strong>Serviço Realizado:</strong> Manutenção veícular</p>";
        echo "<p><strong>Descrição dos Serviços:</strong> " . $row['serv_exec'] . "</p>";
        echo "<p><strong>Data da Manutenção:</strong> " . $row['dat_abert'] . "</p>";
        echo "<br>";
        echo "<p><strong>Termos e Condições da Garantia:</strong></p>";
        echo "<p><strong>Período de Garantia:</strong> A manutenção realizada possui garantia de 90 dias a partir da data da realização do serviço.</p>";
        echo "<p><strong>Cobertura da Garantia:</strong> Esta garantia cobre apenas os serviços realizados e as peças substituídas listadas na descrição dos serviços. Qualquer defeito decorrente do trabalho executado será reparado sem custo adicional dentro do período de garantia.</p>";
        echo "<p><strong>Exclusões da Garantia:</strong> A garantia não cobre:</p>";
        echo "<ul>";
        echo "<li>Desgaste normal de peças e componentes.</li>";
        echo "<li>Danos causados por acidentes, uso indevido, negligência, ou modificações no veículo.</li>";
        echo "<li>Serviços ou reparos realizados por terceiros não autorizados pela Oficina das Rodas.</li>";
        echo "<li>Peças e componentes que não foram substituídos ou trabalhados pela Oficina das Rodas.</li>";
        echo "</ul>";
        echo "<p><strong>Obrigações do Cliente:</strong> Para manter a validade da garantia, o cliente deve:</p>";
        echo "<ul>";
        echo "<li>Seguir as recomendações de manutenção e uso do fabricante do veículo.</li>";
        echo "<li>Realizar todas as revisões periódicas recomendadas pela Oficina das Rodas.</li>";
        echo "</ul>";
        echo "<p><strong>Procedimento para Reivindicação de Garantia:</strong> Em caso de necessidade de acionar a garantia, o cliente deve:</p>";
        echo "<ul>";
        echo "<li>Entrar em contato com a Oficina das Rodas através dos meios de contato fornecidos.</li>";
        echo "<li>Apresentar este termo de garantia juntamente com a nota fiscal do serviço.</li>";
        echo "<li>Levar o veículo à Oficina das Rodas para inspeção e reparo.</li>";
        echo "</ul>";
        echo "<p><strong>Declaração:</strong> Ao assinar este documento, o cliente reconhece que leu e compreendeu os termos e condições da garantia, e concorda com todas as cláusulas aqui descritas.</p>";
        echo "<br><br>";
        echo "<p>__________________________________</p>";
        echo "<p>Assinatura do Cliente</p>";
        echo "<br><br>";
        echo "</div>";
        echo "</body></html>";
    } else {
        echo "<html><body><p>Ordem de Serviço não encontrada.</p></body></html>";
    }

    $stmt->close();
}
$conn->close();
?>

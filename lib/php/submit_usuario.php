<?php
require './conection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verifique se os campos do formulário foram enviados
    if (isset($_POST['nome'], $_POST['email'], $_POST['senha'], $_POST['permissions'], $_POST['tipo'])) {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = $_POST['senha'];
        $tipo = $_POST['tipo'];

        // Defina os índices necessários no array de permissões
        $permissions = array(
            'cadastrar_empresa' => 0,
            'visualizar_empresa' => 0,
            'cadastrar_usuario' => 0,
            'cadastrar_cliente' => 0,
            'visualizar_cliente' => 0,
            'abrir_alterar_ordem' => 0,
            'visualizar_ordem_servico' => 0,
            'registrar_manutencao' => 0,
            'gerar_termo_garantia' => 0
        );

        // Defina as permissões com base no tipo de usuário
        switch ($tipo) {
            case 'Administrador':
                $permissions['cadastrar_empresa'] = 1;
                $permissions['visualizar_empresa'] = 1;
                $permissions['cadastrar_usuario'] = 1;
                $permissions['cadastrar_cliente'] = 1;
                $permissions['visualizar_cliente'] = 1;
                $permissions['abrir_alterar_ordem'] = 1;
                $permissions['visualizar_ordem_servico'] = 1;
                $permissions['registrar_manutencao'] = 1;
                $permissions['gerar_termo_garantia'] = 1;
                break;
            case 'Gerente':
                $permissions['cadastrar_usuario'] = 1;
                $permissions['cadastrar_cliente'] = 1;
                $permissions['abrir_alterar_ordem'] = 1;
                $permissions['visualizar_empresa'] = 1;
                $permissions['visualizar_cliente'] = 1;
                $permissions['visualizar_ordem_servico'] = 1;
                $permissions['gerar_termo_garantia'] = 1;
                break;
            case 'Mecanico':
                $permissions['visualizar_empresa'] = 1;
                $permissions['visualizar_cliente'] = 1;
                $permissions['visualizar_ordem_servico'] = 1;
                $permissions['registrar_manutencao'] = 1;
                break;
            default:
                echo "Tipo de usuário inválido.";
                exit();
        }

        // Prepara e executa a consulta SQL INSERT
        $stmt = $pdo->prepare("INSERT INTO usuario (nome, email, senha, tipo, perCadEmpresa, perVisualizarEmpresa, perCadUsuario, perCadCliente, perVisualizarCliente, perAbrirOs, perVisualizarOs, perRegisManutencao, perGerarTermo) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->execute([$nome, $email, $senha, $tipo, $permissions['cadastrar_empresa'], $permissions['visualizar_empresa'], $permissions['cadastrar_usuario'], $permissions['cadastrar_cliente'], $permissions['visualizar_cliente'], $permissions['abrir_alterar_ordem'], $permissions['visualizar_ordem_servico'], $permissions['registrar_manutencao'], $permissions['gerar_termo_garantia']]);
        
        echo "Dados inseridos com sucesso!";
        exit();
    } else {
        echo "Campos obrigatórios não foram preenchidos.";
        exit();
    }
} else {
    echo "Método de requisição inválido.";
    exit();
}
?>

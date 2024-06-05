<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    // Se não estiver logado, redirecionar para a página de login
    header('Location: index.php');
    exit();
}

$user_id = $_SESSION['user_id'];
$email = $_SESSION['email'];

// Função para verificar as permissões do usuário
function verificarPermissao($user_id, $acao, $conexao) {
    $sql = "SELECT {$acao} FROM usuario WHERE id = {$user_id}";
    $result = mysqli_query($conexao, $sql);
    $row = mysqli_fetch_assoc($result);
    return $row[$acao];
}

$conexao = mysqli_connect('localhost', 'root', '', 'oficinadasrodas');

// Verificar se o usuário tem permissão para cadastrar cliente
if (!verificarPermissao($user_id, 'perCadCliente', $conexao)) {
    echo "<div class='mensagem'>Você não tem permissão para acessar essa página.</div>";
    echo "<style>.mensagem { position: fixed; top: 50%; left: 50%; transform: translate(-50%, -50%); background-color: #f8d7da; color: #721c24; border: 1px solid #f5c6cb; padding: 10px; border-radius: 5px; }</style>";
    echo "<script>setTimeout(function(){ document.querySelector('.mensagem').style.display = 'none'; window.location.href = 'painel.php'; }, 3000);</script>";
} else {
}
?>

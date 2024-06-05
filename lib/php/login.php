<?php
session_start();
require 'conection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (!empty($email) && !empty($password)) {
        // Busca o usuário pelo email
        $stmt = $pdo->prepare('SELECT * FROM usuario WHERE email = ?');
        $stmt->execute([$email]);
        $user = $stmt->fetch();

        // Verificar se o usuário foi encontrado e se a senha está correta
        if ($user && $password === $user['senha']) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            header('Location: ../../painel.php');
            exit();
        } else {
            $_SESSION['error_message'] = 'Email ou senha inválidos.';
            header('Location: ../../index.php');
            exit();
        }
    } else {
        $_SESSION['error_message'] = 'Por favor, preencha os campos de email e senha.';
        header('Location: ../../index.php');
        exit();
    }
} else {
    $_SESSION['error_message'] = 'Método de requisição inválido.';
    header('Location: ../../index.php');
    exit();
}
?>

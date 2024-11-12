<?php
session_start();

// Verifica se o usuário está logado
if (!isset($_SESSION['id'])) {
    // Se não estiver logado, redireciona para a página de login
    header("Location: login.html");
    exit();
}

// Exibe o painel de controle
echo "<h2>Bem-vindo ao seu painel, " . $_SESSION['nome'] . "!</h2>";
echo "<a href='logout.php'>Sair</a>";
?>

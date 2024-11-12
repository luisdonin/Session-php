<?php
session_start();


if (!isset($_SESSION['id'])) {
    
    header("Location: login.html");
    exit();
}

echo "<h2>Bem-vindo ao dashboard, " . $_SESSION['nome'] . "!</h2>";
echo "<a href='logout.php'>Sair</a>";
?>

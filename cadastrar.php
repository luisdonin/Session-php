<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Login";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verificação e inserção dos dados
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $login = $_POST['login'];
    $senha = md5($_POST['senha']); // Criptografando a senha com MD5

    $sql = "INSERT INTO usuarios (nome, login, senha) VALUES ('$nome', '$login', '$senha')";

    if ($conn->query($sql) === TRUE) {
        // Se o cadastro for bem-sucedido, redireciona para a página de login
        echo "Usuário cadastrado com sucesso!";
        header("Location: login.html");  // Redireciona para a página de login
        exit();  // Garante que o script seja interrompido após o redirecionamento
    } else {
        echo "Erro ao cadastrar usuário: " . $conn->error;
    }
}

$conn->close();
?>

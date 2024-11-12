<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Login";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST['nome'];
    $login = $_POST['login'];
    $senha = md5($_POST['senha']);
    $sql = "INSERT INTO usuarios (nome, login, senha) VALUES ('$nome', '$login', '$senha')";

    if ($conn->query($sql) === TRUE) {
        
        echo "Usuário cadastrado com sucesso!";
        header("Location: login.html");  
        exit(); 
    } else {
        echo "Erro ao cadastrar usuário: " . $conn->error;
    }
}

$conn->close();
?>

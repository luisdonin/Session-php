<?php
session_start();  // Start the session at the beginning

// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Login";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}

// Verificação dos dados de login
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'];
    $senha = md5($_POST['senha']); // Criptografando a senha com MD5

    $sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Login bem-sucedido, salvar informações do usuário na sessão
        $user = $result->fetch_assoc();
        $_SESSION['id'] = $user['id'];
        $_SESSION['nome'] = $user['nome'];
        $_SESSION['login'] = $user['login'];

        echo "Login bem-sucedido! Olá, " . $_SESSION['nome'];
        // Redirecionar para uma página protegida, como um painel de controle
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Login ou senha incorretos.";
    }
}

$conn->close();
?>

<?php
session_start();  


$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Login";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexão falhou: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $login = $_POST['login'];
    $senha = md5($_POST['senha']); 

    $sql = "SELECT * FROM usuarios WHERE login = '$login' AND senha = '$senha'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        
        $user = $result->fetch_assoc();
        $_SESSION['id'] = $user['id'];
        $_SESSION['nome'] = $user['nome'];
        $_SESSION['login'] = $user['login'];

        echo "Login bem-sucedido! Olá, " . $_SESSION['nome'];
       
        header("Location: dashboard.php");
        exit();
    } else {
        echo "Login ou senha incorretos.";
    }
}

$conn->close();
?>

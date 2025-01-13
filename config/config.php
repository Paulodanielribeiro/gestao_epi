<?php
$host = "localhost";      // Servidor
$usuario = "root";        // Usuário padrão do XAMPP/WAMP
$senha = "";              // Senha padrão (vazia)
$banco = "gestao_epi";    // Nome do banco de dados

// Conectar ao banco de dados
$conn = new mysqli($host, $usuario, $senha, $banco);

// Verificar a conexão
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}

// echo "Conexão bem-sucedida!";
?>

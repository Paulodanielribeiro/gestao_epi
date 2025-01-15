<?php
$host = 'localhost';
$user = 'root';
$password = '';
$dbname = 'gestao_epi';

// Conexão com o banco de dados
$conn = new mysqli($host, $user, $password, $dbname);

// Verificação de erro
if ($conn->connect_error) {
    die("Falha na conexão: " . $conn->connect_error);
}
?>

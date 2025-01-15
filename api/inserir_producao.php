<?php
include '../config/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $produto = $_POST['produto'];
    $quantidade = $_POST['quantidade'];
    $data_producao = $_POST['data_producao'];

    $stmt = $conn->prepare("INSERT INTO producao (produto, quantidade, data_producao) VALUES (?, ?, ?)");
    $stmt->bind_param("sis", $produto, $quantidade, $data_producao);

    if ($stmt->execute()) {
        echo "Produção registrada com sucesso!";
    } else {
        echo "Erro ao registrar: " . $stmt->error;
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Registrar Produção</title>
</head>
<body>
    <h1>Registrar Produção</h1>
    <form method="POST">
        Produto: <input type="text" name="produto" required><br>
        Quantidade: <input type="number" name="quantidade" required><br>
        Data de Produção: <input type="date" name="data_producao" required><br>
        <button type="submit">Registrar</button>
    </form>
</body>
</html>

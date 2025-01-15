<?php
include '../config/db.php';

$result = $conn->query("SELECT * FROM producao ORDER BY data_producao DESC");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Histórico de Produção</title>
</head>
<body>
    <h1>Histórico de Produção</h1>
    <table border="1">
        <tr>
            <th>Produto</th>
            <th>Quantidade</th>
            <th>Data de Produção</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['produto']) ?></td>
                <td><?= $row['quantidade'] ?></td>
                <td><?= date('d/m/Y', strtotime($row['data_producao'])) ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
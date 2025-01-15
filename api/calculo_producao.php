<?php
include '../config/db.php';

$semanal = $conn->query("SELECT produto, SUM(quantidade) AS total FROM producao WHERE YEARWEEK(data_producao, 1) = YEARWEEK(CURDATE(), 1) GROUP BY produto");

$mensal = $conn->query("SELECT produto, SUM(quantidade) AS total FROM producao WHERE MONTH(data_producao) = MONTH(CURDATE()) AND YEAR(data_producao) = YEAR(CURDATE()) GROUP BY produto");
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Produção Semanal/Mensal</title>
</head>
<body>
    <h1>Produção Semanal</h1>
    <table border="1">
        <tr>
            <th>Produto</th>
            <th>Total</th>
        </tr>
        <?php while ($row = $semanal->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['produto']) ?></td>
                <td><?= $row['total'] ?></td>
            </tr>
        <?php endwhile; ?>
    </table>

    <h1>Produção Mensal</h1>
    <table border="1">
        <tr>
            <th>Produto</th>
            <th>Total</th>
        </tr>
        <?php while ($row = $mensal->fetch_assoc()): ?>
            <tr>
                <td><?= htmlspecialchars($row['produto']) ?></td>
                <td><?= $row['total'] ?></td>
            </tr>
        <?php endwhile; ?>
    </table>
</body>
</html>
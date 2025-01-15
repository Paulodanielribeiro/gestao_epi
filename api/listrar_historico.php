<?php
include '../config/db.php';

$historico = $conn->query("
    SELECT c.nome AS colaborador, e.nome_epi, en.quantidade, en.data_entrega
    FROM entregas en
    JOIN colaboradores c ON en.colaborador_id = c.id
    JOIN epis e ON en.epi_id = e.id
    ORDER BY en.data_entrega DESC
");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Histórico de Entregas</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <h1>Histórico de Entregas de EPIs</h1>
    
    <table border="1">
        <thead>
            <tr>
                <th>Colaborador</th>
                <th>EPI</th>
                <th>Quantidade</th>
                <th>Data de Entrega</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $historico->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($row['colaborador']) ?></td>
                    <td><?= htmlspecialchars($row['nome_epi']) ?></td>
                    <td><?= $row['quantidade'] ?></td>
                    <td><?= date('d/m/Y', strtotime($row['data_entrega'])) ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>

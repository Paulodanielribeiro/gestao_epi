<?php
include '../config/db.php';

// Total de colaboradores
$total_colaboradores = $conn->query("SELECT COUNT(*) AS total FROM colaboradores")->fetch_assoc()['total'];

// Total de EPIs
$total_epis = $conn->query("SELECT COUNT(*) AS total FROM epis")->fetch_assoc()['total'];

// EPIs mais distribuídos
$epis_distribuidos = $conn->query("
    SELECT e.nome_epi, SUM(en.quantidade) AS total
    FROM entregas en
    JOIN epis e ON en.epi_id = e.id
    GROUP BY e.nome_epi
    ORDER BY total DESC
    LIMIT 5
");
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Dashboard - Gestão de EPIs</title>
    <link rel="stylesheet" href="../assets/style.css">
</head>
<body>
    <h1>Dashboard de Gestão de EPIs</h1>

    <div>
        <h3>Total de Colaboradores: <?= $total_colaboradores ?></h3>
        <h3>Total de EPIs Cadastrados: <?= $total_epis ?></h3>
    </div>

    <h2>EPIs Mais Distribuídos</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Nome do EPI</th>
                <th>Total Distribuído</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($epi = $epis_distribuidos->fetch_assoc()): ?>
                <tr>
                    <td><?= htmlspecialchars($epi['nome_epi']) ?></td>
                    <td><?= $epi['total'] ?></td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>
</html>

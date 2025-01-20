
<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

require_once '../config/db.php';

$stmt = $pdo->query("SELECT * FROM entregas");
$dados = $stmt->fetchAll(PDO::FETCH_ASSOC);
echo json_encode($dados);
?>
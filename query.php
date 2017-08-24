<?php
require_once('connection.php');
$query = $_GET['query'];
$result = array();
$stmt = $pdo->prepare("SELECT name FROM products WHERE name LIKE :query");
$stmt->bindValue(':query', '%' . $query . '%' );
$stmt->execute();

foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $row) {
    $result[] = array('product' => $row["product"]);
}
echo json_encode($result);
?>
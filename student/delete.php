<?php
include 'db.php';
$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM attendance WHERE id = :id");
$stmt->execute(['id' => $id]);

header("Location: index.php");
exit;

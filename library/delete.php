<?php
include 'db.php';
$id = $_GET['id'];

$stmt = $pdo->prepare("DELETE FROM books WHERE id = :id");
$stmt->execute(['id' => $id]);

header("Location: index.php");
exit;


<?php
include 'db.php';
$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM attendance WHERE id = :id");
$stmt->execute(['id' => $id]);
$row = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE attendance SET student_name = :name, date = :date, status = :status WHERE id = :id");
    $stmt->execute([
        'name' => $_POST['student_name'],
        'date' => $_POST['date'],
        'status' => $_POST['status'],
        'id' => $id
    ]);
    header("Location: index.php");
    exit;
}
?>

<h2>✏️ Edit Attendance Record</h2>
<form method="POST">
    Student Name: <input name="student_name" value="<?= $row['student_name'] ?>"><br>
    Date: <input type="date" name="date" value="<?= $row['date'] ?>"><br>
    Status:
    <select name="status">
        <option value="Present" <?= $row['status'] == 'Present' ? 'selected' : '' ?>>Present</option>
        <option value="Absent" <?= $row['status'] == 'Absent' ? 'selected' : '' ?>>Absent</option>
        <option value="Late" <?= $row['status'] == 'Late' ? 'selected' : '' ?>>Late</option>
    </select><br>
    <button type="submit">Update</button>
</form>
<a href="index.php">← Back</a>

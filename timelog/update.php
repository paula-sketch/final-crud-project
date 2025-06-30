<?php
include 'db.php';
$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM timelogs WHERE id = :id");
$stmt->execute(['id' => $id]);
$row = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE timelogs SET employee_name = :name, log_date = :date, log_time = :time, type = :type WHERE id = :id");
    $stmt->execute([
        'name' => $_POST['employee_name'],
        'date' => $_POST['log_date'],
        'time' => $_POST['log_time'],
        'type' => $_POST['type'],
        'id' => $id
    ]);
    header("Location: index.php");
    exit;
}
?>

<h2>✏️ Edit Timelog</h2>
<form method="POST">
    Employee Name: <input name="employee_name" value="<?= $row['employee_name'] ?>"><br>
    Date: <input type="date" name="log_date" value="<?= $row['log_date'] ?>"><br>
    Time: <input type="time" name="log_time" value="<?= $row['log_time'] ?>"><br>
    Type:
    <select name="type">
        <option value="IN" <?= $row['type'] === 'IN' ? 'selected' : '' ?>>IN</option>
        <option value="OUT" <?= $row['type'] === 'OUT' ? 'selected' : '' ?>>OUT</option>
    </select><br>
    <button type="submit">Update</button>
</form>
<a href="index.php">← Back</a>

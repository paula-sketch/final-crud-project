<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO attendance (student_name, date, status) VALUES (:name, :date, :status)");
    $stmt->execute([
        'name' => $_POST['student_name'],
        'date' => $_POST['date'],
        'status' => $_POST['status']
    ]);
    header("Location: index.php");
    exit;
}
?>

<h2>➕ Add Attendance Record</h2>
<form method="POST">
    Student Name: <input name="student_name"><br>
    Date: <input type="date" name="date"><br>
    Status:
    <select name="status">
        <option value="Present">Present</option>
        <option value="Absent">Absent</option>
        <option value="Late">Late</option>
    </select><br>
    <button type="submit">Save</button>
</form>
<a href="index.php">← Back</a>

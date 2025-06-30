<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO timelogs (employee_name, log_date, log_time, type) VALUES (:name, :date, :time, :type)");
    $stmt->execute([
        'name' => $_POST['employee_name'],
        'date' => $_POST['log_date'],
        'time' => $_POST['log_time'],
        'type' => $_POST['type']
    ]);
    header("Location: index.php");
    exit;
}
?>

<h2>➕ Add Timelog</h2>
<form method="POST">
    Employee Name: <input name="employee_name"><br>
    Date: <input type="date" name="log_date"><br>
    Time: <input type="time" name="log_time"><br>
    Type:
    <select name="type">
        <option value="IN">IN</option>
        <option value="OUT">OUT</option>
    </select><br>
    <button type="submit">Add Log</button>
</form>
<a href="index.php">← Back</a>

<?php include 'db.php'; ?>

<h2>📘 Employee Timelog Records</h2>
<a href="create.php">➕ Add Timelog</a>
<table border="1" cellpadding="5">
    <tr><th>Employee</th><th>Date</th><th>Time</th><th>Type</th><th>Actions</th></tr>
    <?php
    $stmt = $pdo->query("SELECT * FROM timelogs ORDER BY log_date DESC, log_time DESC");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
            <td>{$row['employee_name']}</td>
            <td>{$row['log_date']}</td>
            <td>{$row['log_time']}</td>
            <td>{$row['type']}</td>
            <td>
                <a href='update.php?id={$row['id']}'>Edit</a> |
                <a href='delete.php?id={$row['id']}' onclick=\"return confirm('Delete this log?')\">Delete</a>
            </td>
        </tr>";
    }
    ?>
</table>

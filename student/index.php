<?php include 'db.php'; ?>

<h2>📋 Student Attendance Records</h2>
<a href="create.php">➕ Add New Record</a>
<table border="1" cellpadding="5">
    <tr><th>Name</th><th>Date</th><th>Status</th><th>Actions</th></tr>
    <?php
    $stmt = $pdo->query("SELECT * FROM attendance ORDER BY date DESC");
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
            <td>{$row['student_name']}</td>
            <td>{$row['date']}</td>
            <td>{$row['status']}</td>
            <td>
                <a href='update.php?id={$row['id']}'>Edit</a> |
                <a href='delete.php?id={$row['id']}' onclick=\"return confirm('Delete this record?')\">Delete</a>
            </td>
        </tr>";
    }
    ?>
</table>

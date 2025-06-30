<?php include 'db.php'; ?>

<h2>🎬 Movie List</h2>
<a href="create.php">➕ Add New Movie</a>
<table border="1" cellpadding="5">
    <tr><th>Title</th><th>Director</th><th>Year</th><th>Status</th><th>Actions</th></tr>
    <?php
    $stmt = $pdo->query("SELECT * FROM movies");
    while ($movie = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $status = $movie['available'] ? 'Available' : 'Not Available';
        echo "<tr>
            <td>{$movie['title']}</td>
            <td>{$movie['director']}</td>
            <td>{$movie['release_year']}</td>
            <td>$status</td>
            <td>
                <a href='update.php?id={$movie['id']}'>Edit</a> |
                <a href='delete.php?id={$movie['id']}' onclick=\"return confirm('Delete this movie?')\">Delete</a>
            </td>
        </tr>";
    }
    ?>
</table>

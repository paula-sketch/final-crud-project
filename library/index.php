<?php include 'db.php'; ?>

<h2>📚 Book List</h2>
<a href="create.php">➕ Add New Book</a>
<table border="1" cellpadding="5">
    <tr><th>Title</th><th>Author</th><th>Year</th><th>Genre</th><th>Actions</th></tr>
    <?php
    $stmt = $pdo->query("SELECT * FROM books");
    while ($book = $stmt->fetch(PDO::FETCH_ASSOC)) {
        echo "<tr>
            <td>{$book['title']}</td>
            <td>{$book['author']}</td>
            <td>{$book['published_year']}</td>
            <td>{$book['genre']}</td>
            <td>
                <a href='update.php?id={$book['id']}'>Edit</a> |
                <a href='delete.php?id={$book['id']}' onclick=\"return confirm('Delete this book?')\">Delete</a>
            </td>
        </tr>";
    }
    ?>
</table>

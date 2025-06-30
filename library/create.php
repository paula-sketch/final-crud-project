<?php
include 'db.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $stmt = $pdo->prepare("INSERT INTO books (title, author, published_year, genre) VALUES (:title, :author, :year, :genre)");
    $stmt->execute([
        'title' => $_POST['title'],
        'author' => $_POST['author'],
        'year' => $_POST['year'],
        'genre' => $_POST['genre']
    ]);
    header("Location: index.php");
    exit;
}
?>

<h2>➕ Add New Book</h2>
<form method="post">
    Title: <input name="title"><br>
    Author: <input name="author"><br>
    Year: <input name="year" type="number"><br>
    Genre: <input name="genre"><br>
    <button type="submit">Save Book</button>
</form>
<a href="index.php">← Back</a>

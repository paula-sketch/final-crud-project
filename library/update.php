<?php
include 'db.php';
$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM books WHERE id = :id");
$stmt->execute(['id' => $id]);
$book = $stmt->fetch();

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $stmt = $pdo->prepare("UPDATE books SET title = :title, author = :author, published_year = :year, genre = :genre WHERE id = :id");
    $stmt->execute([
        'title' => $_POST['title'],
        'author' => $_POST['author'],
        'year' => $_POST['year'],
        'genre' => $_POST['genre'],
        'id' => $id
    ]);
    header("Location: index.php");
    exit;
}
?>

<h2>✏️ Edit Book</h2>
<form method="post">
    Title: <input name="title" value="<?= $book['title'] ?>"><br>
    Author: <input name="author" value="<?= $book['author'] ?>"><br>
    Year: <input name="year" type="number" value="<?= $book['published_year'] ?>"><br>
    Genre: <input name="genre" value="<?= $book['genre'] ?>"><br>
    <button type="submit">Update</button>
</form>
<a href="index.php">← Back</a>

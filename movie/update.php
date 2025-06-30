<?php
include 'db.php';
$id = $_GET['id'];

$stmt = $pdo->prepare("SELECT * FROM movies WHERE id = :id");
$stmt->execute(['id' => $id]);
$movie = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("UPDATE movies SET title = :title, director = :director, release_year = :year, available = :available WHERE id = :id");
    $stmt->execute([
        'title' => $_POST['title'],
        'director' => $_POST['director'],
        'year' => $_POST['release_year'],
        'available' => $_POST['available'],
        'id' => $id
    ]);
    header("Location: index.php");
    exit;
}
?>

<h2>✏️ Edit Movie</h2>
<form method="POST">
    Title: <input name="title" value="<?= $movie['title'] ?>"><br>
    Director: <input name="director" value="<?= $movie['director'] ?>"><br>
    Year: <input name="release_year" type="number" value="<?= $movie['release_year'] ?>"><br>
    Available:
    <select name="available">
        <option value="1" <?= $movie['available'] ? 'selected' : '' ?>>Yes</option>
        <option value="0" <?= !$movie['available'] ? 'selected' : '' ?>>No</option>
    </select><br>
    <button type="submit">Update</button>
</form>
<a href="index.php">← Back</a>

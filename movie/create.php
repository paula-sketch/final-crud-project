<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $stmt = $pdo->prepare("INSERT INTO movies (title, director, release_year, available) VALUES (:title, :director, :year, :available)");
    $stmt->execute([
        'title' => $_POST['title'],
        'director' => $_POST['director'],
        'year' => $_POST['release_year'],
        'available' => $_POST['available'] === '1' ? true : false
    ]);
    header("Location: index.php");
    exit;
}
?>

<h2>➕ Add New Movie</h2>
<form method="POST">
    Title: <input name="title"><br>
    Director: <input name="director"><br>
    Year: <input name="release_year" type="number"><br>
    Available:
    <select name="available">
        <option value="1">Yes</option>
        <option value="0">No</option>
    </select><br>
    <button type="submit">Add Movie</button>
</form>
<a href="index.php">← Back</a>

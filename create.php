<?php
include 'db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("INSERT INTO tasks (title, description) VALUES (:title, :description)");
    $stmt->execute(['title' => $title, 'description' => $description]);

    header('Location: index.php');
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Add Task</title>
</head>

<body>
    <div class="container">
        <h1>Add New Task</h1>
        <form method="POST">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" required>
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="4"></textarea>
            <button type="submit" class="button">Add Task</button>
        </form>
    </div>
</body>

</html>
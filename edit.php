<?php
include 'db.php';

$id = $_GET['id'];
$stmt = $conn->prepare("SELECT * FROM tasks WHERE id = :id");
$stmt->execute(['id' => $id]);
$task = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];

    $stmt = $conn->prepare("UPDATE tasks SET title = :title, description = :description WHERE id = :id");
    $stmt->execute(['title' => $title, 'description' => $description, 'id' => $id]);

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
    <title>Edit Task</title>
</head>

<body>
    <div class="container">
        <h1>Edit Task</h1>
        <form method="POST">
            <label for="title">Title</label>
            <input type="text" name="title" id="title" value="<?= htmlspecialchars($task['title']) ?>" required>
            <label for="description">Description</label>
            <textarea name="description" id="description" rows="4"><?= htmlspecialchars($task['description']) ?></textarea>
            <button type="submit" class="button">Update Task</button>
        </form>
    </div>
</body>

</html>

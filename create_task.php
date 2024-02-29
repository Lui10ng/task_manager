<!-- create_task.php -->
<?php
require_once('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $priority = $_POST['priority'];
    $due_date = $_POST['due_date'];

    $sql = "INSERT INTO tasks (title, description, priority, due_date) VALUES (?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$title, $description, $priority, $due_date]);

    header('Location: view_tasks.php');
    exit;
}
?>

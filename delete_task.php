<!-- delete_task.php -->
<?php
require_once('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'GET' && isset($_GET['task_id'])) {
    $task_id = $_GET['task_id'];

    // Perform the delete operation in the database
    $sql = "DELETE FROM tasks WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$task_id]);

    // Redirect back to the view_tasks.php page after deletion
    header('Location: view_tasks.php');
    exit;
} else {
    echo "Invalid request";
}
?>

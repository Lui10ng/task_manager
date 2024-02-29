<!-- update_task.php -->
<?php
require_once('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if all required fields are set
    if (isset($_POST['task_id'], $_POST['title'], $_POST['description'], $_POST['priority'], $_POST['due_date'])) {
        $task_id = $_POST['task_id'];
        $title = $_POST['title'];
        $description = $_POST['description'];
        $priority = $_POST['priority'];
        $due_date = $_POST['due_date'];

        // Update the task in the database
        $sql = "UPDATE tasks SET title = ?, description = ?, priority = ?, due_date = ? WHERE id = ?";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([$title, $description, $priority, $due_date, $task_id]);

        // Redirect to view_tasks.php after updating
        header('Location: view_tasks.php');
        exit;
    } else {
        echo "Missing required fields.";
    }
} else {
    echo "Invalid request method.";
}
?>

<!-- edit_task.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Task</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 1em 0;
        }

        main {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h2 {
            color: #333;
        }

        form {
            display: grid;
            gap: 10px;
        }

        label {
            font-weight: bold;
        }

        input,
        textarea,
        select {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
        }

        button {
            background-color: #333;
            color: #fff;
            padding: 10px;
            border: none;
            cursor: pointer;
            border-radius: 4px;
        }

        button:hover {
            background-color: #555;
        }
    </style>
</head>
<body>
    <header>
        <!-- Include header content -->
    </header>
    <main>
        <h2>Edit Task</h2>
        <?php
        require_once('db.php');

        // Check if task_id is set in the URL
        if (isset($_GET['task_id'])) {
            $task_id = $_GET['task_id'];

            // Fetch task details for editing
            $sql = "SELECT * FROM tasks WHERE id = ?";
            $stmt = $pdo->prepare($sql);
            $stmt->execute([$task_id]);
            $task = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($task) {
                // Display the form for editing
                ?>
                <form action="update_task.php" method="POST">
                    <input type="hidden" name="task_id" value="<?php echo $task_id; ?>">

                    <label for="title">Title:</label>
                    <input type="text" name="title" value="<?php echo $task['title']; ?>" required>

                    <label for="description">Description:</label>
                    <textarea name="description"><?php echo $task['description']; ?></textarea>

                    <label for="priority">Priority:</label>
                    <select name="priority">
                        <option value="Low" <?php echo ($task['priority'] === 'Low') ? 'selected' : ''; ?>>Low</option>
                        <option value="Medium" <?php echo ($task['priority'] === 'Medium') ? 'selected' : ''; ?>>Medium</option>
                        <option value="High" <?php echo ($task['priority'] === 'High') ? 'selected' : ''; ?>>High</option>
                    </select>

                    <label for="due_date">Due Date:</label>
                    <input type="date" name="due_date" value="<?php echo $task['due_date']; ?>">

                    <button type="submit">Update Task</button>
                </form>
                <?php
            } else {
                echo "Task not found.";
            }
        } else {
            echo "Task ID is not set in the URL.";
        }
        ?>
                                <br>
        <a href="index.html">Back to Home</a> <!-- Add this line for the button -->
    </main>
</body>
</html>

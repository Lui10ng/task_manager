<!-- view_tasks.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Include necessary head elements (title, meta tags, stylesheets) -->
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
            padding: 10px;
            text-align: center;
        }

        main {
            max-width: 800px;
            margin: 20px auto;
            background-color: #fff;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }

        h2 {
            color: #333;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        strong {
            color: #007BFF;
        }
    </style>
</head>
<body>
    <header>
        <!-- Include header content -->
    </header>
    <main>
        <h2>View Tasks</h2>
        <?php
        require_once('db.php');

        try {
            $sql = "SELECT * FROM tasks";
            $stmt = $pdo->query($sql);
            $tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (!$tasks) {
                echo "<p>No tasks found.</p>";
            } else {
                echo "<table>";
                echo "<tr><th>Title</th><th>Description</th><th>Priority</th><th>Due Date</th><th>Edit</th><th>Delete</th></tr>";
                foreach ($tasks as $task) {
                    echo "<tr>";
                    echo "<td><strong>{$task['title']}</strong></td>";
                    echo "<td>{$task['description']}</td>";
                    echo "<td>{$task['priority']}</td>";
                    echo "<td>{$task['due_date']}</td>";
                    
                    // Add an edit link for each task
                    echo "<td><a href=\"edit_task.php?task_id={$task['id']}\">Edit</a></td>";
                    
                    // Add a delete button for each task
                    echo "<td><a href=\"delete_task.php?task_id={$task['id']}\">Delete</a></td>";
                    
                    echo "</tr>";
                }
                echo "</table>";
            }
        } catch (PDOException $e) {
            die("Error: " . $e->getMessage());
        }
        ?>
                        <br>
        <a href="index.html">Back to Home</a> <!-- Add this line for the button -->
    </main>
</body>
</html>

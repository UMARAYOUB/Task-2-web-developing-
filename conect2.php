<?php
// Retrieving form data
$task_title = $_POST['task_title'];
$task_description = $_POST['task_description'];

// Establishing a connection to the database
$conn = new mysqli('localhost', 'root', '', 'taskmanages');

// Checking the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    // Preparing and executing the statement for inserting data into the 'task' table
    $stmt_task = $conn->prepare("INSERT INTO task (Tittle, Discreption) VALUES (?, ?)");
    $stmt_task->bind_param("ss", $task_title, $task_description); 
    $task_inserted = $stmt_task->execute();

    // Checking if insertion was successful
    if ($task_inserted) {
        echo "Task inserted successfully.";
    } else {
        echo "Failed to insert task.";
    }

    // Closing the statement and database connection
    $stmt_task->close();
    $conn->close();           
}
?>

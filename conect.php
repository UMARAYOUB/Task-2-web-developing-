<?php
// Establishing a connection to the database
$conn = new mysqli('localhost', 'root', '', 'taskmanages');

// Checking the connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} else {
    // Query to retrieve data from the 'task' table
    $sql = "SELECT tittle, discreption FROM task";
    $result = $conn->query($sql);

    // Checking if there are any rows returned
    if ($result->num_rows > 0) {
        // Outputting data in HTML table format
        echo "<table border='1'>
            <tr>
                <th>Task Title</th>
                <th>Task Description</th>
            </tr>";
        // Looping through each row of the result set
        while ($row = $result->fetch_assoc()) {
            echo "<tr>
                <td>" . $row["tittle"] . "</td>
                <td>" . $row["discreption"] . "</td>
            </tr>";
        }
        echo "</table>";
    } else {
        echo "No tasks found.";
    }

    // Closing the database connection
    $conn->close();
}
?>

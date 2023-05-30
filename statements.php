<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <style>
        table{
            width: 100%;
        }
        table, tr, th, td{
            padding-left: 10px;
            border: 1px solid black;
        }
    </style>
</head>
<body>

<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


// Include the database configuration file
include_once "database-config.php";

// Perform a SELECT query to retrieve data from the database
$user_logged_in = $_SESSION['username'];
$sql = "SELECT * FROM loanapplication WHERE username='$user_logged_in'";
$result = $database_connection->query($sql);

// Check if any rows are returned
if ($result->num_rows > 0) {
    // Start the HTML table
    echo "<table>";
    echo "<tr>";
    echo "<th>Username</th>";
    echo "<th>Email</th>";
    echo "<th>Amount</th>";
    echo "<th>Duration</th>";
    echo "<th>Action</th>";
    echo "</tr>";

    // Loop through each row of data
    while ($row = $result->fetch_assoc()) {
        // Extract the values from the row
        $username = $row['username'];
        $email = $row['email'];
        $amount = $row['amount'];
        $duration = $row['duration'];

        // Display the values in table cells
        echo "<tr>";
        echo "<td>$username</td>";
        echo "<td>$email</td>";
        echo "<td>$amount sh</td>";
        echo "<td>$duration Months </td>";
        echo "<td><button type='button' class='btn btn-outline-primary'><i class='bi bi-credit-card'> Repay</Button></i></td>";
        echo "</tr>";
    }

    // Close the HTML table
    echo "</table>";
} else {
    // If no rows are returned, display a message
    echo "No data found in the database.";
}

// Close the database connection
$database_connection->close();
?>
</body>
</html>
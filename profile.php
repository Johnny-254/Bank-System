<?php 
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
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
            border: 1px solid black;
        }
    </style>
</head>
<body>
    <div class="profile">
    <?php
        echo "<table>
            <tr>
                <th>Username</th>
                <th>Email</th>
                <th>Password</th>
                <th colspan='2'>Action</th>
            </tr>";
            include_once "database-config.php";
            $user_logged_in = $_SESSION['username'];
            $sql = "SELECT * FROM users WHERE username='$user_logged_in'";
            $result = $database_connection->query($sql);
            // var_dump($result);
            $row = $result->fetch_assoc();
            echo "<tr>
                    <td>".$row['username']. "</td>
                    <td>".$row['email']."</td>
                    <td>".$row['password']. "</td>
                    <td><a href='edit.php?id=$row[id]'><button type='button' class='btn btn-outline-primary'><i class='bi bi-pencil-square'> Edit</Button></i></a></td>
                    <td><a href='delete.php?id=$row[id]'><button type='button' class='btn btn-outline-danger'><i class='bi bi-person-dash'> Button</button></i></a></td>
                </tr>";
        echo "</table>";
?>
    </div>
</body>
</html>

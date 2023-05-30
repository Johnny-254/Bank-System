<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php include_once "top-nav.php"; ?>
    <div class="register">
        <form action="login.php" method="post">
            <fieldset>
                <legend>Log-In</legend>
                <div class="field">
                    <div class="">
                        <label for="username">Username</label>
                        <input type="text" name="username" placeholder="Enter Username">
                    </div>
                    <div>
                        <label for="password">Password</label>
                        <input type="password" name="password" placeholder="Enter Password">
                    </div>
                    <div>
                        <button type="submit" name="login">Log-in</button>
                        <!-- <input type="submit" name="signup" value="Signup"> -->
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
    <?php
    if(isset($_POST["login"])) {
        // echo "You clicked login";
        $username = $_POST['username'];
        $password = $_POST['password'];
        // echo $username. " ". $password;

        include_once "database-config.php";

        echo "<br>";

        $sql = "SELECT * FROM users WHERE username = '$username' AND password = '$password'";
        $result = $database_connection->query($sql);
        
        if ($result->num_rows > 0) {
            $_SESSION['username'] = $username;
            header('location: dashboard.php');
        }else{
            echo "User not found";
        };
    }
    ?>
</body>
</html>
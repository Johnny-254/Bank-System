<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="main.css"> -->
    <title>Register</title>
</head>
<body>
    <?php include_once "top-nav.php"; ?>
    <div class="register">
        <form action="register.php" method="post">
            <fieldset>
                <legend>Sign-up</legend>
                <div class="field">
                    <div class="">
                        <label for="username">Username</label>
                        <input type="text" name="username" placeholder="Enter Username">
                    </div>
                    <div>
                        <label for="email">Email</label>
                        <input type="email" name="email" placeholder="Enter Email">
                    </div>
                    <div>
                        <label for="password">Password</label>
                        <input type="password" name="password" placeholder="Enter Password">
                    </div>
                    <div>
                        <label for="confirm-password">Confirm Password</label>
                        <input type="password" name="confirm-password" placeholder="Enter Password">
                    </div>
                    <div>
                        <button type="submit" name="signup">Sign-Up</button>
                        <!-- <input type="submit" name="signup" value="Signup"> -->
                    </div>
                    <div><p>Already have an account?<a href="login.php">Login</a>here </p></div>
                </div>
            </fieldset>
        </form>
    </div>
    <?php
    if (isset($_POST['signup'])) {
        echo "You just hit the server";
        echo "This are the values you sent to me";
        echo "<br>";
     

    include_once "database-config.php";

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $sql = "INSERT INTO users(username, email, password) VALUES('$username', '$email', '$password')";
    

    echo "<br>";
    if ($database_connection->query($sql) === TRUE) {
        echo "Registration successful";
        header('Location: login.php');
    }else{
        echo "Registration unsuccessful due to an error";
    }

}
    ?>
</body>
</html>
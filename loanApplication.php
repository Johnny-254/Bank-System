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
    <title>Loan Application</title>
</head>
<body>
    <div class="register">
        
        <form action="loanApplication.php" method="post" >
            <fieldset>
                <legend>Loan Application Form</legend>
                <div class="field">
                    <div>
                        <label for="username">Username:</label>
                        <input type="text" name="username" id="name" value="<?php echo $_SESSION['username'] ;?>" readonly><br>
                    </div>

                    <div>
                        <label for="email">Confirm Email:</label>
                        <input type="email" name="email" id="email" required><br>
                    </div>

                    <div>    
                        <label for="password">Confirm Password:</label>
                        <input type="password" name="password" id="password" required><br>
                    </div>

                    <div>
                        <label for="amount">Loan Amount:</label>
                        <input type="number" name="amount" id="amount" required><br>
                    </div>

                    <div>
                        <label for="duration">Loan Duration (in months):</label>
                        <input type="number" name="duration" id="duration" required><br>
                    </div>

                    <div>
                        <button type="submit" name="apply">Apply Loan</button>
                    </div>
                </div>
            </fieldset>
        </form>
    </div>
    <?php 
    if(isset($_POST["apply"])) {
        // echo "You clicked login";
        $password = $_POST['password'];
        $email = $_POST['email'];
        // echo $email. " ". $password;

        include_once "database-config.php";

        echo "<br>";

        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$password'";
        $result = $database_connection->query($sql);



        if ($result->num_rows > 0 ) {

            $username = $_POST['username'];
            $email = $_POST['email'];
            $amount = $_POST['amount'];
            $duration = $_POST['duration'];

            $sql2 = "INSERT INTO loanapplication(username, email, amount, duration) VALUES('$username', '$email', '$amount', '$duration')";

            

            if ($database_connection->query($sql2) === TRUE) {
                echo "<script>alert('Successfully applied for your loan. Await response.');</script>";
                echo "Data added to the database successfully.";
                header('location: dashboard.php');
            } else {
                echo "Error adding data to the database: " . $database_connection->error;
            }

        }else{
            echo "User not found";
        };
    }
    ?>
</body>
</html>
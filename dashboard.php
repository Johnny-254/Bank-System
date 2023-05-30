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
    <link rel="stylesheet" href="main.css">
    <title>Dashboard</title>
</head>
<body>
    <div class="dash">
        <div class="nav">
            <ul>
                <li><a href="dashboard.php?id=profile">View Profile</a></li>
                <li><a href="dashboard.php?id=statements">View Statement</a></li>
                <li><a href="dashboard.php?id=loans">Apply for Loans</a></li>
                <li><a href="dashboard.php?id=logout">Log-out</a></li>
            </ul>
        </div>
        <h6><?php echo "Welcome ".$_SESSION['username'];?></h6>
    </div>
    <?php
    if (isset($_GET['id'])) {
        $selected = $_GET['id'];
        switch ($selected) {
            case 'profile':
                include_once "profile.php";
                break;
            case 'statements':
                    include_once "statements.php";
                break;
            case 'loans':
                    include_once "loanApplication.php";
                break;
                case 'profile':
                    // include_once "report.php";
                break;
            case 'logout':
                include_once "logout.php";
                break;
            
            default:
                echo "404 File Not Found";
                break;
        }
    }
    ?>
</body>
</html>
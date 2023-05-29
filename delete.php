<?php
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    include_once "database-config.php";

    $sql = "DELETE FROM users WHERE id='$id'";

    if ($database_connection->query($sql) === TRUE) {
        header('Location: index.php');
    }else{
        echo "Failed to delete";
    }
}
?>
<?php 

require('./connection/config.php');

if (isset($_POST['delete'])) {
    $deleteId = $_POST['fruits_id'];
    
    $query = "DELETE FROM fruits WHERE fruits_id = '$deleteId'";
    
    $result = mysqli_query($connection, $query);

    if ($result) {
        echo "<script>alert('Successfully Deleted')</script>";
    } else {
        echo "<script>alert('Deletion Failed')</script>";
    }

    header("location: index.php");
} else {
    header("location: index.php");
}

?>

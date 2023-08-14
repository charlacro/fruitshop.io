<?php
require('./connection/config.php');

if (isset($_POST['update'])) {
    if (isset($_POST['fruits_id'])) {
        $fruits_id = $_POST['fruits_id'];
    }
    if (isset($_POST['fruits_name'])) {
        $editFruitName = $_POST['fruits_name'];
    }
    if (isset($_POST['instock'])) {
        $editInStock = $_POST['instock'];
    }
    if (isset($_POST['unit_id'])) {
        $unit_id = $_POST['unit_id'];
    } else {
        $unit_id = -1;
    }
    if (isset($_POST['imageurl'])) {
        $imageurl = $_POST['imageurl'];
    }

    $sql = "UPDATE fruits SET 
            fruits_name = '$editFruitName',
            instock = '$editInStock',
            unit_id = '$unit_id'";

    if (!empty($imageurl)) {
        $sql .= ", imageurl = '$imageurl'";
    }

    $sql .= " WHERE fruits_id = '$fruits_id'";

    $result = mysqli_query($connection, $sql);

    if ($result) {
        echo "<script>alert('Successfully Updated')</script>";
        echo "<script>window.location.href = './index.php'</script>";
    } else {
        echo "Error updating record: " . mysqli_error($connection);
    }
}

?>

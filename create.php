<?php
require('./connection/config.php');

if (isset($_POST['create'])) {
    $fldFruitsName = $_POST['fruits_name'];
    $fldInStock = intval($_POST['instock']); 
    $fldUnit = !empty($_POST['unit_id']) ? intval($_POST['unit_id']) : null; 
    $fldImageUrl = $_POST['imageurl'];

    if (!is_int($fldInStock)) {
        $fldInStock = 0;
    }

    $query = "INSERT INTO fruits (fruits_name, instock, unit_id, imageurl, created_by, updated_by) 
    VALUES ('$fldFruitsName', '$fldInStock', '$fldUnit', '$fldImageUrl', 1, 1)";    

    mysqli_query($connection, $query) || trigger_error("Query Failed: $query" . mysqli_error($connection), E_USER_ERROR);

    echo "<script>alert('Successfully created')</script>";
    echo "<script>window.location.href = './index.php'</script>";
} else {
    echo "<script>window.location.href = './index.php'</script>";
}
?>

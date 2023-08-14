<?php 

$sort = "ASC";
$col = "unit_id";

if (isset($_GET['col']) && isset($_GET['sort'])) {
    $col = $_GET['col'];
    $sort = $_GET['sort'];
    $sort == "ASC" ? $sort = "DESC" : $sort = "ASC";
}

$query = "SELECT F.*, U.unit_name
          FROM fruits AS F
          INNER JOIN unit AS U ON F.unit_id = U.unit_id
          ORDER BY $col $sort";

$result = mysqli_query($connection, $query);
?>

<?php
        require('./retrieve.php');
        require('./read.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fruit Shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>

    <div class="container">
        <h1 class="mt-5">Creat Fruit List</h1>

        <form action="./create.php" method="POST">

            <input id="fruits_name" name="fruits_name" type="text" placeholder="Enter Fruits Name">
            <input id="instock" name="instock" type="number" placeholder="Stock...">
            <select name="unit_id" id="unit_id">
                <option value="" readonly>Select Unit Type</option>
                <option value="1">Kilograms</option>
                <option value="2">Grams</option>
                <option value="3">Pieces</option>
                <option value="4">Pound</option>
                <option value="5">Box</option>
                <option value="6">Sack</option>
            </select>
            <input id="imageurl" name="imageurl" type="text" placeholder="Enter Image Url">
            <input class="btn btn-outline-primary" id="create" name="create" type="submit" value="Create">
        </form>
    </div>

    <div class="container">
        <h2 class="mt-4">Fruits List</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th><a href="?col=fruits_name&sort=<?php echo $sort?>">Fruits Name</a></th>
                    <th><a href="?col=instock&sort=<?php echo $sort?>">In Stock</a></th>
                    <th><a href="?col=unit_name&sort=<?php echo $sort?>">Unit Name</a></th>
                    <th>Image URL</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = mysqli_fetch_assoc($result)) : ?>
                <tr>
                    <td><?php echo $row['fruits_name']; ?></td>
                    <td><?php echo $row['instock']; ?></td>
                    <td><?php echo $row['unit_name']; ?></td>
                    <td>
                        <img src="<?php echo $row['imageurl']; ?>" alt="<?php echo $row['fruits_name']; ?>" class="img-thumbnail" style="max-width: 100px;">
                    </td>
                    <td style="width: 1%;">
                        <form action="" method="POST">
                            <button class="btn btn-warning btn-sm edit-button" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row['fruits_id']; ?>" data-fruits-id="<?php echo $row['fruits_id']; ?>">Edit</button>
                            <input type="hidden" name="fruits_id" value="<?php echo $row['fruits_id']; ?>">
                        </form>
                    </td>

                    <div class="modal fade" id="exampleModal<?php echo $row['fruits_id']; ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Update Fruits</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <form action="update.php" method="POST">
                                    <div class="modal-body">
                                        <input type="hidden" name="fruits_id" value="<?php echo $row['fruits_id']; ?>">
                                        <div class="mb-3">
                                            <label for="fruits_name" class="form-label">Fruit Name</label>
                                            <input type="text" class="form-control" id="fruits_name" name="fruits_name" value="<?php echo $row['fruits_name']; ?>">
                                        </div>
                                        <div class="mb-3">
                                            <label for="instock" class="form-label">In Stock</label>
                                            <input type="number" class="form-control" id="instock" name="instock" value="<?php echo $row['instock'] ?>">
                                        </div>
                                        <div class="form-group mb-3">
                                            <label for="">Select Unit:</label>
                                            <select name="unit_id" id="unit_id">
                                                <option value="-1" disabled selected>Select Unit Type</option>
                                                <option value="1">Kilograms</option>
                                                <option value="2">Grams</option>
                                                <option value="3">Pieces</option>
                                                <option value="4">Pound</option>
                                                <option value="5">Box</option>
                                                <option value="6">Sack</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Photo :</label>
                                            <input id="imageurl" name="imageurl" type="text" placeholder="Enter Image Url">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-primary" name="update">Update</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <script>
                        $(document).ready(function() {
                            $('.edit-button').click(function() {
                                var fruits_id = $(this).data('fruits-id');
                                $('#exampleModal' + fruits_id).modal('show');
                            });
                        });
                    </script>

                    <td class="fle">
                        <form action="delete.php" method="POST"
                            onclick="return confirm('Are you sure you want to delete this record?')">
                            <input type="hidden" name="fruits_id" value="<?php echo $row['fruits_id']; ?>">
                            <button class="btn btn-danger" type="submit" name="delete">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
<?php
        require('./retrieve.php');
        require('./read.php');

        if(isset($_POST['submit'])) {
            $inputFruitsName = $_POST['fruits_name'];
            $capitalizedFruitsName = ucwords($inputFruitsName);
        }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Crud Operation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
</head>
<body>
    <div class="modal fade" id="userModal">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Add and Update Fruits</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="./create.php" method="POST" enctype="multipart/form-data">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="">Fruit Name :</label>
                        <div class="input-group-prepend">
                        </div>
                        <input type="text" class="form-control" placeholder="Enter Fruit Name" autocomplete="off" id="fruits_name" name="fruits_name">
                    </div>
                    <div class="form-group">
                        <label for="">In stock :</label>
                        <div class="input-group-prepend">
                        </div>
                        <input type="number" class="form-control" placeholder="Enter Stock" autocomplete="off" id="instock" name="instock">
                    </div>
                    <div class="form-group mb-3">
                        <label for="">Select Unit:</label>
                        <select class="form-select" aria-label="Default select example" name="unit_id" id="unit_id">
                            <option value="" readonly>Select Unit Type</option>
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
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" id="create" name="create" type="submit" value="Create">Submit</button>
                </div>
            </form>
            </div>
        </div>
    </div>
    <div class="container">
        <h2 class="mt-4">Fruit Shop List</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th><a href="?col=fruits_name&sort=<?php echo $sort?>"></a>
                    Fruits Name
                    </th>
                    <th>In Stock</th>
                    <th>Unit Name</th>
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
                    <td class="d-flex justify-content-center column-gap-2">
                        <form action="edit.php" method="POST">
                            <button class='btn btn-warning btn-sm' type="button" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row['fruits_id']?>">Edit</button>
                            <input type="hidden" name="account_id" value=<?php echo $row['fruits_id']?>></form>

                            <!-- Modal -->
                        <div class="modal fade" id="exampleModal<?php echo $row['fruits_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog" data-bs-backdrop="static">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update Fruits</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="./create.php" method="POST" enctype="multipart/form-data">
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="editFruitName">Fruit Name :</label>
                                                <div class="input-group-prepend"></div>
                                                <input type="text" class="form-control" placeholder="Enter Fruit Name" autocomplete="off" id="editFruitName" name="editFruitName" value="<?php echo $row['fruits_name'] ?>">
                                            </div>
                                            <div class="form-group">
                                                <label for="editInStock">In stock :</label>
                                                <div class="input-group-prepend"></div>
                                                <input type="number" class="form-control" placeholder="Enter Stock" autocomplete="off" id="editInStock" name="editInStock" value="<?php echo $row['instock'] ?>">
                                            </div>
                                            <div class="form-group mb-3">
                                                <label for="">Select Unit:</label>
                                                <select class="form-select" aria-label="Default select example" name="unit_id" id="unit_id">
                                                    <option value="" readonly>Select Unit Type</option>
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
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>
                                            <button class="btn btn-primary" id="create" name="create" type="submit" value="Create">Submit</button>
                                        </div>
                                </div>
                                </div>
                            </div>
                        </form>
                        <form action="delete.php" method="POST"
                            onclick="return confirm('Are you sure you want to delete this record?')">
                            <input type="hidden" name="fruits_id" value="<?php echo $row['fruits_id']; ?>">
                            <button class="btn btn-danger btn-sm" type="submit" name="delete">Delete</button>
                        </form>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>

            <div class="text-right">
                <button class="btn btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#userModal">
                Add New Fruits
                </button>
            </div>
    </div>



<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
</body>
</html>
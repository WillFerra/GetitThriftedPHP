<?php
    require_once "includes/dbh.php";
    require_once "includes/db-functions.php";
    
    include "includes/adminheader.php";

    $products = loadAllProducts($conn);
    $size = loadSizes($conn);
    $sellers = loadSellers($conn);
?>

<br>
<br>

<div class="container mt-3">
    <form action="includes/createProduct-inc.php" method="POST">
        <!-- Main Form -->
        <div class="row">
            <div class="col-lg-7 col-md-12 adminNewProductPadding">
                <!-- Personal Details -->
                <div class="border p-3 mb-3">
                    <h3>New Product</h3>

                    <div class="form-floating mb-3">
                        <input type="input" class="form-control" id="name" name="name" required>
                        <label for="name">Product Name</label>
                    </div>
                    
                    <div class="form-floating mb-3">
                        <input type="input" class="form-control" id="price" name="price"required>
                        <label for="price">Product Price</label>
                    </div>

                    <div class="mb-3">
                        <select class="form-select" id="size" name="size" required>
                            <option disabled selected>Size</option>
                            <?php 
                                foreach($size as $row):
                                    ?>
                                        <option value="<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></option>
                                    <?php
                                endforeach;
                            ?>
                        </select>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="input" class="form-control" id="description" name="description" required>
                        <label for="description">Description</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="input" class="form-control" id="stockQty" name="stockQty" required>
                        <label for="stockQty">Stock Quantity</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="input" class="form-control" id="imgLink" name="imgLink" required>
                        <label for="imgLink">Image Link</label>
                    </div>

                    <div class="mb-3">
                        <select class="form-select" id="seller" name="seller" required>
                            <option disabled selected>Seller</option>
                            <?php 
                                foreach($sellers as $row):
                                    ?>
                                        <option value="<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></option>
                                    <?php
                                endforeach;
                            ?>
                        </select>
                    </div>
                </div>
            </div>

        <!-- Form Buttons -->
        <div class="row">
            <div class="col-12 mb-3 adminNewProductPadding">
                <button type="submit" class="btn btn-success w-100 p-2 fs-5">Create Product</button>
            </div>
        </div>
    </form>
</div>


<?php
    include 'includes/adminFooter.php';
?>

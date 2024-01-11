<?php
    require_once "includes/dbh.php";
    require_once "includes/db-functions.php";
    
    include "includes/adminheader.php";

    if(isset($_GET["product"])){
        $productId = $_GET["product"];

        if(!loadProduct($conn, $productId)){
            header("location:index.php");
            exit();
        }

        $product = loadProduct($conn, $productId);
        $size = loadSizes($conn);
        $seller = loadSellers($conn);

        $productSize = loadSizeById($conn, $productId);
        $productSeller = loadSellerById($conn, $productId);
    }
?>

<br>
<br>

<div class="col-12">
    <main>
        <div class="container">
            <div class="row mb-4">
                <div class="col-1">
                </div>
                <div class="col-11">
                    <form action="includes/editProduct-inc.php" method="POST">
                        <!-- Personal Details -->
                        <div class="border p-3 mb-3">
                            <h3>Product Details</h3>

                            <input type="hidden" id="productId" name="productId" value="<?php echo $product["id"]; ?>">

                            <div class="form-floating mb-3">
                                <input type="input" class="form-control" 
                                    id="name" name="name" required 
                                    value="<?php echo $product["name"]; ?>">
                                <label for="name">Name</label>
                            </div>
                            
                            <div class="form-floating mb-3">
                                <input type="input" class="form-control" 
                                    id="price" name="price"required
                                    value="<?php echo $product["price"]; ?>">
                                <label for="price">Price</label>
                            </div>

                            <div class="mb-3">
                                <select class="form-select" id="sizeId" name="sizeId" required>
                                    <option disabled selected>Size</option>
                                    <?php 
                                        foreach($size as $row):
                                            ?>
                                                <option 
                                                    value="<?php echo $row["id"]; ?>"
                                                    <?php if($row["id"] == $product["sizeId"]){echo "selected";}?>>
                                                    <?php echo $row["name"]; ?>
                                                </option>
                                            <?php
                                        endforeach;
                                    ?>
                                </select>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="input" class="form-control" 
                                    id="description" name="description" required
                                    value="<?php echo $product["description"]; ?>">
                                <label for="description">Description</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="input" class="form-control" 
                                    id="stockQty" name="stockQty" required
                                    value="<?php echo $product["stockQty"]; ?>">
                                <label for="stockQty">Stock Quantity</label>
                            </div>

                            <div class="form-floating mb-3">
                                <input type="input" class="form-control" 
                                    id="imgLink" name="imgLink" required
                                    value="<?php echo $product["imgLink"]; ?>">
                                <label for="imgLink">Image Link</label>
                            </div>

                            <div class="mb-3">
                                <select class="form-select" id="sellerId" name="sellerId" required>
                                    <option disabled selected>Seller</option>
                                    <?php 
                                        foreach($seller as $row):
                                            ?>
                                                <option 
                                                    value="<?php echo $row["id"]; ?>"
                                                    <?php if($row["id"] == $product["sellerId"]){echo "selected";}?>>
                                                    <?php echo $row["name"]; ?>
                                                </option>
                                            <?php
                                        endforeach;
                                    ?>
                                </select>
                            </div>

                            <!-- Personal Details Button -->
                            <div class="row">
                                <div class="col-12 mb-3">
                                    <button type="submit" class="btn btn-success w-100 p-2 fs-5">Update Product Details</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</div>

<?php
    include 'includes/adminFooter.php';
?>
<?php
    require_once "includes/dbh.php";
    require_once "includes/db-functions.php";
    
    include "includes/adminheader.php";

    $products = loadAllProducts($conn);
?>

<br>
<br>

<div class="col-11 adminProductPadding">
    <main?>
        <div class="container">
            <div class="row mb-4">
                <div class="col-1">
                </div>
                <div class="col-11">
                    <div class="containerHeader">
                        <div>
                            <h3>Products Currently Available Online</h3>
                        </div>
                        <a href="createProduct.php" class="btn btn-primary" role="button">Create New Product</a>
                    </div>
                    <br>
                    
                    <?php 
                        foreach($products as $prod):
                            ?>
                            <div class="card mb-3" style="max-width: 540px;">
                                <div class="row g-0">
                                    <div class="col-md-4">
                                    <img src="<?php echo $prod["imgLink"];?>" class="img-fluid rounded-start" alt="Product Image" class="img-fluid rounded-start" style="width: 300px; height: auto;">
                                    </div>
                                    <div class="col-md-8">
                                    <div class="card-body">
                                        <h5 class="card-title"><?php echo $prod["name"]?></h5>
                                        <h6 class="card-subtitle mb-2 text-muted"><?php echo "€ ".$prod["price"];?></h6>
                                        <p><?php echo $prod["description"];?></p>
                                        <a href="productItem.php?product=<?php echo $prod["id"] ;?>" class="btn btn-primary w-100 mb-3" role="button">Edit Details</a>

                                        <form action="includes/deleteProduct-inc.php">
                                            <input type="hidden" id="deleteProdId" name="prodId" value="<?php echo $prod["id"]; ?>">
                                            <button type="submit" class="btn btn-danger w-100">Delete Product</button>
                                        </form>

                                    </div>
                                    </div>
                                </div>
                            </div>
                        <?php
                        endforeach;
                        ?>
                    
                </div>
            </div>
        </div>
    </main>
</div>



<?php
    include 'includes/adminFooter.php';
?>

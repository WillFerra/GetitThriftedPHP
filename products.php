<?php 
    require_once "includes/dbh.php";
    require_once "includes/db-functions.php";
    
    include "includes/header.php";


    $products = loadAllProducts($conn);
?>

<br>
<br>

<div class="container mt-3">
    <div class="row">
        <?php 
            foreach($products as $prod):
                ?>
                <div class="col-4 mb-3">
                    <div class="card">
                        <img src="<?php echo $prod["imgLink"];?>" alt="Product Image">
                        <div class="card-body">
                            <h5 class="card-title"><?php echo $prod["name"]?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?php echo "€ ".$prod["price"];?></h6>
                            <a href="productItem.php?product=<?php echo $prod["id"] ;?>" class="btn btn-primary" role="button">View Details</a>
                        </div>
                    </div>
                </div>
                <?php
            endforeach;
        ?>
    </div>
</div>

<?php
    include 'includes/footer.php';
?>

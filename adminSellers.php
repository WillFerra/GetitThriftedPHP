<?php
    require_once "includes/dbh.php";
    require_once "includes/db-functions.php";
    
    include "includes/adminheader.php";

    $seller = loadSellers($conn);
    $buyers = loadbuyers($conn);
    $requested = loadRequested($conn);
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
                    <h3>Authorized Sellers</h3>

                    <?php 
                    foreach($seller as $row):
                        ?>
                        <div class="row">
                            <div class="col-12 mb-3">
                                <li class="product-item">
                                    <h6><?php echo $row["name"]?></h6>
                                    <form action="includes/removeSeller-inc.php" method="POST">
                                        <input type="hidden" id="sellerId" name="sellerId" value="<?php echo $row["id"]; ?>">
                                        <button type="submit" class="btn btn-success w-100 mb-1">Remove Seller</button>
                                    </form>                        
                                </li>
                            </div>
                        </div>
                        <?php
                    endforeach;
                    ?>

                    <br>

                    <h3>Seller Requests</h3>

                    <div class="container mt-3">
                    <div class="row">
                        <?php 
                            foreach($requested as $row):
                                ?>
                                <div class="col-4 mb-3">
                                    <div class="card">
                                        <img src="<?php echo $row["imageLink"];?>" alt="Product Image">
                                        <div class="card-body">
                                            <h4 class="card-title"><?php echo $row["productName"]?></h4>
                                            <h5 class="card-title">by <?php echo $row["username"]?></h5>
                                            <p class="card-text"><?php echo $row["why"]?></p>
                                            <p class="card-text"> Request Date: <?php echo $row["requestDate"]?></p>
                                            
                                            <form action="includes/approveRequest-inc.php" method="POST">
                                                <input type="hidden" id="requestId" name="requestId" value="<?php echo $row["id"]; ?>">
                                                <input type="hidden" id="userId" name="userId" value="<?php echo $row["userId"]; ?>">
                                                <button type="submit" class="btn btn-success w-100 mb-1">Approve</button>
                                            </form>
                                            
                                            <form action="includes/deleteRequest-inc.php">
                                                <input type="hidden" id="deleteRequestId" name="requestId" value="<?php echo $row["id"]; ?>">
                                                <button type="submit" class="btn btn-danger w-100">Deny</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            endforeach;
                        ?>
                    </div>
                </div>
                    
                    
                    <br>

                    <h3>Users</h3>
                    
                    <?php 
                    foreach($buyers as $row):
                        ?>
                        <div class="row">
                            <div class="col-12 mb-3">
                                <li class="product-item">
                                    <h6><?php echo $row["name"]?></h6>
                                    <h6><?php echo $row["username"]?></h6>
                                    <h6><?php echo $row["email"]?></h6>
                                    <!-- <button class="edit-button">Edit</button> -->
                                </li>
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

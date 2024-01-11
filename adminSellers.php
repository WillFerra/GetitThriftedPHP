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
                                    <button class="edit-button">Edit</button>                          
                                </li>
                            </div>
                        </div>
                        <?php
                    endforeach;
                    ?>

                    <br>

                    <h3>Seller Requests</h3>
                    <?php 
                    foreach($requested as $row):
                        ?>
                        <div class="row">
                            <div class="col-12 mb-3">
                                <li class="product-item">
                                    <h6><?php echo $row["username"]?></h6>
                                    <h6><?php echo $row["requestDate"]?></h6>
                                    <button class="edit-button">Approve</button>   
                                    <button class="edit-button">Deny</button>                          
                                </li>
                            </div>
                        </div>
                        <?php
                    endforeach;
                    ?>
                    
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
                    
                    <!-- <ul class="product-list">
                        <li class="product-item">
                            <span>Chris Aguis</span>
                            <span>Date Requested: 21.11.23</span>
                            <span>
                                <button class="edit-button">Confirm Request</button> 
                                <button class="edit-button">Delete Request</button> 
                            </span>                           
                        </li>
                        <li class="product-item">
                            <span>Aiden Zarb</span>  
                            <span>Date Requested: 03.11.23</span>
                            <span>
                                <button class="edit-button">Confirm Request</button> 
                                <button class="edit-button">Delete Request</button> 
                            </span>                        
                        </li>
                    </ul> -->
                </div>
            </div>
        </div>
    </main>
</div>


<?php
    include 'includes/adminFooter.php';
?>

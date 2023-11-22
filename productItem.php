<?php
    include 'includes/header.php';
?>

<br>
<br>

<!-- Creating the carousel with the images -->

<div class="container-fluid">
    <div class="row">
        <div class="col-6">
            <img src="assets/thrift1.jpg.webp" class="d-block w-100" alt="Checked Shirt">
        </div>
        
        <!-- list with the details of the product -->
        
        <div class="col-6">
            <h2> CARHARTT checked shirt in Blue </h2>
            <br>
            <h4 class="card-text">&euro; 24.00</h4>
            <br>
            
            <ul class="list-group list-group-flush">
                <li class="list-group-item">
                    <p>
                        Size XL
                    </p>
                </li>

                <li class="list-group-item">
                    <p>
                        1 Item in Stock
                    </p>
                </li>
            </ul>
            
            <br>

            <button type="button" class="btn btn-dark w-100">Add to Cart</button>
        </div>
    </div>
</div>

<br>
<br>

<div class="container-fluid">
    <h2>Related Products</h2>
</div>

<br>
<br>

<div class="col-12">
        <main>
            <div class="container">
                <div class="row mb-4">
                    <div class="col-4">
                        <div class="card">
                            <img src="assets/thrift1.jpg.webp" class="card-img-top" alt="Checked Shirt">
                            <div class="card-body">
                                <h5 class="card-title">Checked Shirt</h5>
                                <p class="card-text">&euro; 24.00</p>
                            </div>
                            <div class="card-body">
                                <a href="productItem.php" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-4">
                        <div class="card">
                            <img src="assets/thrift2.heic.webp" class="card-img-top" alt="Zip-Up Navy Blue">
                            <div class="card-body">
                                <h5 class="card-title">Zip-Up Navy Blue</h5>
                                <p class="card-text">&euro; 45.00</p>
                            </div>
                            <div class="card-body">
                                <a href="productItem.php" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-4">
                        <div class="card">
                            <img src="assets/thrift3.heic.webp" class="card-img-top" alt="Sweatshirt Grey">
                            <div class="card-body">
                                <h5 class="card-title">Sweatshirt Grey</h5>
                                <p class="card-text">&euro; 48.00</p>
                            </div>
                            <div class="card-body">
                                <a href="productItem.php" class="btn btn-primary">View Details</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>



<?php
    include 'includes/footer.php';
?>

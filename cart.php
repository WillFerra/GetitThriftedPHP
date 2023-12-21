<?php
    include 'includes/header.php';
?>

<br>
<br>

<div class="col-12">
    <main>
        <div class="container">
            <div class="row mb-4">
                <div class="col-4">
                    <div class="card">
                        <img src="assets/thrift1.jpg.webp" class="card-img-top" alt="Checked Shirt">
                        <div class="card-img-overlay">
                            <button type="button" class="btn">
                                <img src="assets/x-solid.png" alt="x" width="20" height="auto" href="#">
                            </button>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Checked Shirt</h5>
                            <p class="card-text">&euro; 24.00</p>
                        </div>
                        <div class="card-body">
                            <div>
                                <h5>Quantity</h5>
                                <div class="counter">
                                    <span class="down" onClick='decreaseCount(event, this)'> <a> - </a> </span>
                                    <input type="text" value="1">
                                    <span class="up" onClick='increaseCount(event, this)'> <a> + </a> </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="card">
                        <img src="assets/thrift4.heic.webp" class="card-img-top" alt="Heavy Jacket in Green">
                        <div class="card-img-overlay">
                            <button type="button" class="btn">
                                <img src="assets/x-solid.png" alt="x" width="20" height="auto" href="#">
                            </button>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">Heavy Jacket in Green</h5>
                            <p class="card-text">&euro; 150.00</p>
                        </div>
                        <div class="card-body">
                            <div>
                                <h5>Quantity</h5>
                                <div class="counter">
                                    <span class="down" onClick='decreaseCount(event, this)'> <a> - </a> </span>
                                    <input type="text" value="1">
                                    <span class="up" onClick='increaseCount(event, this)'> <a> + </a> </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <div class="card">
                        <div class="p-3">
                            <h2>Order Summary</h2>

                            <br>
                            <br>

                            <h5 style="text-align:left;">
                                Subtotal
                                <span style="float:right;">
                                    €174.00
                                </span>
                            </h5>
                        </div>

                        <div class="card-body">
                            <a class="btn btn-primary w-100">Checkout</a>
                        </div>

                        <div class="card-body">
                            <a class="btn btn-secondary w-100" href="products.php">Continue Shopping</a>
                        </div>
                    </div>
                </div>
            </div>
        <div>
    <main>
<div>
    

<?php
    include 'includes/footer.php';
?>

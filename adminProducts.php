<?php
    include 'includes/adminHeader.php';
?>

<br>
<br>

<div class="col-12">
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
                        <button class="edit-button">Create New Product</button>
                    </div>
                    <br>

                    <ul class="product-list">
                        <li class="product-item">
                            <span>Product 1</span>
                            <span>
                                <button class="edit-button">Edit</button>
                                <a href="cart.php">
                                    <button type="button" class="edit-button">
                                        <img src="assets/trash-solid.png" alt="Trash" width="20" height="auto" href="#">
                                    </button>
                                </a>
                            </span>
                        </li>
                        <li class="product-item">
                            <span>Product 2</span>
                            <span>
                                <button class="edit-button">Edit</button>
                                <a href="cart.php">
                                    <button type="button" class="edit-button">
                                        <img src="assets/trash-solid.png" alt="Trash" width="20" height="auto" href="#">
                                    </button>
                                </a>
                            </span>
                        </li>
                        <li class="product-item">
                            <span>Product 3</span>
                            <span>
                                <button class="edit-button">Edit</button>
                                <a href="cart.php">
                                    <button type="button" class="edit-button">
                                        <img src="assets/trash-solid.png" alt="Trash" width="20" height="auto" href="#">
                                    </button>
                                </a>
                            </span>
                        </li>
                        <!-- Add more product items as needed -->
                    </ul>
                </div>
            </div>
        </div>
    </main>
</div>



<?php
    include 'includes/adminFooter.php';
?>

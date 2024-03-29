<?php
    require_once "includes/functions.php";

    require_once "includes/dbh.php";
    require_once "includes/db-functions.php";
    include 'includes/header.php';

    $size = loadSizes($conn);

    session_start();
?>

<div class="row">
    <div class="col-1"></div>
    <div class="col-11 mt-3">
        <h1>Become a Seller with Get It Thrifted</h1>
    </div>
</div>

<div class="container mt-3">
    <div class="col-12">
        <form action="includes/sellerRequest-inc.php" method="POST">
            <div class="row">
                <div class="col-8">
                    <!-- Personal Details -->
                    <div class="border p-3 mb-3">

                        <input type="hidden" id="userId" name="userId" value="<?php echo $_SESSION['userId'] ?>">

                        <h3>Your Details</h3>

                        <div class="form-floating mb-3">
                            <input type="input" class="form-control" id="username" name="username" required>
                            <label for="username">Username</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="password" class="form-control" id="password" name="password" required>
                            <label for="password">Password</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="input" class="form-control" id="why" name="why" required>
                            <label for="password">Why do you want to sell with us?</label>
                        </div>
                    </div>
                </div>

                <div class="col-4">
                    <!-- Product -->
                    <div class="border p-3 mb-3">
                        <h3>Product</h3>

                        <div class="form-floating mb-3">
                            <input type="input" class="form-control" id="productName" name="productName" required>
                            <label for="productName">Name of Product you want to sell</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="input" class="form-control" id="description" name="description" required>
                            <label for="description">Description</label>
                        </div>

                        <div class="form-floating mb-3">
                            <input type="input" class="form-control" id="sellingPrice" name="sellingPrice" required>
                            <label for="price">Selling Price</label>
                        </div>

                        <div class="form-floating mb-3">
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
                            <input type="input" class="form-control" id="imgLink" name="imgLink" required>
                            <label for="imgLink">Image</label>
                        </div>
                    </div>
                </div>

                <!-- Send Details Button -->
                <div class="col-12 mb-3">
                    <button type="submit" class="btn btn-success w-100 p-2 fs-5">Send Request</button>
                </div>
            </div>
        </form>
    </div>
</div>

<?php
    include 'includes/footer.php';
?>
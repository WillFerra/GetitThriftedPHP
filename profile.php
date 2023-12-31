<?php
    require_once "includes/functions.php";

    require_once "includes/dbh.php";
    require_once "includes/db-functions.php";
    include 'includes/header.php';

    session_start();
    if(!isset($_SESSION["username"])){
        header("location:login.php");
        exit();
    }
    if ($_SESSION['userId'] != NULL){
        $currentUser = $_SESSION["userId"];

        $users = loadUser($conn, $currentUser);
        $street = loadStreets($conn);
        $town = loadTowns($conn);
        $countrie = loadCountry($conn);
        $bank = loadBanks($conn);
    }

?>

<br>
<br>

<div class="row">
    <div class="col-1"></div>
    <div class="col-7">
        <h2>My Account</h2>
    </div>
    <div class="col-1"></div>
    <div class="col-2">
        <form action="includes/logout-inc.php">
            <button type="submit" class="btn btn-danger w-100 p-2 fs-5">Logout</button>
        </form>
    </div>
</div>

<div class="container mt-3">
    <form action="includes/updateProfile-inc.php" method="POST">
        <!-- Main Form -->
        <div class="row">
            <div class="col-lg-7 col-md-12">
                <!-- Personal Details -->
                <div class="border p-3 mb-3">
                    <h3>Personal Details</h3>

                    <div class="form-floating mb-3">
                        <input type="input" class="form-control" 
                            id="name" name="name" required 
                            value="<?php echo $users["name"]; ?>">
                        <label for="name">First Name</label>
                        
                    </div>
                    
                    <div class="form-floating mb-3">
                        <input type="input" class="form-control" 
                            id="surname" name="surname"required
                            value="<?php echo $users["surname"]; ?>">
                        <label for="surname">Surname</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="input" class="form-control" 
                            id="doB" name="doB" required
                            value="<?php echo $users["dateOfBirth"]; ?>">
                        <label for="doB">Date of Birth</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" 
                            id="email" name="email" required
                            value="<?php echo $users["email"]; ?>">
                        <label for="email">Email</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="input" class="form-control" 
                            id="username" name="username" required
                            value="<?php echo $users["username"]; ?>">
                        <label for="username">Username</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" 
                            id="password" name="password" required>
                        <label for="password">Password</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" 
                            id="confPassword" name="confPassword" required>
                        <label for="confPassword">Confirm Password</label>
                    </div>

                </div>
            </div>

            <div class="col-lg-5 col-md-12">
                <!-- Residence -->
                <div class="border p-3 mb-3">
                    <h3>Residence</h3>

                    <div class="form-floating mb-3">
                        <input type="input" class="form-control" 
                            id="address" name="address"required
                            value="<?php echo $users["address"]; ?>">
                        <label for="address">Address</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="input" class="form-control" 
                            id="street" name="street" required
                            value="<?php echo $users["name"]; ?>">
                        <label for="street">Street</label>
                    </div>

                    <div class="mb-3">
                        <select class="form-select" id="town" name="town" required>
                            <option disabled selected>Town</option>
                            <?php 
                                foreach($town as $row):
                                    ?>
                                        <option value="<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></option>
                                    <?php
                                endforeach;
                            ?>
                        </select>
                    </div>

                    <div class="mb-3">
                        <select class="form-select" id="country" name="country" required>
                            <option disabled selected>Country</option>
                            <?php 
                                foreach($country as $row):
                                    ?>
                                        <option value="<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></option>
                                    <?php
                                endforeach;
                            ?>
                        </select>
                    </div>
                </div>

                <!-- Payment -->
                <div class="border p-3 mb-3">
                    <h3>Payment Details</h3>

                    <div class="form-floating mb-3">
                        <input type="input" class="form-control" 
                            id="cardNumber" name="cardNumber" required
                            value="<?php echo $users["name"]; ?>">
                        <label for="cardNumber">Card Number</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="input" class="form-control" id="accountHolder" name="accountHolder" required>
                        <label for="accountHolder">Account Holder</label>
                    </div>
                    
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="input" class="form-control" id="cvv" name="cvv" required>
                                <label for="cvv">CVV</label>
                            </div>
                        </div>
                        
                        <div class="col-md-6">
                            <div class="form-floating mb-3">
                                <input type="input" class="form-control" id="expirationDate" name="expirationDate" required>
                                <label for="expirationDate">Expiration Date</label>
                            </div>
                        </div>
                    </div>
                    

                    <div class="mb-3">
                        <select class="form-select" id="bank" name="bank" required>
                            <option disabled selected>Bank</option>
                            <?php 
                                foreach($bank as $row):
                                    ?>
                                        <option value="<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></option>
                                    <?php
                                endforeach;
                            ?>
                        </select>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Buttons -->
        <div class="row">
            <div class="col-12 mb-3">
                <button type="submit" class="btn btn-success w-100 p-2 fs-5">Update Details</button>
            </div>
        </div>
    </form>
</div>

<?php
    include 'includes/footer.php';
?>
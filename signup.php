<?php 
    require_once "includes/functions.php";

    require_once "includes/dbh.php";
    require_once "includes/db-functions.php";
    
    include "includes/header.php";

    $town = loadTowns($conn);
    $country = loadCountry($conn);
    $bank = loadBanks($conn);
?>


<div class="row">
    <div class="col-4"></div>
    <div class="col-4 mt-3 text-center">
        <h1>Signup</h1>
    </div>
    <div class="col-4"></div>
</div>

<div class="container mt-3">
    <form action="includes/signup-inc.php" method="POST">
        <!-- Main Form -->
        <div class="row">
            <div class="col-lg-7 col-md-12">
                <!-- Personal Details -->
                <div class="border p-3 mb-3">
                    <h3>Personal Details</h3>

                    <div class="form-floating mb-3">
                        <input type="input" class="form-control" id="name" name="name" required>
                        <label for="name">First Name</label>
                    </div>
                    
                    <div class="form-floating mb-3">
                        <input type="input" class="form-control" id="surname" name="surname"required>
                        <label for="surname">Surname</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="input" class="form-control" id="doB" name="doB" required>
                        <label for="doB">Date of Birth</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="email" class="form-control" id="email" name="email" required>
                        <label for="email">Email</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="input" class="form-control" id="username" name="username" required>
                        <label for="username">Username</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="password" name="password" required>
                        <label for="password">Password</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="password" class="form-control" id="confPassword" name="confPassword" required>
                        <label for="confPassword">Confirm Password</label>
                    </div>

                </div>
            </div>

            <div class="col-lg-5 col-md-12">
                <!-- Residence -->
                <div class="border p-3 mb-3">
                    <h3>Residence</h3>

                    <div class="form-floating mb-3">
                        <input type="input" class="form-control" id="address" name="address"required>
                        <label for="address">Address</label>
                    </div>

                    <div class="form-floating mb-3">
                        <input type="input" class="form-control" id="street" name="street" required>
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
                        <input type="input" class="form-control" id="cardNumber" name="cardNumber" required>
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
                <button type="submit" class="btn btn-success w-100 p-2 fs-5">Signup</button>
            </div>
        </div>
    </form>
</div>

<div class="container mt-5">
    <div class="row">
        <div class="col-3"></div>
        <?php if (isset($_GET["error"])): ?>
            <div class="col-6 text-center border border-danger-subtle bg-danger-subtle text-danger p-2">
            <?php
                $error = $_GET["error"];
                if ($error == "emptyInputs") {
                    echo "Please fill in all fields.";
                }
                elseif ($error == "invalidUsername"){
                    echo "Please choose a proper username.";
                }
                elseif ($error == "invalidEmail"){
                    echo "Please choose a proper email.";
                }
                elseif ($error == "passwordsDoNotMatch"){
                    echo "Passwords do not match.";
                }
                elseif ($error == "usernameTaken"){
                    echo "Username already in use.";
                }
                elseif ($error == "stmtfailed"){
                    echo "Something went wrong, please try again.";
                }

                echo "</div>";
            endif;

            if(isset($_GET["success"])){
                if($_GET["success"] == true){
                    ?> 
                        <div class="col-6 text-center border border-success-subtle bg-success-subtle text-success p-2">
                            Account Registration completed successfully.
                        </div>
                    <?php
                }
            }
        ?>
        
        <div class="col-3"></div>
    </div>
</div>

<?php
include "includes/footer.php";
?>


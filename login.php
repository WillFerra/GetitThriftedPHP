<?php 

    require_once "includes/functions.php";
    require_once "includes/dbh.php";
    require_once "includes/db-functions.php";
    
    include "includes/header.php";
?>

<br>
<br>

<form action="includes/login-inc.php" method="post">
    <div class="container">
        <div class="row mt-5">
            <div>
                <h2>Login</h2>
            </div>

            <div class="col-6">
                <div class="mb-3">
                    <input type="text" name="username" id="username" class="form-control" placeholder="Username">
                </div>

                <div class="mb-3">
                    <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                </div>

                <div class="d-grid">
                    <button type="submit" name="submit" class="btn btn-primary">Log In</button>  
                </div>
                <br>
                <a href="signup.php" class="signup-link">Don't have an account? <b>Sign Up Now</b></a>
            </div>
            <div class="col-6">
                <img src="assets/loginImg.jpg" alt="" class="img-fluid">
            </div>
        </div>
    </div>
</form>

<?php
    include 'includes/footer.php';
?>

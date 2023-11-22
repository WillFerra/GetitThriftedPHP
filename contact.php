<?php
    include 'includes/header.php';
?>

<br>
<br>

<!-- Creating the form -->

<div class="container-fluid">
    <div class="row">
        <div class="col-8">
            <form action="mailto:admin@pctech.com" method="post" class="contact-form" onsubmit="return validateForm();">
                <div class="container">
                    <div class="row">
                        <h4 style="text-align: left;">Get in touch with us</h4>
                    </div>
                    
                    <div class="row">
                        <div class="col-6">
                            <div>
                                <label for="firstName">First Name</label>
                                <input type="text" name="firstName" id="firstName" placeholder="Joe">
                            </div>
                        </div>
                        <div class="col-6">
                            <div>
                                <label for="lastName">Last Name</label>
                                <input type="text" name="lastName" id="lastName" placeholder="Borg">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <div>
                                <label for="email">Email Address</label>
                                <input type="email" name="email" id="email" placeholder="example@gmail.com">
                            </div>
                        </div>
                    </div>
                    
                    <div class="row">
                        <div class="col-12">
                            <div>
                                <label for="message">Your Message</label>
                                <textarea name="message" id="message" cols="60" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="row my-4">
                        <div class="col-6 d-grid gap-2">
                            <button type="submit" class="btn btn-success">Send</button>
                        </div>
                        
                        <div class="col-6 d-grid gap-2">
                            <button type="reset" class="btn btn-danger">Cancel</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
        
        <div class="col-4">
            <div id="errors" class="card border-danger mb-3 d-none text-danger">
                <div class="card-header">
                    <h4>Invalid Input</h4>
                </div>
                <div class="card-body text-danger">
                    <p id="error-content" class="card-text"></p>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
    include 'includes/footer.php';
?>


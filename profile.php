<?php
    include 'includes/header.php';
?>

<br>
<br>

<div class="loginCentre">
    <div class="account-container">
        <div class="user-details" id="userDetails">
            <h2>User Details</h2>
            <p>Name: Joe Borg</p>
            <p>Email: joe.borg@gmail.com</p>
            <p>Phone: +356 9999 2288</p>
        </div>

        <button class="edit-button" onclick="toggleEditForm()">Edit Details</button>

        <form class="edit-form" id="editForm" style="display: none;">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="John Doe">

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="john.doe@example.com">

            <label for="phone">Phone:</label>
            <input type="tel" id="phone" name="phone" value="+1 555-1234">

            <button type="button" class="save-button" onclick="saveDetails()">Save</button>
        </form>
    </div>
</div>

<?php
    include 'includes/footer.php';
?>
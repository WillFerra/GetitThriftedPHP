This project is for an online Thrift Shop where people can create an account, sign up, login, buy or sell their products with the approval of administrators.

Github Repo Explaination

  1. Get It Thrifted - includes all the php files and some folders
    What the folders include: 
    1. Assets - Includes all images, fonts and icons used throughout the website
    2. Includes - Includes all php files that are used for functions, and contact with the database
    3. Task 1 - Includes the documentation for Task 1 of the assignment
    4. Database - Includes the Database SQL Export

Files Explained

  1. style.css - includes all the css used throughout the website, both in the admin and the user side
  2. script.js - includes all the java script used throughout the website, both in the admin and the user side

PHP Files

  1. adminDashboard.php - builds the UI for the admin home page, including the charts displayed on the page
  2. adminProductDetails.php - builds the UI for the product when 'Edit Produtc' is clicked in the admin page
  3. adminProducts.php - displays the products page in the admin. Displays all the products in the database with the option to edit/ delete each product
  4. adminSellers.php - displays all the users signed up to use the website. It divides the sellers and the users with a specific section for seller requests that is displayed when there are pending requests. For requests the admin has the option to approve or deny each request
  5. becomeSeller.php - displays the form the user has to fill to become a seller
  6. cart.php - displays the user's cart. It gives the option to remove products, displays the total of products in the cart and displays a button to checkout
  7. checkout.php - displays the information about the card that will be charged, displays a list of products in the cart, and the total with a button to complete checkout and pay
  8. contact.php - displays the contact form for the users to contact the admin
  9. createProduct.php - displays the form in the admin to enter the information for new products
  10. gallery.php - displays a page with a couple of photos taken at the thrift shop
  11. index.php - creates the home page for the website
  12. login.php - creates the login form for the website
  13. productItem.php - displays the product page, shows a button with the Add to Cart option
  14. products.php - displays the products page, creating a list of all the products available in the database
  15. profile.php - displays the user details with option to edit his details
  16. signup.php - displays the sign up page for the user

Files in the Includes Folder

  1. addToCart-inc.php - creates an array called cart and saves it in the Session
  2. adminFooter.php - creates the footer of the admin pages
  3. adminHeader.php - creates the header for the admin pages, and the side bar with the menu
  4. approveRequest-inc.php - called when the admin clicks to approve new seller, calles the approveSeller function
  5. createOrder-inc.php - writes the user order in the Order Table
  6. createProduct-inc.php - writes the product details in the Product table
  7. db-functions.php - includes all the functions used throughout the website
  8. dbh.php - handles the database connection
  9. deletProduct-inc.php - deletes a product from the Products table based on the id
  10. deleteRequest-inc.php - deletes a request from the Requests table based on the id
  11. editProduct-inc.php - updates the product details in the Product database
  12. footer.php - creates the footer in the user side of the website
  13. functions.php - includes all the functions used throughout the website. These function have nothing to do with the database
  14. header.php - creates the navigation bar with the menu
  15. login-inc.php - called when the user logs in and checks that the inputs are filled
  16. logout-inc.php - logs out the user
  17. removeFromCart-inc.php - removes the item from the cart
  18. removeSeller-inc.php - removes the seller from the database
  19. sellerRequest-inc.php - adds the input the user inputs when requesting to become a seller
  20. signup-inc.php - adds the inputs the user inputs when signing up
  21. updatePayment-inc.php - updates the Payment details of the user
  22. updateProfile-inc.php - updates the user details of the user
  23. updateResidence-inc.php - updates the residence details of the user

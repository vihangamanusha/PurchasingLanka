<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Create Account</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="new.css" />
    <link rel="stylesheet" href="signup.css" />
</head>
<body>

    <!-- Display error message -->
    <?php if (!empty($_SESSION['error'])): ?>
        <div style="color: red; text-align: center; margin-top: 20px;">
            <?php 
                echo $_SESSION['error']; 
                unset($_SESSION['error']);
            ?>
        </div>
    <?php endif; ?>

    <!-- Display success message -->
    <?php if (!empty($_SESSION['success'])): ?>
        <div style="color: green; text-align: center; margin-top: 20px;">
            <?php 
                echo $_SESSION['success']; 
                unset($_SESSION['success']);
            ?>
        </div>
    <?php endif; ?>
   <div class="top-bar">
        Get Upto 25% Cashback On First Order: GET25OFF - 
        <a href="#" style="color: white; text-decoration: underline;">SHOP NOW</a>
    </div>

     <header class="header">
        <div class="logo"><i class="fas fa-shopping-basket"></i> PurchasingLanka.LK</div>
        <div class="search-box">
            <input type="text" placeholder="Search" style="width:800px;">
            <button><i class="fas fa-search"></i></button>
        </div>
        <div class="login-links">
            <a href="addcart.html" style="color:white">🛒 Cart</a>

            <a href="login.html" style="color:white">Login</a>
            <a href="signup.html" style="color: white;">Sign Up</a>
        </div>
    </header>

    
    <div class="nav-links">
        
        <a href="homepage.html">Home</a>
        <a href="#">Shop</a>
        <a href="#">Collections</a>
        <a href="beverages.html">Beverages</a>
        <a href="contact_us.html">Contact</a>
        <a href="about_us.html">About Us</a>
    </div>


    <div class="signup-container">
        <h1 style="text-align: center; padding-top: 50px; color:#6f1daa">Create an Account</h1>

        <form name="signup" action="signup_process.php" method="POST">
            <table width="550" cellpadding="8">
                <tr>
                    <td>First Name :</td>
                    <td>Last Name :</td>
                </tr>
                <tr>
                    <td><input type="text" name="fname" required /></td>
                    <td><input type="text" name="lname" required /></td>
                </tr>
                <tr>
                    <td colspan="2">Email Address :</td>
                </tr>
                <tr>
                    <td colspan="2"><input type="email" name="email" required /></td>
                </tr>
                <tr>
                    <td>Password :</td>
                    <td>Confirm Password :</td>
                </tr>
                <tr>
                    <td><input type="password" name="password" required /></td>
                    <td><input type="password" name="cpassword" required /></td>
                </tr>
                <tr>
                    <td colspan="2" style="text-align: center;">
                        <button type="submit">SIGN UP</button>
                    </td>
                </tr>
            </table>
        </form>
    </div>
      <div class="footer_space">

   </div>

<footer class="footer">
        
        
        <iframe 
            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63307.33014923329!2d80.5110856!3d5.9499538!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae138ffdbd0888d%3A0xf33b7ea061d229d6!2sMatara!5e0!3m2!1sen!2slk!4v1716000000000" 
            width="450" 
            height="250" 
            style="border:0; border-radius: 10px;" 
            allowfullscreen="" 
            loading="lazy" 
            referrerpolicy="no-referrer-when-downgrade">
        </iframe>
    </div>
        <div>
            <h3 style="color:beige">Purchasing Lanka</h3>
            <p>Purchasing Lanka Pvt Ltd</p>
            <p>No 214,Galle Road, Matara, Sri Lanka</p>
            <h3>+94 46 4859 453</h3>
            <p>(Daily operating hours 8.00 am to 8.00 pm)</p>
        </div>
        <div>
            <h3 style="color:rgb(102, 182, 135)">Quick Links</h3>
            <p><a href="#">About Us</a></p>
            <p><a href="#">FAQs</a></p>
            <p><a href="#">Shipping & Refund</a></p>
        </div>
        <div>
            <h3 style="color:rgb(102, 182, 135)">Customer Services</h3>
            <p><a href="#">About Us</a></p>
            <p><a href="#">Contact Us</a></p>
            
        </div>
         
        
    </footer>
     <div class="bottom-bar">
        <p>Copyright © 2025 Purchasing Lanka (Pvt) Ltd. All Rights Reserved</p>
    </div>
</body>
</html>

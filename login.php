<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Login - PurchasingLanka</title>
     <link rel="icon" href="images/homepages images/logo.png" type="image/png">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />
    <link rel="stylesheet" href="login.css" />
    <link rel="stylesheet" href="new.css" />
    <style>
        .error-message {
            background-color: #ffdddd;
            color: #d8000c;
            border: 1px solid #d8000c;
            padding: 10px;
            margin: 15px auto;
            border-radius: 5px;
            text-align: center;
            font-weight: bold;
            width: 90%;
            max-width: 400px;
            animation: fadeIn 0.5s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-5px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>
<body style="background-color: rgb(229, 232, 232);">
     <div class="top-bar">
        Get Upto 25% Cashback On First Order: GET25OFF - 
        <a href="#" style="color: white; text-decoration: underline;">SHOP NOW</a>
    </div>

     <header class="header">
        <div class="logo"><i class="fas fa-shopping-basket"></i> PurchasingLanka.LK</div>
        <div class="search-box">
            <input type="text" placeholder="Search" />
            <button><i class="fas fa-search"></i></button>
        </div>
        <div class="login-links">
            <a href="addcart.html" style="color:white">🛒 Cart</a>
            <a href="login.php" style="color:white">Login</a>
            <a href="signup.php" style="color: white;">Sign Up</a>
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

    <div class="login-frame">
        <h1 style="text-align: center; padding-top: 50px; color:#6f1daa">Login</h1>

        <!-- Display error message here -->
        <?php if (isset($_SESSION['error'])): ?>
            <div class="error-message">
                <?php 
                    echo htmlspecialchars($_SESSION['error']); 
                    unset($_SESSION['error']);
                ?>
            </div>
        <?php endif; ?>

        <form name="login" action="login_process.php" method="POST">
            <table>
                <tr>
                    <td><label>Username (Email):</label></td>
                </tr>
                <tr>
                    <td><input type="email" name="email" required style="width: 365px; height: 38px;" /></td>
                </tr>
                <tr>
                    <td><label>Password:</label></td>
                </tr>
                <tr>
                    <td><input type="password" name="password" required /></td>
                </tr>
                <tr>
                    <td><button type="submit">SIGN IN</button></td>
                </tr>
            </table>
            <center><a href="signup.php">No account yet? Create an account</a></center>
        </form>
    </div>

    <div class="footer_space"></div>

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
        <div>
            <h3 style="color:beige">Purchasing Lanka</h3>
            <p>Purchasing Lanka Pvt Ltd</p>
            <p>No 214,Galle Road, Matara, Sri Lanka</p>
            <h3>+94 46 4859 453</h3>
            <p>(Daily operating hours 8.00 am to 8.00 pm)</p>
        </div>
        <div>
            <h3 style="color:rgb(102, 182, 135)">Quick Links</h3>
            <p><a href="about_us.html">About Us</a></p>
            <p><a href="#">FAQs</a></p>
            <p><a href="#">Shipping & Refund</a></p>
        </div>
        <div>
            <h3 style="color:rgb(102, 182, 135)">Customer Services</h3>
            <p><a href="about_us.html">About Us</a></p>
            <p><a href="#">Contact Us</a></p>
        </div>
    </footer>

    <div class="bottom-bar">
        <p>Copyright © 2025 Purchasing Lanka (Pvt) Ltd. All Rights Reserved</p>
    </div>
</body>
</html>

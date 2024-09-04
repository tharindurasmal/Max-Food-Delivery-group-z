<?php
include('components/connect.php');

session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Max Foods</title>
    <link rel="shortcut icon" href="images/logo/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <!--font awesome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
    <!-- header section starts  -->
    <?php include 'components/category_header.php'; ?>
    <!-- header section ends -->
    <!--contact form-->
    <div class="cotact-container">
        <form id="contactForm" method="POST">
            <h2>Let's Talk</h2>
            <input type="hidden" name="access_key" value="9d96e5dc-441e-4215-9b73-56e5ac86ec71">
            <div class="form-group">
                <label for="name">Your Name</label>
                <input type="text" id="name" name="name" required>
            </div>

            <div class="form-group">
                <label for="email">Your mail</label>
                <input type="email" id="email" name="email" required>
            </div>
            <label for="message">Write your message here</label>

            <div class="contact-right">
                <textarea name="message" rows="8" placeholder='Enter your message' required></textarea>
            </div>
            <input type="checkbox" name="botcheck" class="hidden" style="display: none;">
            <input type="submit" name="send" value="Send" class="send-btn">

        </form>

    </div>

    <!-- Popup box -->
    <div class="popup-container" id="popupContainer">
        <div class="popup-content">
            <h3 id="popupTitle">Thank you!</h3>
            <p id="popupMessage">Your message has been sent successfully.</p>
            <button class="close-btn" id="closePopup">Close</button>
        </div>
    </div>

    <!--footer start-->
    <?php include 'components/footer.php'; ?>
    <!--footer end-->  
    <script src="js/profile.js"></script>
    <script src="js/email.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
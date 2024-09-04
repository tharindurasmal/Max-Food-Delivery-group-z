<?php
include('components/connect.php');

    session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Max Food</title>
    <link rel="shortcut icon" href="images/logo/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <!--font awesome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
    <!-- header section starts  -->
    <?php include 'components/category_header.php'; ?>
    <!-- header section ends -->
    <div class="smal-container-ab">
        <div class="about">
            <h2 class="ab-title anim">About us</h2>
            <img src="https://www.bakingbusiness.com/ext/resources/2024/03/04/Editorial_Lead.jpg?height=667&t=1709574700&width=1001" class="anim">
            <p class="anim">Welcome to Max Food! At Max Food, we are passionate about delivering fresh, high-quality, and delicious products to our customers. 
                Whether you're looking for everyday groceries, specialty items, or gourmet treats, our wide selection has something for everyone. 
                We prioritize quality and customer satisfaction, ensuring that every visit to Max Food is a delightful experience. 
                Shop with us and enjoy the best that the food world has to offer—where every bite is a taste of excellence!
                Feel free to adjust this based on the specific products or services you offer.
            </p>
                <div class="popular">
                    <div class="small-container">
                    <h2 class="ab-title anim">Staff</h2>
                    <div class="row anim">
                        <div class="col-6">
                            <img src="https://www.srilankafoundation.org/wp-content/uploads/2017/08/Screen-Shot-2017-08-10-at-3.42.38-PM.png" alt="">
                            <h4>Dharshan Munidasa</h4></a>
                        </div>
                        <div class="col-6">
                            <img src="https://assets.unileversolutions.com/v1/118558343.jpg" alt="">
                            <h4>Saman Wijeratne</h4></a>
                        </div>
                        <div class="col-6">
                            <img src="https://assets.unileversolutions.com/v1/118557986.jpg" alt="">
                            <h4>Chathurika Anuradha</h4></a>
                        </div>
                    </div>
                    </div>
                </div>

            <h2 class="ab-title anim">Find Us</h2>
            <div class="find-us anim">   
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d253516.07968987332!2d79.64600792499999!3d6.867972699999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25a707456f459%3A0x2a9679b4605235a1!2sMax%20Food%20Take%20Away!5e0!3m2!1sen!2slk!4v1723551324134!5m2!1sen!2slk" width="600" height="150" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe> 
                    <div class="social">
                    <ul>
                        <li><i class="fa-solid fa-envelope fa-2x"></i><a href="#"> Email</a></li>
                        <li><i class="fa-brands fa-facebook fa-2x"></i><a href="#"> facebook</a></li>
                        <li><i class="fa-brands fa-instagram fa-2x"></i><a href="#"> instagram</a></li>
                        <li><i class="fa-solid fa-headset fa-2x"></i><a href="#"> Chat</a></li>
                    </ul>
                    </div>
            </div>
        </div>
    </div>
    <!--footer start-->
    <?php include 'components/footer.php'; ?>
    <!--footer end-->  
    <script src="js/profile.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
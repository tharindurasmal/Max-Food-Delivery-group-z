<?php
include('components/connect.php');
session_start();
if(isset($_POST['order_btn'])){
    $name = $_POST['name'];
    $number = $_POST['number'];
    $email = $_POST['email'];
    $method = $_POST['method'];
    $flat = $_POST['flat'];
    $street = $_POST['street'];
    $city = $_POST['city'];
    $pin_code = $_POST['pin_code'];

    $cart_query = mysqli_query($conn, "SELECT * FROM `cart`");
    $price_total = 0;
    if(mysqli_num_rows($cart_query)>0){
        while($product_item = mysqli_fetch_assoc($cart_query)){
            $product_name[] = $product_item['name'].'('.$product_item['quantity'].')';
            $product_price = number_format($product_item['price'] * $product_item['quantity']);
            $price_total += $product_price;
        };
        $total_product = implode(', ',$product_name);
        $detail_query = mysqli_query($conn,"INSERT INTO `order`(name,number,email,method,flat,street,city,pin_code,total_product,total_price)VALUES('$name','$number','$email','$method','$flat','$street','$city','$pin_code','$total_product','$price_total')") or die('query failed');
    
        if($cart_query &&  $detail_query){
            mysqli_query($conn, "DELETE FROM `cart`");
    
            echo "
            <div class='order-message-container'>
            <div class='message-container'>
                    <h3>Thank you for shopping</h3>
                    <div class='order-detail'>
                    <span>".$total_product."</span>
                    <span class='total'>Total :".$price_total."</span>
                </div>
                <div class='customer-details'>
                    <p> Your name : <span>".$name."</span></p>
                    <p> Your number : <span>".$number."</span></p>
                    <p> Your email : <span>".$email."</span></p>
                    <p> Your address : <span>".$flat.",".$street.",".$city."</span></p>
                    <p> Your Payment method : <span></span></p>
                    <p> (*pay when product arrives*)</p>
                </div>
                <a href='category.php' class='btn'>continue shopping</a>
            </div>
            </div>
            ";
    
        }
    }else{
        echo "
        <div class='order-message-container'>
            <div class='message-container'>
                    <h3>Your Cart is Empty!</h3>
                    <div class='order-detail'>
                    <span>".$total_product."</span>
                    <span class='total'>Total :".$price_total."</span>
                </div>
                <div class='customer-details'>
                    <p> Your name : <span>".$name."</span></p>
                    <p> Your number : <span>".$number."</span></p>
                    <p> Your email : <span>".$email."</span></p>
                    <p> Your address : <span>".$flat.",".$street.",".$city."</span></p>
                    <p> Your Payment method : <span>".$method."</span></p>
                    <p> (*No Payment done*)</p>
                </div>
                <a href='category.php' class='btn'>continue shopping</a>
            </div>
            </div>
            ";
    }

    

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Max Foods - checkout</title>
    <link rel="shortcut icon" href="images/logo/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <!--font awesome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
    <!-- header section starts  -->
    <?php include 'components/category_header.php'; ?>
    <!-- header section ends -->
     <div class="container">
        <h2 class="ab-title">COMPLETE YOUR ORDER</h2>
        <section class="checkout-form">

        <form action="" method="post">

        <div class="display-order">
                <?php
                    $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
                    $total = 0;
                    $grand_total = 0;
                    if(mysqli_num_rows($select_cart)>0){
                        while($fetch_cart = mysqli_fetch_assoc($select_cart)){
                            $total_price = number_format($fetch_cart['price']* $fetch_cart['quantity']);
                            $grand_total = $total += $total_price;
                   
                ?>
                <span><?= $fetch_cart['name'];?>(<?= $fetch_cart['quantity']; ?>)</span>
                <?php
                        }
                    }else{
                        echo "<div class= 'display-order'><span>your cart is empty!</span><?div>";
                    }
                       
                ?>
                <span class="grand-total">grand total: <?= $grand_total;?></span>
            </div>

            <div class="flex">
                <div class="inputbox">
                    <span>Your Name</span>
                    <input type="text" placeholder="enter your name" name="name" required>
                </div>
   
          
                <div class="inputbox">
                    <span>Your Number</span>
                    <input type="text" placeholder="enter your number" name="number" required>
                </div>
     
       
                <div class="inputbox">
                    <span>Your Email</span>
                    <input type="text" placeholder="enter your email" name="email" required>
                </div>
         
   
                <div class="inputbox">
                    <span>Payment Method</span>
                    <select name="method" id="">
                        <option value="cash on delivery" selected>cash on delivery</option>
                        <option value="cash on delivery">credit card</option>
                    </select>
                </div>
        
                <div class="inputbox">
                    <span>Address line 1</span>
                    <input type="text" placeholder="e.g flat no." name="flat" required>
                </div>

                <div class="inputbox">
                    <span>Address line 2</span>
                    <input type="text" placeholder="e.g street name" name="street" required>
                </div>
                <div class="inputbox">
                    <span>City</span>
                    <input type="text" placeholder="e.g colombo" name="city" required>
                </div>

                <div class="inputbox">
                    <span>Pin Code</span>
                    <input type="text" placeholder="e.g 123456" name="pin_code" required>
                </div>
            </div>
            <br><br>
            <div class="order">
            <input type="submit" value="Order now" name="order_btn" class="order-btn">
            </div>
        </form>
        </section>
    </div>
 
    <script src="js/profile.js"></script>
    <script src="js/email.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
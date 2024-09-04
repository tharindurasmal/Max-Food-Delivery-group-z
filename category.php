<?php
include('components/connect.php');

    session_start();
    

    if(isset($_POST['add_to_cart'])){
        $product_name = $_POST['product_name'];
        $product_price = $_POST['product_price'];
        $product_image = $_POST['product_image'];
        $product_quantity = 1;
        if(empty($_SESSION['user_name'])){
            mysqli_query($conn, "DELETE FROM `cart`");
            header('location:login.php');
        }else{
            $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name ='$product_name'");
        
            if(mysqli_num_rows($select_cart) > 0){
                $message[]='product already added to cart';
            }else{

                
                // To identifying the currently logged-in user
                if(!empty($_SESSION['user_name'])){
                    $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name,price,image,quantity)VALUES('$product_name','$product_price','$product_image','$product_quantity')");
                    $message[]='product added to cart';
                    
                }
            }
        }
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Max Foods - Categories</title>
    <link rel="shortcut icon" href="images/logo/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <!--font awesome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

</head>
<body>
    <!-- header section starts  -->
    <?php include 'components/category_header.php'; ?>
    <!-- header section ends -->
    <!--Foods-->
    <div class="small-container">
        <h2 class="title">Explore Foods</h2>
        <form action="" method="get">
            <div class="search-container">
                <input type="text" name="search" value="<?php if(isset($_GET['search'])){echo $_GET['search'];} ?>" class="search" placeholder="Search foods">
                <button type="submit" class="search-btn">Search</button>
            </div>
        </form>

    <?php
    //if search
    if(isset($_GET['search'])){
        $filtervalues = $_GET['search'];
        


        $select_products = mysqli_query($conn, "SELECT * FROM `products` WHERE name LIKE '%$filtervalues%'");
        if(mysqli_num_rows($select_products) > 0) {
            $count = 0;
            while($fetch_products = mysqli_fetch_assoc($select_products)) {
                if ($count % 4 == 0) {
                    if ($count > 0) {
                        echo '</div>'; // Close the previous row
                    }
                    echo '<div class="row">'; // Start a new row
                }
    ?>
                <div class="col-4">
                    <form action="" method="post">
                        <img src="admin_pannel/uploaded_img/<?php echo $fetch_products['image'];?>" alt="">
                        <h4><?php echo $fetch_products['name'];?></h4>
                        <p><?php echo 'Rs '. $fetch_products['price'].'/-';?></p>
                        <div class="btn-con">

                            <input type="hidden" name="product_name" value="<?php echo $fetch_products['name'];?>">
                            <input type="hidden" name="product_price" value="<?php echo $fetch_products['price'];?>">
                            <input type="hidden" name="product_image" value="<?php echo $fetch_products['image'];?>">

                            <input type="submit" value="add to cart" class="cart-btn" name="add_to_cart">
                        </div>
                    </form>
                </div>
    <?php 
                $count++;
            }
            echo '</div>'; // Close the last row
        }else{
            echo 'No ';
        }
    
    }else{
    //default all foods display else
    
    ?>


        <?php
            $select_products = mysqli_query($conn, "SELECT * FROM `products`");
            if(mysqli_num_rows($select_products) > 0) {
                $count = 0;
                while($fetch_products = mysqli_fetch_assoc($select_products)) {
                    if ($count % 4 == 0) {
                        if ($count > 0) {
                            echo '</div>'; // Close the previous row
                        }
                        echo '<div class="row">'; // Start a new row
                    }
        ?>
                    <div class="col-4">
                        <form action="" method="post">
                            <img src="admin_pannel/uploaded_img/<?php echo $fetch_products['image'];?>" alt="">
                            <h4><?php echo $fetch_products['name'];?></h4>
                            <p><?php echo 'Rs '. $fetch_products['price'].'/-';?></p>
                            <div class="btn-con">

                                <input type="hidden" name="product_name" value="<?php echo $fetch_products['name'];?>">
                                <input type="hidden" name="product_price" value="<?php echo $fetch_products['price'];?>">
                                <input type="hidden" name="product_image" value="<?php echo $fetch_products['image'];?>">

                                <input type="submit" value="add to cart" class="cart-btn" name="add_to_cart">
                            </div>
                        </form>
                    </div>
        <?php 
                    $count++;
                }
                echo '</div>'; // Close the last row
            }
        }
        ?>
    </div>

    <!--footer start-->
    <?php include 'components/footer.php'; ?>
    <!--footer end-->  
    <script src="js/profile.js"></script>
    <script src="js/script.js"></script>
</body>
</html>
<?php
  session_start();
include('components/connect.php');
if(isset($_POST['update_btn'])){
    $update_value = $_POST['update_quantity'];
    $update_id = $_POST['update_quantity_id'];
    $udpade_quantity_query = mysqli_query($conn, "UPDATE `cart` SET quantity = '$update_value' WHERE id = '$update_id'");
    if($udpade_quantity_query){
        header('location:cart.php');
    };
};

if(isset($_GET['remove'])){
    $remove_id = $_GET['remove'];
    mysqli_query($conn, "DELETE FROM `cart` WHERE id = '$remove_id'");
    header('location:cart.php');
};

if(isset($_GET['delete_all'])){
    mysqli_query($conn, "DELETE FROM `cart`");
    header('location:cart.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart - Max Foods</title>
    <link rel="stylesheet" href="css/style.css">
     <!--font awesome cdn link-->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">

</head>
<body>
    <!-- header section starts  -->
    <?php include 'components/category_header.php'; ?>
    <!-- header section ends -->
    <div class="cart-container">
        <div class="cart-header">
            <h2>Your Shopping Cart</h2>
        </div>
        
        <table class="cart-table">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody id="cart-items">

                <?php
                    $select_cart = mysqli_query($conn, "SELECT * FROM `cart`");
                    $grand_total = 0;
                    if(mysqli_num_rows($select_cart)>0){
                        while($fetch_cart = mysqli_fetch_assoc($select_cart)){


                ?>

                <tr>
                    <td class="cart-item">
                        <img src="admin_pannel/uploaded_img/<?php echo $fetch_cart['image'];?>" alt="Product 1">
                        <span><?php echo $fetch_cart['name'];?></span>
                    </td>
                    <td>Rs. <?php echo $fetch_cart['price'];?></td>

                    <td>
                    <form action="" method="post">
                        <input type="hidden" name="update_quantity_id" value="<?php echo $fetch_cart['id'];?>">
                        <input type="number" class="quntity" name="update_quantity" value="<?php echo $fetch_cart['quantity']; ?>" min="1">
                        <input type="submit" class="update-btn" value="update" name="update_btn">
                    </form>
                    </td>

                    <td>Rs. <?php echo $sub_total=number_format($fetch_cart['price'])*$fetch_cart['quantity'];?>/-</td>
                    <td><a href="cart.php?remove=<?php echo $fetch_cart['id'];?>" onclick="return confirm('remove item from chart?')" class="remove-btn">remove</a></td>
                    
                </tr>
                
                <?php
                    $grand_total += $sub_total; 
                        };
                    };
                ?>

            </tbody>
        </table>
       
        <div class="cart-actions">
            <span class="total">Total: Rs. <?php echo $grand_total ?></span>
            <a href="checkout.php" class="checkout-btn">Proceed to Checkout</a>
            <a href="cart.php?delete_all" class="remove-btn" onclick="return confirm('are you sure you want to delete all');"><i class="fas fa-trash"></i> Delete All</a>

        </div>
    </div>
    <script src="js/profile.js"></script>
    <script src="js/script.js"></script>
</body>
</html>

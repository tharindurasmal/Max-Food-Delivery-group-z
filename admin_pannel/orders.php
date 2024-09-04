<?php
include('admin_components/connect.php');

if(isset($_POST['update_product'])){
    $update_p_id = $_POST['update_p_id'];
    $update_p_name = "deliverd";
    

    $update_stmt = $conn->prepare("UPDATE `order` SET status = '$update_p_name' WHERE id = '$update_p_id'");
    if($update_stmt -> execute()){

        $message[] = 'Product updated successfully';
    }else{
        $message[] = 'Product not updated';
    }
    $update_stmt->close();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../images/logo/logo.svg" type="image/x-icon">
    <title>Admin Pannel</title>
    <!--font awesome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
    <link rel="stylesheet" href="../css/admin_style.css">
</head>
<body>
    <!-- header section starts  -->
    <?php include 'admin_components/admin_header.php'; ?>
    <!-- header section ends -->
    <div class="banner">
        <div class="details">
            <h1>Orders</h1>
        </div>
     </div>


     <div class="display-order-table">
        <table>
            <thead>
                <th>Name</th>
                <th>Number</th>
                <th>Address</th>
                <th>Payment Method</th>
                <th>Total Product</th>
                <th>Total Price</th>
                <th>Action</th>
            </thead>
            <tbody>
                <?php
                    $select_products = mysqli_query($conn, "SELECT * FROM `order` WHERE status = 'pending'");
                    if(mysqli_num_rows($select_products)){
                        while($row = mysqli_fetch_assoc($select_products)){ 
                ?>
                <tr>
                    <td><?php echo $row['name'];?></td>
                    <td><?php echo $row['number'];?></td>
                    <td><?php echo $row['flat'];?></td>
                    <td><?php echo $row['method'];?></td>
                    <td><?php echo $row['total_product'];?></td>
                    <td><?php echo $row['total_price'];?></td>
                    
                    <td>
                        <a href="orders.php?edit=<?php echo $row['id'];?>" class="deliver-btn" onclick="return confirm('order deliverd');"><i class="fa fa-truck" aria-hidden="true"></i>
                        <?php echo $row['status']?></a>
                    </td>
                </tr>
                <?php
                        };
                    }else{
                        echo"<span>no any orders</span>";
                    }
                ?>
            </tbody>
        </table>
        
        <div class="edit-form-container">
        <?php
            if(isset($_GET['edit'])){
                    $edit_id = $_GET['edit'];
                    $edit_query = mysqli_query($conn, "SELECT * FROM `order` WHERE id = $edit_id");
                    if(mysqli_num_rows($edit_query) > 0){
                        while($fetch_edit = mysqli_fetch_assoc($edit_query)){
        ?>
            <form action="" method="post" enctype="multipart/form-data">
                <input type="hidden" name="update_p_id" value="<?php echo $fetch_edit['id']; ?>">
                <h2>Deliver the foods</h2>
                <div class="button-container">
                <input type="submit" value="Deliver" name="update_product" class="deliverd-btn">
                <input type="reset" value="Cancel" id="close-edit" class="cancel-btn">
                </div>
            </form>
        <?php
            };
        };
        echo "<script>document.querySelector('.edit-form-container').style.display = 'flex'; </script>";
    }
        ?>
        
    </div>
    <script src="../js/deliver.js"></script>
</body>
</html>
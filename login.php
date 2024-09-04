<?php
    session_start();

    include('components/connect.php');   
 
    if (isset($_POST['login-btn'])) {

        // Sanitize and validate user input
        $filter_email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
        $email = mysqli_real_escape_string($conn, $filter_email);
        $filter_password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');
        $password = mysqli_real_escape_string($conn, $filter_password);
        
        // Check if email already exists
        $stmt = $conn->prepare("SELECT * FROM `user` WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            if(($row['email'] === $email) && (password_verify($password, $row['password']))){

                // Update last login time
                $userId = $row['id'];
                $updateQuery = "UPDATE `user` SET last_log = NOW() WHERE id = ?";
                $updateStmt = $conn->prepare($updateQuery);
                $updateStmt->bind_param("i", $userId);
                $updateStmt->execute();
                $updateStmt->close();

                if ($row['user_type']=='admin'){
                    $_SESSION['admin_name']=$row['name'];
                    $_SESSION['admin_email']=$row['email'];
                    $_SESSION['admin_id']=$row['id'];
                    header('location:admin_pannel/admin_pannel.php');
                    exit();
                }else if($row['user_type']=='user'){
                    $_SESSION['user_name']=$row['name'];
                    $_SESSION['user_email']=$row['email'];
                    $_SESSION['user_id']=$row['id'];
                    header('location:home.php');
                    exit();
                }
            }else{
                $_SESSION['message'] = 'Incorrect email or password';
            }
        }else{
            $_SESSION['message'] = 'Incorrect email or password';
        }
        $stmt->close();
        
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Max Foods - sign-up</title>
    <link rel="shortcut icon" href="images/logo/logo.svg" type="image/x-icon">
    <!--stylesheet link-->
    <link rel="stylesheet" href="css/style.css">
    <!--font awesome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
  
</head>
<body>
    <!-- header section starts  -->
    <?php include 'components/login_header.php'; ?>
    <!-- header section ends -->
    
    <!--login form start-->
    <div class="login-container">
        <form method="post">
        <h2>Sign in</h2>
        <?php
            if (isset($_SESSION['message'])) {
                echo "<div class='message'>" . $_SESSION['message'] . "</div>";
                if ($_SESSION['message'] === 'Incorrect email or password') {
                    echo "<script>
                                setTimeout(function() {
                                    window.location.href = 'login.php';
                                }, 3000); // Redirect after 3 seconds
                          </script>"
                    ;
                }
                unset($_SESSION['message']); // Clear the message after displaying it
            }
            ?>
        <div class="form-group">
            <label for="username">Email</label>
            <input type="email" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" required>
        </div>

        <input type="submit" name="login-btn" value="Login" class="reg-btn">
        
        <div class="login">
            <a href="register.php">Register Now</a>
        </div>
        </form>
    </div>
    <!--login form start-->

    <!--footer start-->
    <?php include 'components/footer.php'; ?>
    <!--footer end-->  

    <script src="js/script.js"></script>
</body>
</html>
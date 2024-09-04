<?php
    session_start();

    include('components/connect.php');

    if (isset($_POST['submit-btn'])) {

        // Sanitize and validate user input
        $filter_username = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
        $username = mysqli_real_escape_string($conn, $filter_username);
        $filter_email = htmlspecialchars($_POST['email'], ENT_QUOTES, 'UTF-8');
        $email = mysqli_real_escape_string($conn, $filter_email);
        $filter_password = htmlspecialchars($_POST['password'], ENT_QUOTES, 'UTF-8');
        $password = mysqli_real_escape_string($conn, $filter_password);
        $filter_cpassword = htmlspecialchars($_POST['cpassword'], ENT_QUOTES, 'UTF-8');
        $cpassword = mysqli_real_escape_string($conn, $filter_cpassword);
        // Check if email already exists
        $stmt = $conn->prepare("SELECT * FROM `user` WHERE email = ?");
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $result = $stmt->get_result();
        if ($result->num_rows > 0) {
            $_SESSION['message'] = 'Email already exists';
        } else {
            if ($password != $cpassword) {
                $_SESSION['message'] = 'Passwords do not match';
            } else {
                // Hash the password
                $hashed_password = password_hash($password, PASSWORD_BCRYPT);

                // Insert new user
                $stmt = $conn->prepare("INSERT INTO `user` (`name`, `email`, `password`) VALUES (?, ?, ?)");
                $stmt->bind_param("sss", $username, $email, $hashed_password);

                if ($stmt->execute()) {
                    $_SESSION['message'] = 'User registered successfully';
                    //header('location:login.php');
                } else {
                    error_log("Query failed: " . $stmt->error);
                    $_SESSION['message'] = 'An error occurred while processing your request.';
                }
            }
        }
        $stmt->close();
        $conn->close(); // Close the database connection

        header("Location: " . $_SERVER['PHP_SELF']); // Reload the page
        exit;
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Max Foods - sign-up</title>
    <link rel="shortcut icon" href="images/logo/logo.svg" type="image/x-icon">
    <link rel="stylesheet" href="css/style.css">
    <!--font awesome cdn link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css">
</head>
<body>
    <!-- header section starts  -->
    <?php include 'components/register_header.php'; ?>
    <!-- header section ends -->

    <!--Sign up form start-->
    <div class="login-container">
        <form method="post">
        <h2>Register</h2>
        <?php
            if (isset($_SESSION['message'])) {
                echo "<div class='message'>" . $_SESSION['message'] . "</div>";
                if ($_SESSION['message'] === 'User registered successfully') {
                    echo "<script>
                                setTimeout(function() {
                                    window.location.href = 'login.php';
                                }, 3000); // Redirect after 3 seconds
                          </script>"
                    ;
                }else if($_SESSION['message'] === 'Email already exists'){
                    echo "<script>
                                setTimeout(function() {
                                    window.location.href = 'login.php';
                                }, 3000); // Redirect after 3 seconds
                         </script>"
                    ;
                }else{
                    echo "<script>
                                setTimeout(function() {
                                    window.location.href = 'register.php';
                                }, 3000); // Redirect after 3 seconds
                          </script>"
                    ;
                }
                unset($_SESSION['message']); // Clear the message after displaying it
            }
            ?>
        <div class="form-group">
            <label for="username">User Name</label>
            <input type="text" id="username" name="username" placeholder="Enter Your Name" required>
        </div>

        <div class="form-group">
            <label for="username">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter Your email" required>
        </div>

        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter Your Password" required>
        </div>

        <div class="form-group">
            <label for="password">Confirm Password</label>
            <input type="password" id="cpassword" name="cpassword" placeholder="Re-type Your Password" required>
        </div>

        <input type="submit" name="submit-btn" value="Register" class="reg-btn">

        <div class="login">
            <a href="login.php">Already have an account?</a>
        </div>
        </form>
    </div>
    <!--Sign up form end-->

    <!--footer start-->
     <?php include 'components/footer.php'; ?>
    <!--footer end-->

    <script src="js/script.js"></script>
</body>
</html>
<?php

@include 'config.php';

if (isset($_POST['submit'])) {
    $name = mysqli_real_escape_string($conn, $_POST['name']);
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $pass = md5($_POST['password']);
    $cpass = md5($_POST['cpassword']);
    $select = " SELECT * FROM user_form WHERE email = '$email' && password = '$pass' ";

    $result = mysqli_query($conn, $select);
    if (mysqli_num_rows($result) > 0) {

        $error[] = 'user already exist!';
    } else {
        if ($pass != $cpass) {
            $error[] = 'password not matched!';
        } else {
            $insert = "INSERT INTO user_form(name, email, password) VALUES('$name', '$email', '$pass')";
            mysqli_query($conn, $insert);
            header('location:http://localhost/SimplySaladSubscription/index.php');
        }
    }
};

if (isset($_POST['submit2'])) {
    $email1 = mysqli_real_escape_string($conn, $_POST["email"]);
    $pass1 = md5($_POST["password"]);

    $select1 = " SELECT * FROM user_form WHERE email = '$email1' && password = '$pass1' ";

    $result1 = mysqli_query($conn, $select1);
    if (mysqli_num_rows($result1) > 0) {

        $row = mysqli_fetch_array($result1);
        $_SESSION["user_name"] = $row["name"];
        header("location:http://localhost/SimplySaladSubscription/index.php");
    } else {
        $error2[] = "incorrect email or password!";
    }
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">

    <link rel="icon" type="image/x-icon" href="./favicon.ico" />


</head>

<body>

    <nav class="navbar">
           <a href="../SimplySalad_Landing/index.html"><img src="./logo bw_page-0001.png" alt="" class="logo" /></a>
  
    </nav>



    <div class="container" id="container">
        <div class="form-container sign-up-container">
            <form action="" method="post">
                <h1>Sign Up</h1>
                <?php
                if (isset($error)) {
                    foreach ($error as $error) {
                        echo '<span class="error-msg">' . $error . '</span>';
                    };
                };
                ?>
                <input type="text" name='name' required placeholder="Name" />
                <input type="email" name='email' required placeholder="Email" />
                <input type="password" name='password' required placeholder="Password" />
                <input type="password" name='cpassword' required placeholder="Confirm your Password" />
                <input type="submit" name="submit" value="Sign Up" class="btn">
            </form>
        </div>


        <div class="form-container sign-in-container">
            <form action="" method="post">
                <h1>Sign in</h1>
                <input type="email" name="email" required placeholder="Email" />
                <input type="password" name="password" required placeholder="Password" />
                <?php
                if (isset($error2)) {
                    foreach ($error2 as $error2) {
                        echo '<span class="error-msg">' . $error2 . '</span>';
                    };
                };
                ?>
                <input type="submit" name="submit2" value="Sign In" class="btn">
                <!-- <p> Forgot your password? <a href="forgot.php" style="color: #609966;">Click Here</a></p> -->

            </form>
        </div>

        <div class="overlay-container">
            <div class="overlay">
                <div class="overlay-panel overlay-left">
                    <h1>Already have an account?</h1><br>
                    <button class="ghost" id="signIn">Sign In</button>
                </div>
                <div class="overlay-panel overlay-right">
                    <h1>Don't have an account?</h1><br>
                    <button class="ghost" id="signUp">Sign Up</button>
                </div>
            </div>
        </div>
    </div>

    <div class="foot" style="position: relative; justify-content: center">
        <a href="https://www.instagram.com/thesimplysalad/?hl=en">
            <img src="./instagram.png" alt="" class="ficon" />
        </a>
        <a href="https://www.google.com/search?q=simply+salad&oq=simply+salad&aqs=chrome..69i57j35i39j0i67i650l2j46i67i199i465i650j69i60l3.2217j0j4&sourceid=chrome&ie=UTF-8">
            <img src="./search.png" alt="" class="ficon" />
        </a>
        <a href="https://www.google.com/maps/dir/21.1612892,72.792461/simply+salad/@22.0937522,71.7716178,8z">
            <img src="./location.png" alt="" class="ficon" />
        </a>
    </div>

    <script src="index.js"></script>
</body>

</html>
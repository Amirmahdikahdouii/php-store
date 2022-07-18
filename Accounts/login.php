<!DOCTYPE html>
<html lang="en">
<?php
session_start();
?>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../static/css/login.css"/>
</head>

<body class="body">

<section class="main-container">
    <a class="logo" href="../index.php">Coffee Shop</a>
    <div class="sign-in-up-container">
        <button class="form-title form-title-active" id="login-form-switch-button">Login</button>
        <button class="form-title" id="sign-in-form-switch-button"><a href="./sign-up.php">Sign Up</a></button>
    </div>
    <form action="" class="form" method="post" id="login-form">
        <input type="email" name="email" id="email" placeholder="E-Mail" class="form-input"
               title="Please Enter E-Mail"/>
        <input type="password" name="password" id="password" placeholder="Password" class="form-input"
               title="Please Enter Password"/>
        <button class="submit-form-button" type="submit">Sign In</button>
    </form>
    <p class="rules-acception-text">
        I accept All <a href="#">Coffee Shop Rules</a> and <a href="#">privacy</a>
    </p>
</section>
<?php
include_once "../settings/dbconfig.php";
if (isset($_POST['email']) &&
    isset($_POST['password']) &&
    array_key_exists("email", $_POST) &&
    array_key_exists("password", $_POST)
) {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT WHERE email=`$email` FROM account";
    if(mysqli_error($sql)){
        echo '<script>alert("please enter correct email")</script>';
    }
    $result = mysqli_query($db_connection, $sql);
    $_SESSION["userLogin"] = true;
    header("Location: sign-up.php");
    return True;
}

?>

</body>

</html>

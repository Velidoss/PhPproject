<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/style.css">
    <title>Document</title>
</head>
<body>

<header class="heading">
    <div class="gradient-background">
        <div class="container">
            <nav class=navigation>
                <a class="logo" href="index.php">
                    Velidoss
                </a>
                <ul class="menu">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="signup.php">Register</a></li>
                    <li><a href="login.php?login">Log in</a></li>
                    <li><a href="#">About</a></li>
                </ul>
            </nav>

        </div>
    </div>
    <div>
        <?php
            if (isset($_SESSION['userId'])){
                echo '<form action="includes/logout.inc.php" method="post">
            <button type="submit" name="logout-submit">logout</button>
        </form>';
            }
            else{
                if (isset($_GET['login'])){
                echo '
                <div class="container">
                    
                    <div class = "user-form">
                        <form action="includes/login.inc.php" method="post">
                            <p>Log in</p>
                            <input type="text" name="mailuid" placeholder="Username/Email">
                            <input type="password" name="pwd" placeholder="Password">
                            <button  type="submit" name="login-submit">log in</button>
                        </form>
                    </div>
                    <div class="button signup">
                        <a href="signup.php">Dont have an account? Signup!</a>
                    </div>
                    <div class="button forgot">
                        <a href="reset-password.php">Forgot your password?</a>
                    </div>
                </div>
                
            ';}else{
                
            }
            }
        ?>

    </div>
</header>
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
                <a class="logo" href="#">
                    Velidoss
                </a>
                <ul class="menu">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="#">Register</a></li>
                    <li><a href="#">login</a></li>
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
                echo '
                <div class="container">
                    <div class = "log-form">
                        <form action="includes/login.inc.php" method="post">
                            <input type="text" name="mailuid" placeholder="Username/Email">
                            <input type="password" name="pwd" placeholder="Password">
                            <button type="submit" name="login-submit">login</button>
                        </form>
                    </div>
                    <div class="signup">
                        <a href="signup.php">Signup!</a>
                    </div>
                    <div class="forgot">
                        <a href="reset-password.php">Forgot your password?</a>
                    </div>
                </div>
                
            ';
            }
        ?>

    </div>
</header>
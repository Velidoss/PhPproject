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

<header>
    <nav>
        <a class="logo" href="#">
            Velidoss
        </a>
    </nav>
    <ul>
        <li><a href="index.php">Home</a></li>
        <li><a href="#">Register</a></li>
        <li><a href="#">login</a></li>
        <li><a href="#">About</a></li>
    </ul>
    <div>
        <?php
            if (isset($_SESSION['userId'])){
                echo '<form action="includes/logout.inc.php" method="post">
            <button type="submit" name="logout-submit">logout</button>
        </form>';
            }
            else{
                echo '<form action="includes/login.inc.php" method="post">
                <input type="text" name="mailuid" placeholder="Username/Email">
                <input type="password" name="pwd" placeholder="Password">
                <button type="submit" name="login-submit">login</button>
            </form>
    
            <a href="signup.php">Signup!</a>';
            }
        ?>


    </div>
</header>
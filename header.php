<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="static/css/style.css?t=<?php echo(microtime(true)); ?>">
    <title>Velidoss</title>
</head>
<body>

<header class="heading">
    <div class="gradient-background">
        <div class="container">
            <nav class=navigation>
                <div class="btn-toggle-nav" onclick="toggleNav()"><p>Menu</p></div>
                <a class="logo" href="index.php">
                    Velidoss
                </a>
                <form action="includes/search-post.inc.php" class="search-form" method="post">
                    <input name="search-post" type="text" placeholder="search a post">
                    <button name="search-post-submit" class="search-post-button" type="submit">Search post</button>
                </form>
                <?php
                    if (isset($_SESSION['userId'])){

                        echo '
    
                <ul class="menu">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="signup.php">Register</a></li>
                    <li><a href="posts.php">Latest</a></li>
                    <li><a href="trademark-reg.php">Register a trademark</a></li>
                    <li><a href="domain-reg.php">Register a domain name</a></li>
                    <li><a href="account_info.php">Account</a></li>
                    <li><a href="calc.php">Calculator</a></li>
                    <li>
                        <form action="includes/logout.inc.php" method="post">
                            <button class="logout-button" type="submit" name="logout-submit">logout</button>
                        </form>
                    </li>
                </ul>
                    ';
                    }else{
                      echo  '<ul class="menu">
                    <li><a href="index.php">Home</a></li>
                    <li><a href="signup.php">Register</a></li>
                    <li><a href="login.php?login">Log in</a></li>
                    <li><a href="posts.php">Latest</a></li>
                </ul>';
                    }
                ?>


            </nav>
            <aside class="nav-sidebar">
                <?php
                    if (isset($_SESSION['userId'])){

                        echo '
    
                <ul class="menu">
                    <li><span>Menu</span></li>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="signup.php">Register</a></li>
                    <li><a href="posts.php">Latest</a></li>
                    <li><a href="trademark-reg.php">Register a trademark</a></li>
                    <li><a href="domain-reg.php">Register a domain name</a></li>
                    <li><a href="account_info.php">Account</a></li>
                    <li><a href="calc.php">Calculator</a></li>

                </ul>
                    ';
                    }?>
            </aside>
        </div>
    </div>
    <div>
        <?php
            if (!isset($_SESSION['userId'])){
                if (isset($_GET['login'])){
                echo '
                <div class="container">
                    
                    <div class = "user-form">
                        <form action="includes/login.inc.php" method="post">
                            <p>Log in</p>
                            <input type="text" name="mailuid" placeholder="Username/Email">
                            <input type="password" name="pwd" placeholder="Password">
                            <button type="submit" name="login-submit">log in</button>
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
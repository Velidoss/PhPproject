<?php
    require 'header.php';
?>

<main>
    <div class="wrapper-main">  
        <section class="section-default">        
            <h1>Reset your password</h1>
            <p>Enter your email</p>
            <form action="includes/reset-request.inc.php" method="post">
                <input name="email"   type="text" placeholder="Enter your email adress ...">
                <button type="submit" name="reset-request-submit">Receive new password on email</button>
            </form>
            <?php
            //ищем ошибку в строке браузера 
                if (isset($_GET["reset"])){
                    if ($_GET["reset"] == "success"){
                        echo "<p class ='signupprocess'> Check your email!</p>";
                    }
                }

            ?>
           <!-- <form action="includes/signup.inc.php" method="post">
                <input type="text" name="uid" placeholder="Username">
                <input type="email" name="mail" placeholder="E-mail">
                <input type="password" name="pwd" placeholder="Password">
                <input type="password" name="pwd-rep" placeholder="Repeat password">
                <button type="submit" name="signup-submit">Signup</button>
            </form>
            -->
        </section> 
    </div>
</main>

<?php
    require 'footer.php';
?>
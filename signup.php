<?php
    require 'header.php';
?>

<main>
    <div class="wrapper-main">  
        <section class="section-default">        
            <h1>Signup</h1>

            <?php
            //ищем ошибку в строке браузера 
                if(isset($_GET['error'])){
                    if ($_GET['error'] == 'emptyfields'){
                        echo '<p class = "signuperror"> Fill in all fields!</p>';
                    }
                    elseif($_GET['error'] == "invaliduid"){
                        echo '<p class = "signuperror"> Wrong email!</p>';
                    }
                }
                elseif ($_GET["signup" == "success"]){
                    echo '<p class = "signupsuccess"> Signup successfull!</p>';
                }

            ?>
            <form action="includes/signup.inc.php" method="post">
                <input type="text" name="uid" placeholder="Username">
                <input type="email" name="mail" placeholder="E-mail">
                <input type="password" name="pwd" placeholder="Password">
                <input type="password" name="pwd-rep" placeholder="Repeat password">
                <button type="submit" name="signup-submit">Signup</button>
            </form>
        </section> 
    </div>
</main>

<?php
    require 'footer.php';
?>
<main>
    <div class="wrapper-main">  
        <section class="section-default">        
            <h1>Signup</h1>
            <?php
            // Ищем ошибку в строке браузера
            if (isset($_GET["newpwd"])){
                if ($_GET["newpwd"] == "passwordupdated"){
                    echo "<p class ='signupprocess'> Your password has been reset!</p>";
                }
            }


            //ищем ошибку в строке браузера 
                if(isset($_GET['error'])){
                    if ($_GET['error'] == 'emptyfields'){
                        echo '<p class = "signuperror"> Fill in all fields!</p>';
                    }
                    elseif($_GET['error'] == "invaliduid"){
                        echo '<p class = "signuperror"> Wrong email!</p>';
                    }
                    elseif ($_GET["signup" == "success"]){
                    echo '<p class = "signupsuccess"> Signup successfull!</p>';
                }
            }                

            function lul(){            
                $sql = 'Запрос';
                $params = ['login', 'pwd', 'email'];
                if(!empty($params)){
                foreach($params as $key => $val){
                    echo $key.'=>'.$val;
                }
            }
        }
        $func = lul();
        ?>
        
         

        
    
            <div class ="user-form">
                <form  action="" method="post">
                    <input type="text" name="uid" placeholder="Username">
                    <input type="email" name="mail" placeholder="E-mail">
                    <input type="password" name="pwd" placeholder="Password">
                    <input type="password" name="pwd-rep" placeholder="Repeat password">
                    <button type="submit" name="signup-submit">Signup</button>
                </form>
            </div>

        </section> 
    </div>
</main>

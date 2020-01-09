<main>

        <section class="section-default">
            <h1>Register a trademark!</h1>
            <?php
            if (isset($_SESSION['userId'])){
                echo '
                    <div class = "user-form">
                        <form action="includes/trademark-reg.inc.php" method="post">
                            <p>Type a name here</p>
                            <input type="text" name="trdm-name" placeholder="Enter trademark name">
                            <button  type="submit" name="trdm-reg">Register trademark</button>
                        </form>
                    </div>
                ';
            }

            $fullUrl = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

            if(strpos($fullUrl, "error=trdmnameempty")==true){
                echo "<p class='error-message'>You did not write a trademark name!</p>";
            }
            elseif(strpos($fullUrl, "error=trdmnamenotmatch")==true){
                echo "<p class='error-message'>This trademark has forbidden symbols!</p>";
            }
            elseif(strpos($fullUrl, "error=sqlerror")==true){
                echo "<p class='error-message'>SQL ERROR!</p>";
            }
            elseif(strpos($fullUrl, "error=trdmalrdexist")==true){
                echo "<p class='error-message'>This trademark is already registered!</p>";
            }
            elseif(strpos($fullUrl, "trademark-reg=success")==true){
                echo "<p class='success-message'>youre registred a trademark!</p>";
            }

            ?>
            <h2>Registered trademarks</h2>
            <?php
            include_once "includes/dbh.inc.php";
                $sql ="select * from trademarks";
                $result = mysqli_query($conn, $sql);
                $datas = array();
                if (mysqli_num_rows($result)>0){
                    while($row = mysqli_fetch_assoc($result)){
                        $datas[]=$row;
                    }
                }

                foreach ($datas as $data){
                    echo $data['trdmName']." ";
                }
            ?>


<p class="trdmlist"></p>


        </section>

</main>
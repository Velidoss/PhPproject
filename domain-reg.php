<?php
    require "header.php";
    ?>

<main>
    <section class="section-default">
        <h1>Register a domain name!</h1>
        <?php
            if (isset($_SESSION['userId'])){
                echo '
                    <div class = "user-form">
                        <form action="includes/domain-reg.inc.php" method="post">
                            <p>Type a domain name here</p>
                            <input type="text" name="domain-name" placeholder="Enter domain name">
                            <button  type="submit" name="domain-reg">Register domain</button>
                        </form>
                    </div>
                ';
            }
            ?>
    </section>
</main>

<?php
    require "footer.php";
?>

<p>Главная страница</p>
<?php

foreach ($posts as $val):?>
    <h3><?php echo $val['postTitle']; ?></h3>
    <p><?php echo $val['postContent']; ?></p>
    <hr>
<?php endforeach;  ?>
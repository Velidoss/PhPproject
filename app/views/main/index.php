<p>Главная страница</p>
<?php

foreach ($posts as $val){
    echo '
        <div class="container centered">
            <div class="post">
                <h2>'.$val['postTitle'].'</h2>
                <p>'.$val['postContent'].'</p>
                <p>'.$val['postDateTime'].'</p>
                <p>'.$val['postCategory'].'</p>
            </div>
        </div>';
}
    

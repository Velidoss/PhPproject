<?php

class Usersview extends Users{
    
    public function showUsers($userName){
        $results = $this->getUser($userName);
        echo "Nickname - ". $results[0]['uidUsers'];
    }

    public function showPosts(){
        $show = $this->getPosts();
        for($i=0; $i<count($show); $i++ ){
            echo '
            <div class="container centered">
                <div class="post">
                    <h2>'.$show[$i]['postTitle'].'</h2>
                    <p>'.$show[$i]['postContent'].'</p>
                    <p>'.$show[$i]['postDateTime'].'</p>
                    <p>'.$show[$i]['postCategory'].'</p>
                </div>
            </div>';
        }
    }

}

/*
array (size=3)
  0 => 
    array (size=6)
      'postId' => string '1' (length=1)
      'postTitle' => string '1st Post ' (length=9)
      'postContent' => string 'Отличие VPS от стандартного виртуального хостинга – в гарантии ресурсов, доступных установленным сайтам. У виртуального сервера всегда есть гарантированный минимум мощностей, не меняющийся от нагрузки на остальные сайты на физическом сервере. Дополнительно к этому VPS может исп�'... (length=653)
      'postDateTime' => string '0000-00-00 00:00:00' (length=19)
      'postCategory' => string 'hosting' (length=7)
      'postAuthor' => string '' (length=0)
  1 => 
    array (size=6)
      'postId' => string '2' (length=1)
      'postTitle' => string '2d Post' (length=7)
      'postContent' => string 'Insert data from a website into a database using MySQLi. Today in this PHP tutorial we will learn how to insert data into a database using PHP. To do this we will focus on using PHP MySQLi database functions, and then in the next episode we will get into Prepared Statements.' (length=275)
      'postDateTime' => string '0000-00-00 00:00:00' (length=19)
      'postCategory' => string 'other' (length=5)
      'postAuthor' => string '' (length=0)
  2 => 
    array (size=6)
      'postId' => string '3' (length=1)
      'postTitle' => string 'Another post' (length=12)
      'postContent' => string 'Как вы проверяете, что записалось в базу?
попробуйте utf8_unicode_ci вместо utf8_general_ci
' (length=143)
      'postDateTime' => string '0000-00-00 00:00:00' (length=19)
      'postCategory' => string 'Other' (length=5)
      'postAuthor' => string '' (length=0)

      */
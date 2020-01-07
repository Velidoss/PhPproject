<?php

return [ 
    //'posts/([0-9]+)'=>'posts/view/$1',
   // 'posts'=>'posts/index', // метод ActionPosts в PostsController
   ''=>[
    'controller' => 'main',
    'action' => 'index',
   ], 

   'posts'=>[
    'controller' => 'posts',
    'action' => 'postslist',
   ],    
   
   'posts/makepost'=>[
            'controller' => 'posts',
            'action' => 'makepost',
       ],

       'posts/postslist'=>[
        'controller' => 'posts',
        'action' => 'postslist',
       ],
    ];  
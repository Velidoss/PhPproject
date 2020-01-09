<?php

return [ 
    //'posts/([0-9]+)'=>'posts/view/$1',
   // 'posts'=>'posts/index', // метод ActionPosts в PostsController
    ''=>[
        'controller' => 'main',
        'action' => 'index',
    ], 
    
    'index'=>[
        'controller' => 'main',
        'action' => 'index',
   ],   

   'signup'=>[
        'controller' => 'signup',
        'action' => 'register',
    ],  
    'login'=>[
        'controller' => 'login',
        'action' => 'access',
    ],  
    
   'trademark-reg'=>[
    'controller' => 'trdm',
    'action' => 'register',
    ],  
    'domain-reg'=>[
        'controller' => 'domain',
        'action' => 'register',
    ],  

    'account_info'=>[
        'controller' => 'account',
        'action' => 'info',
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

    'calc'=>[
        'controller' => 'calc',
        'action' => 'default',
    ],


];  
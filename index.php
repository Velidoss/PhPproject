<?php
   session_start();
    use app\core\Router;
    
    spl_autoload_register(function($class){
        $path = str_replace('\\', '/', $class.'.php');
      
        if (file_exists($path)){
            require $path;
        }
    });

?>
    <main>
    <div class="container">
        <?php
            $router = new Router();
            $router->run();
        ?>
    </div>
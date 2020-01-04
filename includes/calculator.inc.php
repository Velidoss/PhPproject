<?php
    declare (strict_types=1);
    include 'autoloader.inc.php';

    $oper = $_POST['oper'];
    $val1 = $_POST['val1'];
    $val2 = $_POST['val2'];

    //
    $calc = new Calculator($oper, (int)$val1, (int)$val2 );

    try {
        echo $calc->calculate();
    } catch (TypeError $e) {
        echo 'Error!:'.$e->getMessage();
    }

?>
<?php
    declare (strict_types=1);
    include 'includes/autoloader.inc.php';
?>



<form action="includes/calculator.inc.php" method="post">
    <input type="number" name="val1">
    <select  name="oper">
        <option value="add">Add</option>
        <option value="min">Minus</option>
        <option value="div">Divide</option>
        <option value="mul">Multiply</option>
    </select>
    <input type="number" name="val2" >
    <button type="submit" name="submit">Calculate</button>
</form>
    <div >
        <p>The result is - </p><span></span>
    </div>

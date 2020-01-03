<?php
require "header.php";
?>

<form action="calculator.js">
    <input type="text" id="value1">
    <input type="text" id="value2">
    operator:
    <select id="operator" >
        <option value="add">Add</option>
        <option value="min">Minus</option>
        <option value="div">Divide</option>
        <option value="mul">Multiply</option>
    </select>
    <button type="button" onclick = "calc()">Calculate</button>
</form>
    <div >
        <p>The result is - </p><span id="result"></span>
    </div>

<?php
require "footer.php";
?>

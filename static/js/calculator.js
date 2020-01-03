function calc(){
    let a = parseInt(document.querySelector('#value1').value);
    let b = parseInt(document.querySelector('#value2').value);
    let operator = document.querySelector('#operator').value;
    let calculate;

    if(operator == "add"){
        calculate = a + b;
    }else if(operator == "min"){
        calculate = a - b;
    }else if(operator == "div"){
        calculate = a / b;
    }else if(operator == "mul"){
        calculate = a * b;
    }

    document.querySelector("#result").innerHTML = calculate;
}
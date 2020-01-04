
function Person(name, eyeColor, age){
    this.name = name;
    this.eyeColor = eyeColor;
    this.age = age;
    this.updateAge = function(){
      return ++this.age;
    };
}

let person01 = new Person("Yurii", "Grey", 25);

console.log(person01.updateAge());


/*
var a = function(){
    var a =20;
    return a;
}

function testExample(name, age) {
    let greeting = "Hi, my name is " + name +" ,nice to meet you!, I am "+ age +" tears old";
    return greeting;
}

let n = "Yurii";
let a = 25;

console.log(testExample(n, a));


let anonFunc = function(name,age){
    let greeting = "Hi, my name is " + name +" ,nice to meet you!, I am "+ age +" tears old";
    return greeting;
}

let n = "Yurii";
let a = 25;

console.log(anonFunc(n, a));



(function(){
    let greeting = "Hi, my name is Yurii, nice to meet you!";
    console.log(greeting);
}())
*/

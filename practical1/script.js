//завдання 1
let num = 20;
let floatNum = 5.5;
let text = 'kring';
let boolean = true;

console.log(num, typeof num);
console.log(floatNum, typeof floatNum);
console.log(text, typeof text);
console.log(boolean, typeof boolean);

num = 10;
console.log(num, typeof num);
floatNum = 30.5;
console.log(floatNum, typeof floatNum);
text = 'tresh';
console.log(text, typeof text);
boolean = false;
console.log(boolean, typeof boolean);

let = concat = num + text;
console.log(concat, typeof concat);
let = numberFromSuring = Number(num);
console.log(numberFromSuring, typeof numberFromSuring);
let = boolToNumber = Number(true);
console.log(boolToNumber, typeof boolToNumber);

let date = {
    num: num,
    floatNum: floatNum,
    text: text,
    boolean: boolean
};
console.log(JSON.stringify(date));


//завдання 2
let a = Number(prompt('введіть перше число'));
let b = Number(prompt('введіть друге число'));
let c = Number(prompt('введіть третє число'));

let average = ((a + b + c) / 3);
console.log('середнє: ', average);

console.log('модуль першого числа: ', Math.abs(a));
console.log('округленя вверх: ', Math.ceil(a));
console.log('округленя вниз: ', Math.floor(a));
console.log('в квадраті: ', Math.pow(a, 2));

console.log('модуль другого числа: ', Math.abs(b));
console.log('округленя вверх: ', Math.ceil(b));
console.log('округленя вниз: ', Math.floor(b));
console.log('в квадраті: ', Math.pow(b, 2));

console.log('модуль третього числа: ', Math.abs(c));
console.log('округленя вверх: ', Math.ceil(c));
console.log('округленя вниз: ', Math.floor(c));
console.log('в квадраті: ', Math.pow(c, 2));

console.log('a : 5: ', a % 5 );
console.log('b : 5: ', b % 5 );
console.log('c : 5: ', c % 5 );

if (a + b > c && a + c > b && c + b >a) {
    console.log('трикутник існує');
}
else {
    console.log('трикутник не існує');
}


//завдання 3
let d = Number(prompt('введіть перше число'));
let f = Number(prompt('введіть перше число'));
let g = Number(prompt('введіть перше число'));

let max = Math.max(d, f, g);
let min = Math.max(d, f, g);
console.log('найбільше число: ', max);
console.log('найменше число: ', min);

let check = (d % 2 === 0 || f % 2 === 0 || g % 2 === 0);
console.log('хоча б одне парне число: ', check);

let difficultCondition = (d > f) && (f < g);
console.log('складна умова: ', difficultCondition);

let number = Number(prompt('введіть число для перевірки на просте'));
let prime = true;

if (number <= 1) {
    prime = false;
}
else {
    for (let i = 2; i < number; i++) {
        if (number % i === 0) {
            prime = false;
            break;
        }
    }
}
console.log('число просте: ', prime);


//завдання 4
let name = String(prompt('введіть своє ім`я: '));
let year = String(prompt('введіть рік народження: '));
let city = String(prompt('введіть місто в якому проживаєте: '));
let age = (2026 - year);
let capital = 'Київ';

console.log('ваш вік: ', age);
console.log('ваше ім`я: ', name);
console.log('місто: ', city);

if (age < 12) {
    console.log('вікова група: дидина');
}
else if (age < 18) {
    console.log('вікова група: підліток');
}
else if (age < 60) {
    console.log('вікова група: дорослий');
}
else {
    console.log('вікова група: літня людина');
}

if (city.toLowerCase() === capital.toLocaleLowerCase()) {
    console.log('ви живете у столиці України');
}
else {
    console.log('ваше місто не є столицею України');
}
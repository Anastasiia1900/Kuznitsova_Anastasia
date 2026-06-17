//завдання1
for (let i = 1; i <= 100; i++) {
    if (i % 3 === 0 && i % 5 === 0) {
        console.log('FizzBuzz');
    }
    else if ( i % 3 === 0) {
        console.log('Fizz');
    }
    else if ( i % 5 === 0) {
        console.log('Buzz');
    }
    else {
        console.log(i);
    }
}


//завдання3
let n = Number(prompt('введіть число для таблиці множення'));

for (let i = 1; i <= 10; i++) {
    console.log(`${n} * ${i} = ${n * i}`);
}


//завдання4
function factorial(n) {
    if (n === 0) return 1;

    let result = 1;
    for (let i = 1; i <= n; i++) {
        result *= i;
    }
    return result;
}
let number = Number(prompt('введіть число для обчислення факторфалу'));
console.log(`${number}! = ${factorial(number)}`);


//завдання5
function findMinMax(arr) {
    let max = arr[0];
    let min = arr[0];

    for (let num of arr) {
        if (num > max) {
            max = num;
        }
        if (num < min) {
            min = num;
        }
    }
    return {
        max: max,
        min: min
    };
}

let numbers = [5, 2, 9, 1, 7];
let result = findMinMax(numbers);
console.log(result);
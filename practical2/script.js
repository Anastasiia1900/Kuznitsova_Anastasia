//завдання 1
let age = Number(prompt('будь ласка, введіть ваш вік:'));

while (isNaN(age)) {
    age = Number(prompt('будь ласка, введіть ваш вік:'));
}

if (age < 18) {
    alert('вам заборонено вхід');
} else if (age <= 65) {
    alert('ласкаво просимо');
} else {
    alert('будьте обережні');
}

//завдання2
let n = Number(prompt('Введіть число:'));

for (let i = 2; i <= n; i++) {
    if (i % 2 === 0) {
        console.log(i);
    }
}

//завдання3
let v = Number(prompt('Введіть число:'));
let result = 1;
let i = 1;

while (i <= v) {
    result *= i;
    i++;
}

console.log('Факторіал числа:', result);


//завдання4
let a = Number(prompt('Введіть перше число:'));
let b = Number(prompt('Введіть друге число:'));
let operator = prompt('Введіть операцію (+, -, *, /):');

let resul;

switch (operator) {
    case '+':
        resul = a + b;
        break;
    case '-':
        resul = a - b;
        break;
    case '*':
        resul = a * b;
        break;
    case '/':
        resul = a / b;
        break;
    default:
        resul = 'Невідома операція';
}

alert('Результат: ' + resul);

//завдання5
let secret = Math.floor(Math.random() * 100) + 1;
let guess;

do {
    guess = Number(prompt('Вгадайте число від 1 до 100:'));

    if (guess < secret) {
        alert('Загадане число більше');
    } else if (guess > secret) {
        alert('Загадане число менше');
    } else {
        alert('Вітаємо! Ви вгадали число!');
    }

} while (guess !== secret);
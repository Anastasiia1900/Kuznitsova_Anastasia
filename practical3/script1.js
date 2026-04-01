let users = [
    { name: 'Олена', age: 25 },
    { name: 'Ігор', age: 17 },
    { name: 'Максим', age: 30 },
    { name: 'Анна', age: 15 },
    { name: 'Дмитро', age: 20 }
];

let adults = users.filter(user => user.age > 18);
let names = users.map(user => user.name);
let totalAge = users.reduce((sum, user) => sum + user.age, 0);
let averageAge = totalAge / users.length;

console.log('Всі користувачі:');
console.log(users);
console.log('Користувачі > 18 років:');
console.log(adults);
console.log('Імена користувачів:');
console.log(names);
console.log('Середній вік:');
console.log(averageAge);


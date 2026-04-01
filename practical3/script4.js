let names = ["Анна", "Олег", "Марія"];
let result = {};

for (let name of names) {
    result[name] = name.length;
}
console.log(result);
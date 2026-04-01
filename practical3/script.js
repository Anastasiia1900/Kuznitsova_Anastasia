let num = [ 5, 59, 3, 559, 22, 5678 ];

let sum = 0;
for (let i = 0; i < num.length; i++) {
    sum += num[i];
}
let average =sum / num.length;

let max = Math.max(...num);
let min = Math.min(...num);

let sortedNum = [...num].sort((a, b) => a -b);


console.log(num);
console.log(average);
console.log(max);
console.log(min);
console.log(sortedNum); 



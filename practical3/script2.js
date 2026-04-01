let goods = [
  { name: "яблука", type: "фрукти" },
  { name: "банани", type: "фрукти" },
  { name: "огірки", type: "овочі" }
];
let result = Object.groupBy(goods, ({type}) => type);

console.log(result);
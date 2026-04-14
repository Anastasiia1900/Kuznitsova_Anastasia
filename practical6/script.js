function getRandomNumber() {
    return new Promise((resolve) => {
        setTimeout(() => {
            let randomNumber = Math.floor(Math.random() * 100) + 1;
            resolve(randomNumber);
        }, 1000);
    });
}
async function processNumber() {
    try {
        let number = await getRandomNumber();
        if (number < 50) {
            let increased = await Promise.resolve(number + 20);
            return increased;
        } else {
            return await Promise.reject("Занадто велике число");}
    } catch (error) {
        return "Оброблено помилку";
    }
}
let button = document.getElementById("generateBtn");
let resultDiv = document.getElementById("result");
button.addEventListener("click", async () => {
    resultDiv.textContent = "Очікування...";
    let result = await processNumber();
    resultDiv.textContent = "Результат: " + result;
});
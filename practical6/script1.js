function fetchData(id) {
    return new Promise((resolve) => {
        const delay = Math.floor(Math.random() * 2000) + 1000;

        setTimeout(() => {
            resolve(`Дані для ID ${id} (затримка ${delay} мс)`);
        }, delay);
    });
}

async function processData() {
    try {
        console.log("Паралельне виконання");

        const parallelResults = await Promise.all([
            fetchData(1),
            fetchData(2),
            fetchData(3)
        ]);

        console.log("Результати (паралельно):");
        console.log(parallelResults);
        console.log("\nПослідовне виконання");

        const requests = [4, 5, 6].map(id => fetchData(id));

        for await (const result of requests) {
            console.log("Результат:", result);
        }
    } catch (error) {
        console.log("Помилка:", error);
    }
}

processData();
function fetchData(id) {
    return new Promise((resolve) => {
        let delay = Math.floor(Math.random() * 3000) + 1000;
        setTimeout(() => {
            resolve(`Дані для ID ${id} (затримка ${delay}ms)`);
        }, delay);
    });
}
async function processData() {
    let parallelDiv = document.getElementById("parallelResults");
    let sequentialDiv = document.getElementById("sequentialResults");
    parallelDiv.innerHTML = "Очікування...";
    sequentialDiv.innerHTML = "";
    let parallelResults = await Promise.all([
        fetchData(1),
        fetchData(2),
        fetchData(3)
    ]);
    parallelDiv.innerHTML = "";
    parallelResults.forEach(result => {
        let div = document.createElement("div");
        div.className = "result";
        div.textContent = result;
        parallelDiv.appendChild(div);
    });
    let ids = [4,5,6];
    for await (let result of ids.map(id => fetchData(id))) {
        let div = document.createElement("div");
        div.className = "result";
        div.textContent = result;
        sequentialDiv.appendChild(div);
    }
}
document.getElementById("runBtn").addEventListener("click", processData);
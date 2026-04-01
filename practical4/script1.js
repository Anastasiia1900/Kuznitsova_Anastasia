function addItem() {
    const input = document.getElementById("input");
    const value = input.value.trim();
    if (value === "") return;
    const li = document.createElement("li");
    li.textContent = value;
    li.onclick = function() {
        li.remove();
    };

    document.getElementById("list").appendChild(li);
    input.value = "";
}

function sortList() {
    const ul = document.getElementById("list");
    const items = Array.from(ul.children);
    items.sort((a, b) => 
        a.textContent.localeCompare(b.textContent)
    );

    ul.innerHTML = "";
    items.forEach(item => ul.appendChild(item));
}
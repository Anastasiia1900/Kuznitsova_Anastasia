const form = document.getElementById("taskForm");
const taskList = document.getElementById("taskList");

let tasks = JSON.parse(localStorage.getItem("tasks")) || [];
let currentFilter = "all";

// Збереження в localStorage
function saveTasks() {
  localStorage.setItem("tasks", JSON.stringify(tasks));
}

// Відображення задач
function renderTasks() {
  taskList.innerHTML = "";

  let filteredTasks = tasks.filter(task => {
    if (currentFilter === "active") return !task.completed;
    if (currentFilter === "completed") return task.completed;
    return true;
  });

  filteredTasks.forEach((task, index) => {
    const li = document.createElement("li");

    li.className = `${task.priority} ${task.completed ? "completed" : ""}`;

    li.innerHTML = `
      <strong>${task.title}</strong> <br>
      Дедлайн: ${task.deadline} <br>
      Пріоритет: ${task.priority} <br>
      
      <button onclick="toggleComplete(${index})">✔</button>
      <button onclick="deleteTask(${index})">❌</button>
      <button onclick="editTask(${index})">✏️</button>
    `;

    taskList.appendChild(li);
  });
}

// Додавання задачі
form.addEventListener("submit", function(e) {
  e.preventDefault();

  const newTask = {
    title: document.getElementById("title").value,
    deadline: document.getElementById("deadline").value,
    priority: document.getElementById("priority").value,
    completed: false
  };

  tasks.push(newTask);
  saveTasks();
  renderTasks();
  form.reset();
});

// Видалення
function deleteTask(index) {
  tasks.splice(index, 1);
  saveTasks();
  renderTasks();
}

// Виконано / не виконано
function toggleComplete(index) {
  tasks[index].completed = !tasks[index].completed;
  saveTasks();
  renderTasks();
}

// Редагування
function editTask(index) {
  const task = tasks[index];

  document.getElementById("title").value = task.title;
  document.getElementById("deadline").value = task.deadline;
  document.getElementById("priority").value = task.priority;

  deleteTask(index);
}

// Фільтр
function filterTasks(filter) {
  currentFilter = filter;
  renderTasks();
}

// Сортування за дедлайном
function sortByDeadline() {
  tasks.sort((a, b) => new Date(a.deadline) - new Date(b.deadline));
  renderTasks();
}

// Сортування за пріоритетом
function sortByPriority() {
  const order = { high: 1, medium: 2, low: 3 };
  tasks.sort((a, b) => order[a.priority] - order[b.priority]);
  renderTasks();
}

// Початкове завантаження
renderTasks();
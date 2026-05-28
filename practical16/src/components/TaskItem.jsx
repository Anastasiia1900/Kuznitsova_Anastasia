function TaskItem({ task, toggleTask, deleteTask }) {
  return (
    <div
      style={{
        marginTop: "10px",
        padding: "10px",
        border: "1px solid gray",
      }}
    >
      <span
        style={{
          textDecoration: task.completed
            ? "line-through"
            : "none",
        }}
      >
        {task.title}
      </span>

      <button
        onClick={() => toggleTask(task.id)}
        style={{ marginLeft: "10px" }}
      >
        Виконано
      </button>

      <button
        onClick={() => deleteTask(task.id)}
        style={{ marginLeft: "10px" }}
      >
        Видалити
      </button>
    </div>
  );
}

export default TaskItem;
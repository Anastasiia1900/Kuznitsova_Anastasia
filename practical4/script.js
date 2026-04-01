let time = 0;
let interval = null;

function updateDisplay() {
    document.getElementById("timer").innerText = time;
}

function startTimer() {
    if (interval) return;

    let input = document.getElementById("secondsInput").value;
    if (time === 0 && input > 0) {
        time = Number(input);
    }

    interval = setInterval(() => {
        if (time > 0) {
            time--;
            updateDisplay();
        } else {
            clearInterval(interval);
            interval = null;
            document.getElementById("message").innerText = "Час вийшов!";
        }
    }, 1000);
}

function pauseTimer() {
    clearInterval(interval);
    interval = null;
}
function addTime() {
    time += 10;
    updateDisplay();
}
function minusTime() {
    if (time >= 10) {
        time -= 10;
    } else {
        time = 0;
    }
    updateDisplay();
}
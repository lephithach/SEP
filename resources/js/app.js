require("./bootstrap");

// Active Menu bar
const menuBarList = document.querySelectorAll(".menu-bar__list");

menuBarList.forEach((menuItem) => {
    menuItem.onclick = () => {
        let menuSub = menuItem.querySelector(".menu-sub");
        menuSub.classList.toggle("show");
    };
});

// Button reset form search
const btnReset = document.querySelector("table button[type='reset']");
const inputListForm = document.querySelectorAll("table input");

// Check null element
if (btnReset != null) {
    btnReset.onclick = (e) => {
        e.preventDefault();

        inputListForm.forEach((input) => {
            // Set input value null
            input.value = "";
        });
    };
}

// Date
const clockElement = document.querySelector(".clock .clock-number");

function fixNumber(number) {
    if (number < 10) {
        return `0${number}`;
    }

    return number;
}

function getTime() {
    const date = new Date();
    let hour = fixNumber(date.getHours());
    let minutes = fixNumber(date.getMinutes());
    let seconds = fixNumber(date.getSeconds());

    return `${hour}:${minutes}:${seconds}`;
}

setInterval((e) => {
    clockElement.innerText = getTime();
}, 1000);

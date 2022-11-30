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
const btnReset = document.querySelector("#form-search #f-reset");
const inputListForm = document.querySelectorAll("#form-search input");

btnReset.onclick = (e) => {
    e.preventDefault();
    console.log(inputListForm);
};

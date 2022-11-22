require("./bootstrap");

// Active Menu bar
const menuBarList = document.querySelectorAll(".menu-bar__list");

menuBarList.forEach((menuItem) => {
    menuItem.onclick = () => {
        let menuSub = menuItem.querySelector(".menu-sub");
        menuSub.classList.toggle("show");
    };
});

/*
document.addEventListener("DOMContentLoaded", () => {
    const menuToggle = document.querySelector(".menu-toggle");
    const menuContent = document.querySelector(".menu-content");

    menuToggle.addEventListener("click", () => {
        // Alterna la visibilidad del menú desplegable
        menuContent.style.display = 
            menuContent.style.display === "block" ? "none" : "block";
    });
});*/

document.addEventListener("DOMContentLoaded", () => {
    const menuBtn = document.getElementById("menu-btn");
    const closeBtn = document.getElementById("close-btn");
    const menuDrawer = document.getElementById("menu-drawer");
    const hamburgerMenu = document.querySelector(".hamburger-menu");

    // Abrir el menú
    menuBtn.addEventListener("click", () => {
        menuDrawer.classList.add("open");
        hamburgerMenu.classList.add("open"); // Cambia el ícono del menú
    });

    // Cerrar el menú
    closeBtn.addEventListener("click", () => {
        menuDrawer.classList.remove("open");
        hamburgerMenu.classList.remove("open"); // Vuelve a las tres líneas
    });
});



document.addEventListener('DOMContentLoaded', (event) => {
    document.body.classList.add("show-popup"); // Display the login form initially
});

const navbarMenu = document.querySelector(".navbar .links");
const hamburgerBtn = document.querySelector(".hamburger-btn");
const hideMenuBtn = navbarMenu.querySelector(".close-btn");
const formPopup = document.querySelector(".form-popup");
const hidePopupBtn = formPopup.querySelector(".close-btn");
const signupLoginLink = formPopup.querySelectorAll(".bottom-link a");

// Show mobile menu
hamburgerBtn.addEventListener("click", () => {
    navbarMenu.classList.toggle("show-menu");
});

// Hide mobile menu
hideMenuBtn.addEventListener("click", () =>  hamburgerBtn.click());

// Show or hide signup/login form
signupLoginLink.forEach(link => {
    link.addEventListener("click", (e) => {
        e.preventDefault();
        if(link.id === 'signup-link') {
            formPopup.classList.add("show-signup");
        } else {
            formPopup.classList.remove("show-signup");
        }
    });
});

// Close the popup
hidePopupBtn.addEventListener("click", () => {
    document.body.classList.remove("show-popup");
});

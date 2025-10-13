const loginTab    = document.getElementById("login-tab");
const registerTab = document.getElementById("register-tab");
const slider      = document.querySelector(".forms-slider");

loginTab.addEventListener("click", () => {
    slider.style.transform = "translateX(0)";
    loginTab.classList.add("active");
    registerTab.classList.remove("active");
});

registerTab.addEventListener("click", () => {
    slider.style.transform = "translateX(-50%)";
    registerTab.classList.add("active");
    loginTab.classList.remove("active");
});



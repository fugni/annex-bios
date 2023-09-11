const hamburger = document.getElementById("hamburger");
const hamburgerNav = document.getElementById("hamburger-nav");
hamburgerNav.style.display = "none";

hamburger.addEventListener("click", () => {
    if (hamburgerNav.style.display == "none") {
        hamburgerNav.style.display = "flex";
    } else {
        hamburgerNav.style.display = "none";  
    }
})
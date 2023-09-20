<div id="header">
    <div id="header-top">
        <a id="header-logo-container" href="./">
            <img id="header-logo" src="assets/img/logo.png" alt="AnnexBios Bilthoven logo">
        </a>
        <div id="navbar">
            <nav>
                <a href="./#filmagenda">FILM AGENDA</a>
                <a href="#">ALLE VESTIGINGEN</a>
                <a href="#">CONTACT</a>
            </nav>
        </div>
        <div id="hamburger">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" id="hamburger-icon">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
            </svg>
        </div>
    </div>
    <div id="hamburger-nav">
        <nav>
            <a href="./#filmagenda">FILM AGENDA</a>
            <a href="#">ALLE VESTIGINGEN</a>
            <a href="#">CONTACT</a>
        </nav>
    </div>  
    <div id="header-movie-select">
        <div id="select-container">
            <span>KOOP JE TICKETS</span>
            <select id="header-select">
                <option selected>Kies je film</option>
                <option>film 1</option>
                <option>film 2</option>
                <option>film 3</option>
            </select>
            <a href="#">Bestel Tickets</a>
        </div>
    </div>
    <script>
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
    </script>
</div>
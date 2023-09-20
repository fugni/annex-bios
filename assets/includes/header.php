<?php
    // api call for movie selector

    include "assets/includes/apikey.php";

    $ch = curl_init();
    $url = 'https://api.pulllee.com';

    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

    curl_setopt($ch, CURLOPT_URL, $url);

    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: ".$apikey,
        'request: {"type": "now_playing"}'
    ]);

    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo "Error:" . curl_error($ch);
        curl_close($ch);
        exit();
    }

    curl_close($ch);

    $response = curl_exec($ch);

    $response = json_decode($response);

?>

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
            <form action="filmpagina.php" method="get">
                <select id="header-select" name="id">
                    <option value="chooseone">Kies je film</option>
                    <option value="<?php echo $response->results[0]->movie_id ?>"><?php echo $response->results[0]->movie_name ?></option>
                    <option value="<?php echo $response->results[1]->movie_id ?>"><?php echo $response->results[1]->movie_name ?></option>
                    <option value="<?php echo $response->results[2]->movie_id ?>"><?php echo $response->results[2]->movie_name ?></option>
                    <option value="<?php echo $response->results[3]->movie_id ?>"><?php echo $response->results[3]->movie_name ?></option>
                    <option value="<?php echo $response->results[4]->movie_id ?>"><?php echo $response->results[4]->movie_name ?></option>
                </select>
                <input type="submit" value="Bestel Tickets">
            </form>
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
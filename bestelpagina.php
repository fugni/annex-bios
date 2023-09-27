<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bestel je Tickets</title>
    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/filmagenda.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    <link rel="stylesheet" href="assets/css/bestelpagina.css">


</head>

<body>
    <script src="assets/js/seats.js"></script>
    <?php include "assets/includes/header.php" ?>

    <?php
        include "assets/includes/apikey.php";
        include "assets/includes/ratingarray.php";

        if (($_GET["id"]) == "chooseone") {
            echo "<div style=\"font-size: 100px; margin-left: 20px\">Kies eerst een film...</div>";
            exit();
        }

        // Movie api call
        $ch = curl_init();
        $url = 'https://api.pulllee.com';

        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: ".$apikey,
            'request: {"type": "movie", "id":'.$_GET["id"].'}'
        ]);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $responsemovie = curl_exec($ch);

        if (curl_errno($ch)) {
            echo "Error:" . curl_error($ch);
            curl_close($ch);
            exit();
        }

        curl_close($ch);

        $responsemovie = curl_exec($ch);

        $responsemovie = json_decode($responsemovie); 

    ?>

    <div id="titlecard">
        <div id="title">
            <h3>TICKETS BESTELLEN</h3>
        </div>
    </div>

    <div class="dropdown">
        <div id="selectedmovie">
            <p><?php echo $responsemovie->movie_name ?></p>
        </div>
        <div id="selectdate">
            <label for="date"></label>
            <select id="date">
                <option value="Date">Date</option>
            </select>
        </div>
        <div id="selecttime">
            <label for="time"></label>
            <select id="time">
                <option value="time">Time</option>
            </select>
        </div>
    </div>

    <div id="information-and-film">
        <div class="information">
            <div id="step1">
                <h2>STAP 1: KIES JE TICKETS</h2>
                <div id="top">
                    <p id="type">TYPE</p>
                    <p id="prijs">PRIJS</p>
                    <p id="aantal">AANTAL</p>
                    <hr>
                </div>
                <div id="leeftijden">
                    <div id="normaal">
                        <p class="age">Volwassenen/Tieners</p>
                        <p class="price">€9,00</p>
                        <label for="adult-ticket"></label>
                        <select onchange="calculateTickets();" id="adult-ticket">
                            <option value="0">0</optio>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                            <option value="11">11</option>
                        </select>
                    </div>

                    <p class="age">Kind t/m 11 jaar</p>
                    <p class="price">€5,00</p>
                    <label for="child-ticket"></label>
                    <select onchange="calculateTickets();" id="child-ticket">
                        <option value="0">0</optio>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                    </select>
                    <p class="age">65+</p>
                    <p class="price">€7,00</p>
                    <label for="elder-ticket"></label>
                    <select onchange="calculateTickets();" id="elder-ticket">
                        <option value="0">0</optio>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                    </select>
                    <hr>
                    <div id="vouchercode">
                        <h4>VOUCHERCODE:</h4>
                        <input type="text" name="code" placeholder="Code...">
                        <button id="codebutton">Toevoegen</button>
                    </div>
                </div>
            </div>
            <div id="step2">
                <h2> STAP 2: KIES JE STOEL</h2>

                <div id="filmdoek">FILMDOEK</div>
                <div id="seats">
                    <script>createSeats(110)</script>
                </div>
                <div id="legenda">
                    <div id="vrij">VRIJ</div>
                    <div id="bezet">BEZET</div>
                    <div id="selectie">JOUW SELECTIE</div>
                </div>
            </div>
            <div id="step3">
                <h2>STAP 3: CONTROLEER JE BESTELLING</h2>
                <div id="step3-movie">
                    <div id="step3-movie-poster">
                        <img src="<?php echo $responsemovie->poster ?>" alt="">
                    </div>
                    <div id="step3-movie-info">
                        <div id="step3-movie-title"><?php echo $responsemovie->movie_name ?></div>
                        <div id="step3-movie-rating"><?php echo $ratings[$responsemovie->rating] ?></div>
                    </div>
                </div>
            </div>
            <div id="step4">
                <h2>STAP 4: VUL JE GEGEVENS IN</h2>
                <div id="form">
                    <input type="text" class="name" name="vnaam" placeholder="Voornaam" required>
                    <input type="text" class="name" name="anaam" placeholder="Achternaam" required><br>
                    <input type="text" class="email" name="email" placeholder="E-mailadres*" required><br>
                    <input type="text" class="email" name="email" placeholder="E-mailadres*" required>
                </div>
            </div>

            <div id="step5">
                <h2>STAP 5: KIES JE BETAALWIJZE</h2>

                <div id="banken">
                    <input type="radio" class="radio" name="bankradio" id="bank1">
                    <label for="bank1"><img src="assets/img/bioscoopbon.png"></label>
                    <input type="radio" class="radio" name="bankradio" id="bank2">
                    <label for="bank2"><img src="assets/img/maestro.png"></label>
                    <input type="radio" class="radio" name="bankradio" id="bank3">
                    <label for="bank3"><img src="assets/img/ideal.png"></label><br>
                    <div id="av">
                        <input type="checkbox" id="algemenevoorwaarden" name="check">
                        <label for="algemenevoorwaarden" required>Ja, ik ga akkoord met de <u>algemene voorwaarden</u></label>
                    </div>
                </div>
            </div>
        </div>
        <div class="film">
            <div class="film-poster">
                <img src="<?php echo $responsemovie->poster ?>" alt="">
            </div>
            <div class="film-info">
                <div class="film-title"><?php echo $responsemovie->movie_name ?></div>
                <div class="film-rating"><?php echo $ratings[round($responsemovie->rating)] ?></div>
                <div class="film-release">Release: <?php echo $responsemovie->movie_date ?></div>
                <div class="film-description">
                    <span><?php echo $responsemovie->small_description ?></span>
                </div>
            </div>
        </div>
    </div>

        <h2>AFREKENEN</h2>
    </div>

    <?php include "assets/includes/footer.html" ?>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bestel je Tickets</title>
    <link rel="stylesheet" href="../css/bestelpagina.css">
</head>

<body>
    <div id="titlecard">
        <div id="title">
            <h3>TICKETS BESTELLEN</h3>
        </div>
    </div>

    <div class="dropdown">
        <div id="selectedmovie">
            <p>Movie</p>
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
                    <label for="nummer"></label>
                    <select id="nummer">
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
                <label for="nummer"></label>
                <select id="nummer">
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
                <label for="nummer"></label>
                <select id="nummer">
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
            <div id="legenda">
                <div id="vrij">VRIJ</div>
                <div id="bezet">BEZET</div>
                <div id="selectie">JOUW SELECTIE</div>
            </div>
        </div>
        <div id="step3">
            <h2>STAP 3: CONTROLEER JE BESTELLING</h2>
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
                <label for="bank1"><img src="../img/bioscoopbon.png"></label>
                <input type="radio" class="radio" name="bankradio" id="bank2">
                <label for="bank2"><img src="../img/maestro.png"></label>
                <input type="radio" class="radio" name="bankradio" id="bank3">
                <label for="bank3"><img src="../img/ideal.png"></label><br>
                <div id="av">
                    <input type="checkbox" id="algemenevoorwaarden" name="check">
                    <label for="check" required>Ja, ik ga akkoord met de <u>algemene voorwaarden</u></label>
                </div>
            </div>
        </div>
    </div>
    <div id="afrekenen">
        <h2>AFREKENEN</h2>
    </div>


</body>

</html>
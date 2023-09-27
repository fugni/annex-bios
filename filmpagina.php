<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>AnnexBios Bilthoven</title>

    <link rel="shortcut icon" href="assets/img/favicon.png" type="image/x-icon">

    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/filmpagina.css">
    <link rel="stylesheet" href="assets/css/footer.css">
    
</head>
<body>
    <?php include "assets/includes/header.php";?>

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

        // Cast api call
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_URL, $url);

        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            "Authorization: ".$apikey,
            'request: {"type": "cast", "id":'.$_GET["id"].'}'
        ]);

        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        if (curl_errno($ch)) {
            echo "Error:" . curl_error($ch);
            curl_close($ch);
            exit();
        }

        curl_close($ch);

        $responsecast = curl_exec($ch);

        $responsecast = json_decode($responsecast);
    ?>

    <div id="body">
        <div id="body-top">
            <div id="filmpagina-title"><?php echo $responsemovie->movie_name ?></div>
            <div id="filmpagina-info">
                <div id="filmpagina-poster"><img src="<?php echo $responsemovie->poster ?>" alt=""></div>
                <div id="filmpagina-txt">
                    <div id="filmpagina-rating"><?php echo $ratings[round($responsemovie->rating)]; ?></div>
                    <div id="filmpagina-release-date"><span>Release: <?php echo $responsemovie->movie_date ?></span></div>
                    <div id="filmpagina-description"><span><?php echo $responsemovie->big_description ?></span></div>
                    <div id="filmpagina-more-info">
                        <span><b>Genres: </b>
                            <?php for ($i=0; $i < count($responsemovie->genres); $i++) { 
                                if ($i == count($responsemovie->genres)-1) {
                                    echo $responsemovie->genres[$i];
                                } else {
                                    echo $responsemovie->genres[$i]. ", ";
                                }
                            } ?>
                        </span>
                        <span><b>Filmlengte: </b><?php echo $responsemovie->runtime ?> minuten</span>
                        <span><b>Land: </b><?php echo $responsemovie->country_of_origin ?></span>
                        <span><b>Rating: </b><?php echo $responsemovie->rating ?></span>
                    </div>
                    
                    <div id="filmpagina-cast-title"><span><b>Acteurs: </b></span></div>
                    <div id="filmpagina-cast">

                        <?php
                            for ($i=0; $i < 4; $i++) { 
                                echo "<div class=\"filmpagina-cast-member\">";
                                    echo "<div class=\"filmpagina-cast-member-img\">";
                                        echo "<img src=".$responsecast->cast[$i]->profile_picture." alt=\"\">";
                                    echo "</div>";
                                    echo "<div class=\"filmpagina-cast-member-name\">";
                                        echo "<span>".$responsecast->cast[$i]->name."</span>";
                                    echo "</div>";
                                    echo "<div class=\"filmpagina-cast-member-role\">";
                                        echo "<span><b>".$responsecast->cast[$i]->character."</b></span>";
                                    echo "</div>";
                                echo "</div>";
                            }
                        ?>
                    </div>
                </div>
            </div>
            <div id="filmpagina-bestel-button"><a href="bestelpagina.php?id=<?php echo $_GET["id"] ?>"><span>KOOP JE TICKETS</span></a></div>
        </div>
    </div>

    <?php include "assets/includes/footer.html";?>
</body>
</html>
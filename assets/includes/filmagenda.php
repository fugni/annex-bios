<div id="filmagenda-container">
    <div id="filmagenda">
        <div id="filmagenda-header">
            <div id="filmagenda-header-txt">
                <span>FILM AGENDA</span>
            </div>
            <div id="filmagenda-header-selectors">
                <div id="filmagenda-header-selector-icon">
                    <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><style>svg{fill:#ffffff}</style><path d="M0 416c0 17.7 14.3 32 32 32l54.7 0c12.3 28.3 40.5 48 73.3 48s61-19.7 73.3-48L480 448c17.7 0 32-14.3 32-32s-14.3-32-32-32l-246.7 0c-12.3-28.3-40.5-48-73.3-48s-61 19.7-73.3 48L32 384c-17.7 0-32 14.3-32 32zm128 0a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zM320 256a32 32 0 1 1 64 0 32 32 0 1 1 -64 0zm32-80c-32.8 0-61 19.7-73.3 48L32 224c-17.7 0-32 14.3-32 32s14.3 32 32 32l246.7 0c12.3 28.3 40.5 48 73.3 48s61-19.7 73.3-48l54.7 0c17.7 0 32-14.3 32-32s-14.3-32-32-32l-54.7 0c-12.3-28.3-40.5-48-73.3-48zM192 128a32 32 0 1 1 0-64 32 32 0 1 1 0 64zm73.3-64C253 35.7 224.8 16 192 16s-61 19.7-73.3 48L32 64C14.3 64 0 78.3 0 96s14.3 32 32 32l86.7 0c12.3 28.3 40.5 48 73.3 48s61-19.7 73.3-48L480 128c17.7 0 32-14.3 32-32s-14.3-32-32-32L265.3 64z"/></svg>
                </div>
                <label for="films"><div class="filmagenda-header-selector"><input type="radio" name="filmagenda-selector" id="films">FILMS</div></label>
                <label for="deze-week"><div class="filmagenda-header-selector"><input type="radio" name="filmagenda-selector" id="deze-week">DEZE WEEK</div></label>
                <label for="vandaag"><div class="filmagenda-header-selector"><input type="radio" name="filmagenda-selector" id="vandaag">VANDAAG</div></label>
                <label for="categorie-select" id="filmagenda-header-categorie-label">
                    <div id="filmagenda-header-categorie-select">
                        <input type="radio" name="filmagenda-selector" id="categorie-select">
                        <select name="categorie-select">
                            <option value="categorie" selected>CATEGORIE</option>
                            <option value="">i</option>
                            <option value="">dont</option>
                            <option value="">know</option>
                            <option value="">what</option>
                            <option value="">to</option>
                            <option value="">put</option>
                            <option value="">here</option>
                        </select>
                    </div>
                </label>
            </div>
        </div>
        <div id="filmagenda-gallery">

            <?php 

                include "assets/includes/ratingarray.php";
                include "assets/includes/apikey.php";

                $ch = curl_init();
                $url = 'https://api.pulllee.com';

                curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);

                curl_setopt($ch, CURLOPT_URL, $url);

                curl_setopt($ch, CURLOPT_HTTPHEADER, [
                    "Authorization: ".$apikey,
                    'request: {"type": "showing", "location": "Bilthoven"}'
                ]);

                curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

                $response = curl_exec($ch);

                if (curl_errno($ch)) {
                    echo "Error:" . curl_error($ch);
                    curl_close($ch);
                    exit();
                }

                curl_close($ch);

                $responseshowing = json_decode($response);

                for ($i=0; $i < count($responseshowing); $i++) { 
                    $filmid = $responseshowing[$i]->movie_id;

                    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0); 
                    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    
                    curl_setopt($ch, CURLOPT_URL, $url);
    
                    curl_setopt($ch, CURLOPT_HTTPHEADER, [
                        "Authorization: ".$apikey,
                        'request: {"type": "movie", "id": '.$filmid.'}'
                    ]);
    
                    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    
                    $responsefilm = curl_exec($ch);
    
                    curl_close($ch);
    
                    $film = json_decode($responsefilm);
    
                    echo "<div class=\"film\">";
                        echo "<div class=\"film-poster\">";
                            echo "<img src=".$film->poster." alt=\"\">";
                        echo "</div>";
                        echo "<div class=\"film-info\">";
                            echo "<div class=\"film-title\">";
                                echo "<span>".$film->movie_name."</span>";
                            echo "</div>";
                            echo "<div class=\"film-rating\">";
                                echo $ratings[round($film->rating/2)-1];
                            echo "</div>";
                            echo "<div class=\"film-release\">";
                                echo "<span>Release: ".$film->movie_date."</span>";
                            echo "</div>";
                            echo "<div class=\"film-description\">";
                                echo "<span>".$film->small_description."</span>";
                            echo "</div>";
                            echo "<div class=\"film-time\">";
                                echo "<span>Showing: ".gmdate("H:i d-m-Y",strtotime($responseshowing[$i]->time))."</span>";
                            echo "</div>";
                            echo "<div class=\"film-zaal-3d\">";
                                echo "<div class=\"film-zaal\">";
                                    echo "<span>Zaal: ".($responseshowing[$i]->screen+1)."</span>";
                                echo "</div>";
                                echo "<div class=\"film-3d\">";
                                    echo "<span>";
                                        if ($responseshowing[$i]->{"3d"}) {
                                            echo "3D";
                                        };
                                    echo "</span>";
                                echo "</div>";
                            echo "</div>";
                            echo "<div class=\"film-more-info-button\">";
                                echo "<a href=filmpagina.php?id=".$film->movie_id.">MEER INFO & TICKETS</a>";
                            echo "</div>";
                        echo "</div>";
                    echo "</div>";
    
                }


            ?>
                
        </div>
    </div>
</div>
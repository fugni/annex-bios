<?php
        include "assets/includes/apikey.php";

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

        echo $responsemovie;
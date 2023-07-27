<?php

// CURL to get the color title

function getColorName($hex)
{
    // remove hash sign from hex
    $hex = str_replace('#', '', $hex);
    
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'https://www.thecolorapi.com/id?hex=' . $hex);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

    $data = curl_exec($curl);

    curl_close($curl);

    $data = json_decode($data, 1);

    return $data['name']['value'];
}
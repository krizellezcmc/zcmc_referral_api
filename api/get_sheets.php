<?php

    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: *");
    
    // $url = "http://gsx2json.com/api?id=1oDT5VTWSfpUsVqV_514_Okp2j5Z0A4XScFwxSsJK0Rg&sheet=data_api&columns=false";
    $url = "https://opensheet.elk.sh/1oDT5VTWSfpUsVqV_514_Okp2j5Z0A4XScFwxSsJK0Rg/data_api";

    $data = file_get_contents($url);
    $result = json_decode($data);

    echo json_encode($result);  
?>
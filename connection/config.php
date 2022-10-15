
<?php

    session_start();

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");
    header("Access-Control-Allow-Credentials: true");
    

    $db = mysqli_connect("localhost", "root","","zcmc_referral");
    // $db = mysqli_connect("localhost", "u769999889_zcmcreferral", "Zcmcref@2022","u769999889_zcmcreferral");

    if($db === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }


?>
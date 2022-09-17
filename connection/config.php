
<?php

    session_start();

    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: *");
    header("Access-Control-Allow-Credentials: true");

    $db = mysqli_connect("localhost", "u844317742_zcmc_referral", "Zcmc_referral123","u844317742_zcmc_referral");

    if($db === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }


?>

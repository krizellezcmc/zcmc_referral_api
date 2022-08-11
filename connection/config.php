<?php

    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: *");

    $db = mysqli_connect("192.168.3.135", "root", "root_password", "zcmc_referral");

    if($db === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
?>
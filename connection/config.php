<?php

    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: *");

    $db = mysqli_connect("localhost", "root", "", "zcmc_referral");

    if($db === false){
        die("ERROR: Could not connect. " . mysqli_connect_error());
    }
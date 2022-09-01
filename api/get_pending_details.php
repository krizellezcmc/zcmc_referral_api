<?php

include '../connection/config.php';

$method = $_SERVER['REQUEST_METHOD'];

    switch($method) {
        case 'GET':

        $id = $_GET['pid'];
        
        $getPatDetails = $db->prepare("SELECT * FROM temp_referral where patientId = ?");
        $getPatDetails->bind_param('s', $id);
        $getPatDetails->execute();   
        $resultPat = $getPatDetails->get_result();
        $resPat = $resultPat->fetch_all(MYSQLI_ASSOC);

        echo json_encode($resPat);
    }

?>
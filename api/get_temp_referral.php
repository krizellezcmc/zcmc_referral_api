<?php

include '../connection/config.php';
include '../functions/auth.php'; 

$method = $_SERVER['REQUEST_METHOD'];

    switch($method) {
        case 'GET':

        $id = $_GET['id'];
        
        $getPatDetails = $db->prepare("SELECT temp.*, b.*, r.*, r.status as statRoute FROM temp_referral temp LEFT JOIN bizbox_hospital b ON temp.currentHospital = b.PK_hospitalId LEFT JOIN routes r ON temp.patientId = r.patientId AND temp.currentHospital = r.referredTo WHERE temp.currentHospital = ? ORDER BY r.tstamp DESC");
        $getPatDetails->bind_param('i', $id);
        $getPatDetails->execute();
        $resultPat = $getPatDetails->get_result();
        $resPat = $resultPat->fetch_all(MYSQLI_ASSOC);

        if($access === true) {
            echo json_encode($resPat);    
        } else {
            echo "Unathorized";
        }
    }

?>
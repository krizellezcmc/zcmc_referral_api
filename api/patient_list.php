<?php

include '../connection/config.php';

$method = $_SERVER['REQUEST_METHOD'];

    switch($method) {
        case 'GET':

        // $hospital = $_GET['hospital'];
        $patientList = $db->prepare("SELECT PK_patientId as value, CONCAT(patientName, ' - ', referredDate) as label FROM patient");
        // $patientList->bind_param('s', );
        $patientList->execute();   
        $result = $patientList->get_result();
        $patient = $result->fetch_all(MYSQLI_ASSOC);

        echo json_encode($patient);
        
    }
?>
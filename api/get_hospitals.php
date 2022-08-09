<?php

include '../connection/config.php';

$method = $_SERVER['REQUEST_METHOD'];

    switch($method) {
        case 'GET':
        
        $getHospitals = $db->prepare("SELECT PK_hospitalId as value, name as label FROM hospitals");
        $getHospitals->execute();   
        $result = $getHospitals->get_result();
        $hospitals = $result->fetch_all(MYSQLI_ASSOC);

        echo json_encode($hospitals);
    }

?>
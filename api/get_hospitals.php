<?php

include '../connection/config.php';

$method = $_SERVER['REQUEST_METHOD'];

    switch($method) {
        case 'GET':
        
        $getHospitals = $db->prepare("SELECT PK_hospitalId as value, code, name as label FROM bizbox_hospital where PK_hospitalId != 0");
        $getHospitals->execute();   
        $result = $getHospitals->get_result();
        $hospitals = $result->fetch_all(MYSQLI_ASSOC);

        echo json_encode($hospitals);
    }

?>
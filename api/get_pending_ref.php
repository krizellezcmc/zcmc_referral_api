<?php

include '../connection/config.php';
include '../functions/auth.php'; 

$method = $_SERVER['REQUEST_METHOD'];

    switch($method) {
        case 'GET':

            $id = $_GET['id'];

            $stmt = $db->prepare("SELECT * from temp_referral WHERE patientId = ?");
            $stmt->bind_param('s', $id);
            $stmt->execute();
            $patientPending = $stmt->get_result()->fetch_array(MYSQLI_ASSOC);

            if($access === true) {
                echo json_encode($patientPending);    
            } else {
                echo "Unathorized";
            }
            break;
    }

?>
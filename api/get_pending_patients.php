<?php

include '../connection/config.php';
include '../functions/auth.php'; 

$method = $_SERVER['REQUEST_METHOD'];

    switch($method) {
        case 'GET':
            $stmt = $db->prepare("SELECT * from temp_referral WHERE status='pending' OR status='accepted'");
            $stmt->execute();
            $patientPending = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

            if($access === true) {
                echo json_encode($patientPending);    
            } else {
                echo "Unathorized";
            }
            break;
}

?>
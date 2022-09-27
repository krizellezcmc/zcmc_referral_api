<?php

include '../connection/config.php';
include '../functions/auth.php';

$method = $_SERVER['REQUEST_METHOD'];

switch($method) {
        case 'GET':
            $stmt = $db->prepare("SELECT CONCAT(lastname, ', ', firstname, ' (' , tstamp, ')') as label, patientId as value from temp_referral where status = 'pending'");
            $stmt->execute();
            $patients = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

            echo json_encode($patients);    
            break;
}

?>
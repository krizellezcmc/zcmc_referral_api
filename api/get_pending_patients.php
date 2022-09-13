<?php

include '../connection/config.php';

$method = $_SERVER['REQUEST_METHOD'];

    switch($method) {
        case 'GET':
            $stmt = $db->prepare("SELECT * from temp_referral WHERE status='pending' OR status='accepted'");
            $stmt->execute();
            $patientPending = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

            echo json_encode($patientPending);
            break;
}

?>
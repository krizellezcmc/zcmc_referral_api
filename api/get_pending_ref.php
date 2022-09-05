<?php

include '../connection/config.php';

$method = $_SERVER['REQUEST_METHOD'];

    switch($method) {
        case 'GET':

            $id = $_GET['id'];

            $stmt = $db->prepare("SELECT * from temp_referral WHERE patientId = ?");
            $stmt->bind_param('s', $id);
            $stmt->execute();
            $patientPending = $stmt->get_result()->fetch_array(MYSQLI_ASSOC);

            echo json_encode($patientPending);
            break;
    }

?>
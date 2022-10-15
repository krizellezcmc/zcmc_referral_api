<?php

include '../../connection/config.php';

$method = $_SERVER['REQUEST_METHOD'];

    switch($method) {
        case 'GET':
            $stmt = $db->prepare("SELECT COUNT(*) from temp_referral WHERE status = 'accepted'");
            $stmt->execute();
            $incoming = $stmt->get_result()->fetch_row();

            echo json_encode($incoming[0]);
            break;
}

?>
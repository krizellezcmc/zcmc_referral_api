<?php

include '../../connection/config.php';

$method = $_SERVER['REQUEST_METHOD'];

    switch($method) {
        case 'GET':
            $stmt = $db->prepare("SELECT COUNT(*) from temp_referral WHERE status = 'pending'");
            $stmt->execute();
            $pending = $stmt->get_result()->fetch_row();

            echo json_encode($pending[0]);
            break;
}

?>
<?php

include '../../connection/config.php';

$method = $_SERVER['REQUEST_METHOD'];

    switch($method) {
        case 'GET':
            $stmt = $db->prepare("SELECT COUNT(*) from temp_referral WHERE datetime_added = CURDATE()");
            $stmt->execute();
            $daily = $stmt->get_result()->fetch_row();

            echo json_encode($daily[0]);
            break;
}

?>
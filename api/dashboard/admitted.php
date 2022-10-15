<?php

include '../../connection/config.php';

$method = $_SERVER['REQUEST_METHOD'];

    switch($method) {
        case 'GET':
            $stmt = $db->prepare("SELECT COUNT(*) from patient WHERE dischDate = NULL OR dischDate = ''");
            $stmt->execute();
            $admitted = $stmt->get_result()->fetch_row();

            echo json_encode($admitted[0]);
            break;
    }

?>
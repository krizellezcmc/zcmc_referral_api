<?php

include '../connection/config.php';
include '../functions/send_mail.php';
include '../accept_body.php';

$method = $_SERVER['REQUEST_METHOD'];

    switch($method) {
        case 'POST':
            $patientRef = json_decode(file_get_contents('php://input'));
            $patId = $patientRef->patId;
            $routeId = $patientRef->routeId;

            
                $stmt = $db->prepare("UPDATE routes SET status = 'accepted', update_tstamp = CURRENT_TIMESTAMP() WHERE PK_routeId = ?");
                $stmt->bind_param("i", $routeId); 
                
                if($stmt->execute()){
                    $data = ['status' => 1, 'message' => "Success"];
                }else {
                    $data = ['status' => 0, 'message' => "Error."];
                }

            echo json_encode($data);
            break;
}

?>
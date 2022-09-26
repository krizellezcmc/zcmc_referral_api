<?php

include '../connection/config.php';

$method = $_SERVER['REQUEST_METHOD'];

    switch($method) {
        case 'POST':
            $details = json_decode(file_get_contents('php://input'));

            $patientId = $details->patientId;
            $user = $details->user;
            $remark = $details->remark;

            $stmt = $db->prepare("INSERT INTO remarks (patientId, remark, FK_userId) VALUES (?, ?, ?)");
            $stmt->bind_param("ssi", $patientId, $remark, $user);
            
            if($stmt->execute()){
                $data = ['status' => 1, 'message' => "Success"];
            } else {
                $data = ['status' => 0, 'message' => "Failed to post remark."];
            }
           
            echo json_encode($data);
            break;
}

?>
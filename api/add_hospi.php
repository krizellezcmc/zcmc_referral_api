<?php

include '../connection/config.php';

$method = $_SERVER['REQUEST_METHOD'];

    switch($method) {
        case 'POST':
            $hospital = json_decode(file_get_contents('php://input'));

            $hospiName = $hospital->hospiName;
            $code = $hospital->code;
            
            $getHospitals = $db->prepare("SELECT * FROM hospitals where code = ? OR name = ?");
            $getHospitals->bind_param("is", $code, $hospiName);
            $getHospitals->execute();   
            $result = $getHospitals->get_result();

            if(mysqli_num_rows($result) === 0) {
                $stmt = $db->prepare("INSERT INTO hospitals (code, name) VALUES (?,?) ");
                $stmt->bind_param("is", $code, $hospiName);
                
                if($stmt->execute()){
                    $data = ['status' => 1, 'message' => "Record successfully created"];
                } else {
                    $data = ['status' => 0, 'message' => "Failed to create record."];
                }
            } else {
                $data = ['status' => 3, 'message' => "Access code already exists."];
            }

            echo json_encode($data);
            break;
}

?>
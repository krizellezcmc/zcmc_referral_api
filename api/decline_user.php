<?php

include '../connection/config.php';
include '../functions/send_mail.php';
include '../decline_body.php';

$method = $_SERVER['REQUEST_METHOD'];

    switch($method) {
        case 'POST':
            $user = json_decode(file_get_contents('php://input'));
            $userId = $user->userId;


            $getEmail = $db->prepare("SELECT email, firstName FROM users where userId = ?");
            $getEmail->bind_param("i", $userId);
              
            if($getEmail->execute()) {
                
                $result = $getEmail->get_result();
                $res = $result->fetch_row();
                $email = $res[0];
                $name = $res[1];

                // UPDATE VALIDATION 
                $stmt = $db->prepare("UPDATE users set validated = 2 WHERE userId = ?");
                $stmt->bind_param("i", $userId);
                if($stmt->execute()){
                    sendmail($email, decline_body($name), "Registration Declined");
                    $data = ['status' => 1, 'message' => "Success"];
                }else {
                    $data = ['status' => 0, 'message' => "Error."];
                }

            } else {
                $data = ['status' => 0, 'message' => "Error."];
            }

            echo json_encode($data);
            break;
}

?>
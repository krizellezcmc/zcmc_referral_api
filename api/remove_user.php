<?php

include '../connection/config.php';
include '../functions/send_mail.php';
include '../decline_body.php';

$method = $_SERVER['REQUEST_METHOD'];

    switch($method) {
        case 'POST':
            $user = json_decode(file_get_contents('php://input'));
            $userId = $user->userId;

            $remove = $db->prepare("DELETE FROM users where userId = ?");
            $remove->bind_param("i", $userId);
              
            if($remove->execute()) { 
                $data = ['status' => 1, 'message' => "Success"];
            } else {
                $data = ['status' => 0, 'message' => "Error."];
            }

            echo json_encode($data);
            break;
}

?>
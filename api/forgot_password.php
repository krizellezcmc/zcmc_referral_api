<?php

include '../connection/config.php';

$method = $_SERVER['REQUEST_METHOD'];

    switch($method) {
        case 'POST':
            $req = json_decode(file_get_contents('php://input'));
            $userId = $req->id;
            $newPass = $req->password;

            // IF TAMA PASSWORD
            $hashed = password_hash($newPass, PASSWORD_DEFAULT);
            $update = $db->prepare("UPDATE users set password = ?, attempt = 0, validated = 1 WHERE userId = ?");
            $update->bind_param("si", $hashed, $userId);

            if($update->execute()) {
                
                $data = ['status' => 1, 'message' => "Success"];
            } else {
                $data = ['status' => 0, 'message' => "Error occured"];
            }
                        
        echo json_encode($data);
        break;
}

?>
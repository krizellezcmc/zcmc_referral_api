<?php

include '../connection/config.php';

$method = $_SERVER['REQUEST_METHOD'];

    switch($method) {
        case 'POST':
            $req = json_decode(file_get_contents('php://input'));
            $email  = $req->email;
            $userId = $req->userId;
            $old = $req->old;
            $newPass = $req->newPass;
            
            $stmt = $db->prepare("SELECT * FROM users WHERE userId = ? AND email = ?;");
            $stmt->bind_param("is", $userId, $email);
            $stmt->execute();
            $result = $stmt->get_result();
           
            if(mysqli_num_rows($result) > 0) {
                // $data = ['status' => 1, 'message' => "Record successfully created"];
                while ($user = mysqli_fetch_assoc($result)) {
                    if(password_verify($newPass, $user['password'])) {
                        $data = ['status' => 3, 'message' => "Do not use current password."];
                    } else {
                        if(password_verify($old, $user['password'])) {
                            // IF TAMA PASSWORD
                            $hashed = password_hash($newPass, PASSWORD_DEFAULT);
                            $update = $db->prepare("UPDATE users set password = ? WHERE userId = ?");
                            $update->bind_param("si", $hashed, $userId);

                            if($update->execute()) {
                                $data = ['status' => 1, 'message' => "Success"];
                            } else {
                                $data = ['status' => 2, 'message' => "Error occured"];
                            }
                        }else {
                            $data = ['status' => 0, 'message' => "Invalid password"];
                        }
                    }
                }
            } else {
                $data = ['status' => 0, 'message' => "Invalid password"];
            }
        echo json_encode($data);
        break;
}

?>
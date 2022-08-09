<?php

include '../connection/config.php';

$method = $_SERVER['REQUEST_METHOD'];

    switch($method) {
        case 'POST':
            $user = json_decode(file_get_contents('php://input'));
            $email = $user->email;
            $password = $user->password;
        
            $stmt = $db->prepare("SELECT * FROM users WHERE email = ?;");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
            
            if(mysqli_num_rows($result) > 0) {
                // $data = ['status' => 1, 'message' => "Record successfully created"];
                while ($user = mysqli_fetch_assoc($result)) {
                    if(password_verify( $password, $user['password'])) {
                        // IF TAMA PASSWORD
                        if($user['validated'] === 1){
                            $data = ['status' => 1, 'message' => "Success"];
                        } else {
                            $data = ['status' => 3, 'message' => "Request pending"];
                        }
                    }else {
                        $data = ['status' => 0, 'message' => "Invalid password"];
                    }
                }
            } else {
                $data = ['status' => 2, 'message' => "Email does not exist"];
            }
            echo json_encode($data);
            break;
}


?>
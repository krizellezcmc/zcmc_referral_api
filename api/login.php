<?php

include '../connection/config.php';

$method = $_SERVER['REQUEST_METHOD'];

    switch($method) {
        case 'POST':
            $user = json_decode(file_get_contents('php://input'));
            $email = $user->email;
            $password = $user->password;
        
            $stmt = $db->prepare("SELECT * FROM users u INNER JOIN bizbox_hospital h ON u.FK_hospitalId = h.PK_hospitalId WHERE email = ?;");
            $stmt->bind_param("s", $email);
            $stmt->execute();
            $result = $stmt->get_result();
           
            if(mysqli_num_rows($result) > 0) {
                // $data = ['status' => 1, 'message' => "Record successfully created"];
                while ($user = mysqli_fetch_assoc($result)) {
                    if(password_verify($password, $user['password'])) {
                        // IF TAMA PASSWORD
                        if($user['validated'] === 1){

                            $stmt = $db->prepare("UPDATE users SET validated = 1, attempt = 0 WHERE email = ?;");
                            $stmt->bind_param("s", $email);
                            $stmt->execute();
                            $data = ['status' => 1, 'loggedIn' => true, "user" => $user];

                        } else if($user['validated'] === 0) {
                            $data = ['status' => 3, 'message' => "Request pending"];
                        } else {
                            $data = ['status' => 5, 'message' => "User blocked!"];
                        }

                    }else {

                        if($user['attempt'] === 3) {    
                            
                            $data = ['status' => 5, 'message' => "User blocked!"];

                            $stmt = $db->prepare("UPDATE users SET validated = 3 WHERE email = ?;");
                            $stmt->bind_param("s", $email);
                            $stmt->execute();

                        } else {

                            $stmt = $db->prepare("UPDATE users SET attempt = attempt + 1 WHERE email = ?;");
                            $stmt->bind_param("s", $email);
                            $stmt->execute();

                            $data = ['status' => 0, 'message' => "Invalid password", 'logs' => $user['attempt']];
                        }
                  
                    }
                }
            } else {
                $data = ['status' => 2, 'message' => "Email does not exist"];
            }
            echo json_encode($data);
            break;
}


?>
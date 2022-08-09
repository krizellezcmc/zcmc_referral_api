<?php

include '../connection/config.php';

$method = $_SERVER['REQUEST_METHOD'];

    switch($method) {
        case 'POST':
            $user = json_decode(file_get_contents('php://input'));

            $firstName = $user->firstName;
            $lastName = $user->lastName;
            $contact = $user->contact;
            $email = $user->email;
            $hashed = password_hash($user->password, PASSWORD_DEFAULT);
            $hospitalCode = $user->hospitalCode;
            $accessCode = $user->accessCode;

            $stmt = $db->prepare("insert into users(firstName, lastName, contact, email, password, FK_hospitalId, accessCode) values (?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("sssssii", $firstName, $lastName, $contact, $email, $hashed, $hospitalCode, $accessCode);
            
            if($stmt->execute()) {
                $data = ['status' => 1, 'message' => "Record successfully created"];
            } else {
                $data = ['status' => 0, 'message' => "Failed to create record."];
            }
            echo json_encode($data);
            break;
}

?>
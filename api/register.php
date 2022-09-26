<?php

include '../connection/config.php';
include '../functions/send_mail.php';
include '../body.php';

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
        $department = $user->department;

        if($hospitalCode==1){
            $role="opcen";
        }else {
            $role="user";
        }


        // Check if email exist
        $checkEmail = $db->prepare("SELECT * FROM users WHERE email = ?;");
        $checkEmail->bind_param("s", $email);
        $checkEmail->execute();
        $res = $checkEmail->get_result();
        
        if (mysqli_num_rows($res) > 0) {

            $data = ['status' => 2, 'message' => "Email exist."];

        } else {
            

            $stmt = $db->prepare("insert into users(firstName, lastName, contact, email, password, role, FK_hospitalId, accessCode, department) values (?, ?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->bind_param("ssssssiis", $firstName, $lastName, $contact, $email, $hashed, $role,$hospitalCode, $accessCode, $department);
                
            if($stmt->execute()) {
                sendmail($email, body($firstName), "Account Registration");
                $data = ['status' => 1, 'message' => "Successful registration."];
            } else {
                $data = ['status' => 0, 'message' => "Registration failed."];
            }
        }
    
        echo json_encode($data);
        break;
}

?>
<?php
include '../connection/config.php';

$method = $_SERVER['REQUEST_METHOD'];

switch($method){
    case 'POST':

        $details = json_decode(file_get_contents('php://input'));

        $sql="UPDATE users SET validated = 1 WHERE userId=?";
        $stmt=$db->prepare($sql);

        $Id = $details->userId;


        $stmt->bind_param('i', $Id);

        if($stmt->execute()) {
            $data = ['status' => 1, 'message' => 'Record updated successfully.'];
        } else {
            $data = ['status' => 0, 'message' => 'Failed to update record.'];
        }
        echo json_encode($data);

        break;

    }

?>
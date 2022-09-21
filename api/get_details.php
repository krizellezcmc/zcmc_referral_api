<?php

include '../connection/config.php';
include '../functions/auth.php';

$method = $_SERVER['REQUEST_METHOD'];

    switch($method) {
        case 'GET':

        $id = $_GET['id'];
        
        $getDetails = $db->prepare("SELECT * FROM patient where PK_patientId = ?");
        $getDetails->bind_param('i', $id);
        $getDetails->execute();   
        $result = $getDetails->get_result();
        $res = $result->fetch_all(MYSQLI_ASSOC);
        
        if($access === true) {
            echo json_encode($res);    
        } else {
            echo "Unathorized";
        }
    }

?>
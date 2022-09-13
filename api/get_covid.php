<?php

include '../connection/config.php';

$method = $_SERVER['REQUEST_METHOD'];

    switch($method) {
        case 'GET':

        $id = $_GET['id'];
        
        $getDetails = $db->prepare("SELECT * FROM covid_status where patientId = ?");
        $getDetails->bind_param('s', $id);
        $getDetails->execute();   
        $result = $getDetails->get_result();
        $res = $result->fetch_array(MYSQLI_ASSOC);

        echo json_encode($res);
    }   

?>
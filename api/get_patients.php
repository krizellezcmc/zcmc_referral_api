<?php

include '../connection/config.php';
include '../functions/auth.php'; 

$method = $_SERVER['REQUEST_METHOD'];

    switch($method) {
        case 'GET':
            $stmt = $db->prepare("SELECT * from patient");
            $stmt->execute();
            $patients =$stmt->get_result()->fetch_all(MYSQLI_ASSOC);

            if($access === true) {
                echo json_encode($patients);    
            } else {
                echo "Unathorized";
            }

            break;
}

?>
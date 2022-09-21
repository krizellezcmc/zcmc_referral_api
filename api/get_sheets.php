<?php
include '../connection/config.php';
include '../functions/auth.php'; 

$method = $_SERVER['REQUEST_METHOD'];

switch($method){
    case 'GET':

        $sql = "SELECT * FROM temp_referral WHERE refFacility = ?";
        $stmt = $db->prepare($sql);
        $stmt->bind_param('s', $_GET['hospital']);
        $stmt->execute();

        $data = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        if($access === true) {
            echo json_encode($data);    
        } else {
            echo "Unathorized";
        }
        break;
}

?>
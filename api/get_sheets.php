<?php
include '../connection/config.php';

$method = $_SERVER['REQUEST_METHOD'];

switch($method){
    case 'GET':

        $sql = "SELECT * FROM temp_referral";

        $stmt = $db->prepare($sql);
        $stmt->execute();

        $data = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        echo json_encode($data);
        break;
}

?>
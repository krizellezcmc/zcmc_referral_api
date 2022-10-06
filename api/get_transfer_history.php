<?php
include '../connection/config.php';
// include '../functions/auth.php'; 

$method = $_SERVER['REQUEST_METHOD'];

switch($method){
    case 'GET':

        $patientId = $_GET['patientId'];

        // $sql = "SELECT r.*, b.name FROM routes r INNER JOIN bizbox_hospital b ON r.referredTo = b.PK_hospitalId ORDER BY r.tstamp DESC";

        $sql = "SELECT * FROM routes r LEFT JOIN bizbox_hospital b ON r.referredTo = b.PK_hospitalId WHERE r.patientId = ? ORDER BY r.tstamp DESC";
        // $path= explode('/', $_SERVER['REQUEST_URI']);
        $stmt = $db->prepare($sql);
        $stmt->bind_param('s', $patientId);
        $stmt->execute();

        $data = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        // }else{
        //     $stmt = $db->prepare($sql);
        //     $stmt->execute();
        //     $data = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        // }
        // if($access === true) {
        //     echo json_encode($data);    
        // } else {
        //     echo "Unathorized";
        // }
        // break;

        echo json_encode($data);
        break;
}
?>
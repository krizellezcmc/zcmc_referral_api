<?php
include '../connection/config.php';
// include '../functions/auth.php'; 

$method = $_SERVER['REQUEST_METHOD'];

switch($method){
    case 'GET':

        $sql = "SELECT * FROM remarks r INNER JOIN users u ON r.FK_userId = u.userId WHERE r.patientId = ? ORDER BY r.tstamp DESC";
        $path= explode('/', $_SERVER['REQUEST_URI']);
        $stmt = $db->prepare($sql);
        $stmt->bind_param('s',$path[4]);
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
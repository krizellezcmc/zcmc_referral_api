<?php
include '../connection/config.php';
include '../functions/auth.php'; 


$method = $_SERVER['REQUEST_METHOD'];

switch($method){
    case 'GET':


        $sql = "SELECT * FROM users INNER JOIN bizbox_hospital hospital  on users.FK_hospitalId = hospital.PK_hospitalId WHERE users.userId = ? ";

        $stmt = $db->prepare($sql);
        $stmt->bind_param('i', $_GET['Id']);
        $stmt->execute();

        $user = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

         if($access === true) {
            echo json_encode($user);    
        } else {
            echo "Unathorized";
        }
        break;
}

?>
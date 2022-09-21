<?php
include '../connection/config.php';
include '../functions/auth.php'; 

$method = $_SERVER['REQUEST_METHOD'];

switch($method){
    case 'GET':

        // $id=$_GET['id'];

        $sql = "SELECT PK_tagubilinId FROM tagubilin";

        $stmt = $db->prepare($sql);
        $stmt->execute();
        $data = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
  
        echo json_encode($data);
        break;
}

?>
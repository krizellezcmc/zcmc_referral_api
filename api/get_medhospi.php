<?php
include '../connection/config.php';

$method = $_SERVER['REQUEST_METHOD'];

switch($method){
    case 'GET':

        $id=$_GET['mid'];

        $sql = "SELECT * FROM medication WHERE medicationId=?";

        $stmt = $db->prepare($sql);
        $stmt->bind_param('i', $id);
        $stmt->execute();

        $data = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        echo json_encode($data);
        break;
}

?>
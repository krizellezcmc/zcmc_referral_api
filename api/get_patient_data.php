<?php
include '../connection/config.php';

$method = $_SERVER['REQUEST_METHOD'];

switch($method){
    case 'GET':

        $sql = "SELECT * FROM patient  WHERE patientName = ? AND referredDate = ? ";

        $stmt = $db->prepare($sql);
        $stmt->bind_param('ss', $_GET['patientName'], $_GET['referredDate']);
        $stmt->execute();

        $data = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        echo json_encode($data);
        break;
}

?>
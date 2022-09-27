<?php
include '../connection/config.php';

$method = $_SERVER['REQUEST_METHOD'];

switch($method){
    case 'GET':

        $sql = "SELECT * FROM remarks r INNER JOIN users u ON r.FK_userId = u.userId WHERE patientId = ? ORDER BY tstamp DESC";
        $stmt = $db->prepare($sql);
        $stmt->bind_param('s', $_GET['patientId']);
        $stmt->execute();

        $data = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        echo json_encode($data);
        break;
}
?>
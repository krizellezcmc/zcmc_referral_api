<?php
include '../connection/config.php';

$method = $_SERVER['REQUEST_METHOD'];

switch($method){
    case 'GET':


        $sql = "SELECT * FROM users INNER JOIN hospitals on users.FK_hospitalId = hospitals.PK_hospitalId WHERE users.userId = ? ";

        $stmt = $db->prepare($sql);
        $stmt->bind_param('i', $_GET['Id']);
        $stmt->execute();

        $user = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

        echo json_encode($user);
        break;
}

?>
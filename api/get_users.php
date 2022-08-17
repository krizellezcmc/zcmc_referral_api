<?php

include '../connection/config.php';

$method = $_SERVER['REQUEST_METHOD'];

    switch($method) {
        case 'GET':
            $stmt = $db->prepare("SELECT * from users INNER JOIN bizbox_hospital ON users.FK_hospitalId=bizbox_hospital.PK_hospitalId where users.validated=0 AND users.role='user'");
            $stmt->execute();
            $userVerify = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

            echo json_encode($userVerify);
            break;
}

?>
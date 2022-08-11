<?php

include '../connection/config.php';

$method = $_SERVER['REQUEST_METHOD'];

    switch($method) {
        case 'GET':
            $stmt = $db->prepare("SELECT * from users INNER JOIN hospitals ON users.FK_hospitalId=hospitals.PK_hospitalId WHERE users.validated=1 AND users.role='user'");
            $stmt->execute();
            $userDetails = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);

            echo json_encode($userDetails);
            break;
}

?>
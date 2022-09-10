<?php
include '../connection/config.php';

$method = $_SERVER['REQUEST_METHOD'];

switch($method){
    case 'GET':

        // $id=$_GET['id'];

        $sql = "SELECT * FROM tagubilin LEFT JOIN result ON tagubilin.FK_resultId=result.PK_resultId LEFT JOIN follow_up ON result.PK_resultId=follow_up.PK_followupId";
        $path= explode('/', $_SERVER['REQUEST_URI']);
        if(isset($path[3]) && is_numeric($path[3])) {
        $sql.="WHERE tagubilin.PK_tagubilinId=:id";

        $stmt = $db->prepare($sql);
        $stmt->bind_param(':id', $path[3]);
        $stmt->execute();
        $data = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        }else{
            $stmt = $db->prepare($sql);
            $stmt->execute();
            $data = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
        }

        echo json_encode($data);
        break;
}

?>
<?php

include '../../connection/config.php';

$method = $_SERVER['REQUEST_METHOD'];

    switch($method) {
        case 'GET':

            $type = array(array('type' => 'COVID'), array('type' => 'NON-COVID'), array('type' => 'COVID-SUSPECT'));
            $newData = array();
            // $stmt = $db->prepare("SELECT refType as name from temp_referral");
            // $stmt->execute();
            // $incoming = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
            foreach ($type as $key => $value) {
                $val = $value['type'];
                $stmt = $db->prepare("SELECT COUNT(*) as value from temp_referral WHERE refType = '$val' ");
                $stmt->execute();
                $incoming = $stmt->get_result()->fetch_row();

                array_push($newData, array('name' => $val, 'value' => $incoming[0]));
               
            }

            echo json_encode($newData);
          
            break;
}

?>
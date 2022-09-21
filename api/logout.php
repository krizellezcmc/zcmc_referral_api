<?php

session_start();
$method = $_SERVER['REQUEST_METHOD'];

switch($method) {
        case 'GET':

        session_destroy();

        echo json_encode('Logged out');
                
        break;
}

?>
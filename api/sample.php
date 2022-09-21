<?php
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Headers: *");

    echo $_SERVER['PHP_AUTH_USER'];
?>
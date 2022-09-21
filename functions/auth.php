<?php

    $session = getallheaders(); 

    if(isset($session['Authorization'])) {
       $access = true;
    } else {
        $access = false;
    }
    
?>
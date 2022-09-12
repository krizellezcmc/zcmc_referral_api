<?php  
    

    function add_medication($medicationId, $medicine, $dosage, $sched, $quantity) {
        include '../connection/config.php';

        $med = $db->prepare("INSERT INTO medication (medicationId, medicine, dosage, sched, quantity) VALUES (?, ?, ?, ?, ?)");
        $med->bind_param("isssi", $medicationId, $medicine, $dosage, $sched, $quantity);
        $med->execute();
    }

    function add_breastfeed($breastfeedId, $date, $fromTo, $yes, $reason, $management, $attended) {
        include '../connection/config.php';

        $bfeed = $db->prepare("INSERT INTO breastfeed (breastfeedId, `date`, fromTo, yes, reason, management, attended) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $bfeed->bind_param("issssss", $breastfeedId, $date, $fromTo, $yes, $reason, $management, $attended);
        $bfeed->execute();
    }

    function add_followup($followupId, $followupDate, $time, $needToBring, $nurse, $resident) {

        include '../connection/config.php';

        $follow = $db->prepare("INSERT INTO follow_up (PK_followupId, followupDate, `time`, needToBring, nurse, resident) VALUES (?, ?, ?, ?, ?, ?)");
        $follow->bind_param("isssss", $followupId, $followupDate, $time, $needToBring, $nurse, $resident);
        $follow->execute();
    }

    function add_result($PK_resultId, $laboratory, $xray, $ctScan, $mri, $others) {
        include '../connection/config.php';
        $result = $db->prepare("INSERT INTO result (PK_resultId, laboratory, xray, ctScan, mri, others) VALUES (?, ?, ?, ?, ?, ?)");
        $result->bind_param("isssss", $PK_resultId, $laboratory, $xray, $ctScan, $mri, $others);
        $result->execute();
    }

  




?>
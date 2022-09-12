<?php
 
include '../connection/config.php';
include '../functions/tagubilin.php';


$method = $_SERVER['REQUEST_METHOD'];

switch($method) {
    case 'POST':

        $details = json_decode(file_get_contents('php://input'));

        $patRegister = $details->patRegister;
        $patientName = $details->patientName;
        $age = $details->age;
        $sex = $details->sex;
        $ward = $details->ward;
        $hrn = $details->hrn;
        $address = $details->address; 
        $admissionDate = $details->admissionDate;
        $dischDiag = $details->dischDiag;
        $dischDate = $details->dischDate;                   
        $laboratory = $details->laboratory;
        $xray = $details->xray;
        $ctScan = $details->ctScan;    
        $mri = $details->mri;
        $others = $details->others;
        $homemed = $details->homemed;
        $nurse = $details->nurse;
        $resident = $details->resident;
        $followUp = $details->followUp;
        $needBring = $details->needBring;
        $time = $details->time;
        $health =  $details->diet;
        $healthOthers = $details->healthOthers;
        $medications = $details->medications;
        $diet = $details->diet;
        $othersDiet = $details->othersDiet;
        $instructions =  $details->instructions;
        $breastfeed = $details->breastfeed;
        $ob = $details->ob;

        $medId = uniqid($patRegister);
        $bfeedId = uniqid($patRegister);
        $followupId = uniqid($patRegister);
        $resultId = uniqid($patRegister);

        add_followup($followupId, $followUp, $time, $needBring, $nurse, $resident);
        add_result($resultId, $laboratory, $xray, $ctScan, $mri, $others);
     
        foreach($medications as $key => $value) {

            $medicine = $value->medicine;
            $dosage = $value->dosage;
            $sched = $value->sched;
            $qty = $value->quantity;

            add_medication($medId, $medicine, $dosage, $sched, $qty);
        }

        foreach($breastfeed as $key => $value) {
            
            $date = $value->date;
            $fromTo = $value->fromTo;
            $yes = $value->yes;
            $reason = $value->reason;
            $management = $value->management;
            $attended = $value->attended;

            add_breastfeed($bfeedId, $date, $fromTo, $yes, $reason, $management, $attended);
        }


        $stmt = $db->prepare("INSERT INTO tagubilin (PK_tagubilinId, patientName, age, sex, `address`, ward, hrn, admissionDate, dischDate, disch_diagnosis, operation, surgeon, operationDate, FK_resultId, FK_medicationId, FK_breastfeedId, health, healthOthers, instructions, FK_followId) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        
        $stmt->bind_param("isssssissssssiiisssi", $patRegister, $patientName, $age, $sex, $address, $ward, $hrn, $admissionDate, $dischDate, $dischDiag, $operation, $surgeon, $operationDate, $resultId, $medId, $bfeedId, $health, $healthOthers,  $instructions, $followupId);
        
        $updateTagubilin= $db->prepare('UPDATE patient set tagubilin = 1 WHERE FK_psPatRegisters = ?');
        $updateTagubilin->bind_param('i', $patRegister);
        

        if($stmt->execute()) {
            $updateTagubilin->execute();
            $data = ['status' => 1, 'message' => "success"];
        } else {
            $data = ['status' => 0, 'message' => "failed"];
        }

    echo json_encode($data);
    break; 

}

?>
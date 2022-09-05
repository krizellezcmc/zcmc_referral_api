<?php
 
include '../connection/config.php';

$method = $_SERVER['REQUEST_METHOD'];

 switch($method) {
    case 'POST':

        $details = json_decode(file_get_contents('php://input'));

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
        $healthOthers = $details->healthOthers;
        $medications = $details->medications;
        $diet = $details->diet;
        $othersDiet = $details->othersDiet;
        $instructions = $details->instructions;
        $breastfeed = $details->breastfeed;
        $ob = $details->ob;
        

    echo json_encode($medications);
    break; 
}

?>
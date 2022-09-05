<?php
 
include '../connection/config.php';

$method = $_SERVER['REQUEST_METHOD'];

    switch($method) {
        case 'POST':
            $data = json_decode(file_get_contents('php://input'));

         $timeStamp = $data->timeStamp;
          $patientId = $data->patientId;
          $username = $data->username;
          $refFacility = $data->referringFacility;
          $lastname = $data->lastname;
          $firstname = $data->firstname;
          $middlename = $data->middlename;
          $extendedName = $data->extendedName;
          $sex = $data->sex;
          $birthdate = $data->birthdate;
          $age = $data->age;
          $civilStatus = $data->civilStatus;
          $nationality = $data->nationality;
          $religion = $data->religion;
          $occupation = $data->occupation;
          $philhealth = $data->philhealth;
          $address = $data->address;
          $nextOfKin = $data->nextOfKin;
          $contact = $data->contact;
          $dateAdmitted = $data->dateAdmitted;
          $referralType = $data->referralType;
          $disposition = $data->disposition;
          $specialization = $data->specialization;
          $temperature = $data->temperature;
          $bloodPressure = $data->bloodPressure;
          $respiRate = $data->respiRate;
          $pulseRate = $data->pulseRate;
          $oxygen = $data->oxygen;
          $glasgow = $data->glasgow;
          $chiefComplaints = $data->chiefComplaints;
          $diagnosis = $data->diagnosis;
          $endorsement = $data->endorsement;
          $userContact = $data->userContact;
          $reason = $data->reason;
          $newGp = $data->newGp;
          $lmp = $data->lmp;
          $aog = $data->aog;
          $edc = $data->edc;
          $fht = $data->fht;
          $th = $data->fh;
          $apgar = $data->apgar;
          $newIe = $data->newIe;
          $newBowList = $data->newBowList;
          $status = "pending";
            
            $stmt = $db->prepare("INSERT INTO `temp_referral` (`tstamp`, `patientId`, `username`, `refFacility`, `lastname`, `firstname`, `middleName`, `extended`, `sex`, `birthdate`, `age`, `civilStatus`, `nationality`, `religion`, `occupation`, `philhealth`, `address`, `nextOfkin`, `contactWatcher`, `dateAdmitted`, `refType`, `disposition`, `specialization`, `latestTemp`, `latestBp`, `latestRespi`, `latestPulse`, `latestOxygen`, `latestGlasgow`, `chiefComplaints`, `diagnosis`, `endorsement`, `userContact`, `reason`, `GP`, `LMP`, `AOG`, `EDC`, `FHT`, `FH`, `APGAR`, `IE`, `bow`, `status`) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?,?, ?, ?, ?,?, ?, ?, ?, ?,?, ?, ?, ?, ?,?, ?, ?, ?, ?,?, ?, ?, ?, ?,?, ?, ?, ? );");

            $stmt->bind_param("ssssssssssssssssssssssssssssssssssssssssssss", 
            $timeStamp, $patientId, $username, $refFacility, $lastname, $firstname, $middlename, $extendedName, $sex, $birthdate, $age, $civilStatus, $nationality ,$religion ,$occupation ,$philhealth ,$address , $nextOfKin ,$contact ,$dateAdmitted ,$referralType ,$disposition ,$specialization,$temperature ,$bloodPressure ,$respiRate ,$pulseRate , $oxygen ,$glasgow , $chiefComplaints ,$diagnosis ,$endorsement , $userContact ,$reason ,       $newGp, $lmp, $aog, $edc, $fht, $th, $newIe, $apgar, $newBowList, $status);
            
            if($stmt->execute()){
                $data = ['status' => 1, 'message' => "Record successfully created"];
            } else {
                $data = ['status' => 0, 'message' => "Failed to create record."];
            }
            
            echo json_encode($data);
            break;
}

?>
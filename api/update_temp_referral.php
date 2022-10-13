<?php
 
include '../connection/config.php';

$method = $_SERVER['REQUEST_METHOD'];

    switch($method) {
        case 'POST':
            $data = json_decode(file_get_contents('php://input'));

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
          $lmp = $data->lmp;
          $aog = $data->aog;
          $edc = $data->edc;
          $fht = $data->fht;
          $th = $data->fh;
          $apgar = $data->apgar;
          $hpi = $data->hpi;
          $ppf = $data->ppf;
          $ivf = $data->ivf;
          $meds = $data->meds;
          $lab = $data->lab;

            
            $stmt = $db->prepare("UPDATE temp_referral SET  username = ?, refFacility = ?, lastname = ?, firstname = ?, middleName = ?, extended = ?, sex = ?, birthdate = ?, age = ?, civilStatus = ?, nationality = ?, religion = ?, occupation = ?, philhealth = ?, `address` = ?, nextOfkin = ?, contactWatcher = ?, dateAdmitted = ?, refType = ?, disposition = ?, specialization = ?, latestTemp = ?, latestBp = ?, latestRespi = ?, latestPulse = ?, latestOxygen = ?, latestGlasgow = ?, chiefComplaints = ?, diagnosis = ?, endorsement = ?, userContact = ?, reason = ?, LMP = ?, AOG = ?, EDC = ?, FHT = ?, FH = ?, APGAR = ?, HPI = ?, PPF = ?, IVF = ?, MEDS = ?, LAB = ?, `timestamp` = CURRENT_TIMESTAMP() WHERE patientId=? ");

            $stmt->bind_param("ssssssssssssssssssssssssssssssssssssssssssss", 
            $username, $refFacility, $lastname, $firstname, $middlename, $extendedName, $sex, $birthdate, $age, $civilStatus, $nationality ,$religion ,$occupation ,$philhealth ,$address , $nextOfKin ,$contact ,$dateAdmitted ,$referralType ,$disposition ,$specialization,$temperature ,$bloodPressure ,$respiRate ,$pulseRate , $oxygen ,$glasgow , $chiefComplaints ,$diagnosis ,$endorsement , $userContact ,$reason , $lmp, $aog, $edc, $fht, $th, $apgar, $hpi, $ppf, $ivf, $meds, $lab, $patientId);
            
            if($stmt->execute()){
                $data = ['status' => 1, 'message' => "Record successfully created"];
            } else {
                $data = ['status' => 0, 'message' => "Failed to create record."];
            }
            
            echo json_encode($data);
            break;
}

?>
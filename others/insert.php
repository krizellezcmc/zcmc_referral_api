<?php

include '../connection/config.php';

$password = "ipcc_user";
$hashed = password_hash($password, PASSWORD_DEFAULT);

$userId = 122;


$stmt = $db->prepare("UPDATE users set password = ? WHERE userId = ?");

$stmt->bind_param("si", $hashed, $userId);

if($stmt->execute()) {
    echo "Success";
} else {
    echo "Failed";
}

?>
<?php

include '../connection/config.php';

$password = "ref@2022";
$hashed = password_hash($password, PASSWORD_DEFAULT);

$userId = 1;


$stmt = $db->prepare("UPDATE users set password = ? WHERE userId = ?");

$stmt->bind_param("si", $hashed, $userId);

if($stmt->execute()) {
    echo "Success";
} else {
    echo "Failed";
}

?>
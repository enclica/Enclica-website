<?php

include("../../../server/config.php");

//get user info from database
$token = strip_tags(stripslashes($_GET['token']));

//get username from token
$sql = "SELECT * FROM `tokens` WHERE `tokens`.`token` = '$token' LIMIT 1";
$result = $conn->query($sql);

$un = $result->fetch_assoc()['username'];

$sql = "SELECT id,username,email,overwrittenstatus,created_at,lastseen FROM `users` WHERE `users`.`username` = '$un' LIMIT 1";

$result = $conn->query($sql);


if ($conn->query($sql) == TRUE) {
    echo json_encode($result->fetch_assoc());
} else {
    //array with subkeys and subvalues
    echo json_encode(array("error" => true, "data" => "Error: " . $sql, "SQLERROR" => $conn->error));
}
$conn->close();
<?php

include("../../server/config.php");

$token = stripslashes(strip_tags($_POST['token']));

if ($token == '') {
    echo json_encode(array("error" => true, "data" => "Error: no token provided"));
    die();
}

//get username from token

$sql = "SELECT * FROM `tokens` WHERE `tokens`.`token` = '$token' LIMIT 1";
$result = $conn->query($sql);

$username = $result->fetch_assoc()['username'];

//delete all items from activity table for current user
$sql = "DELETE FROM activity WHERE username = '$username'";
$result = $conn->query($sql);

if ($result) {
    $sql = "INSERT INTO activity (username, activity) VALUES ('$username', 'activity: Cleared all activity')";

    if ($conn->query($sql)) {
    }

    echo json_encode(array("success" => true, "data" => "Successfully deleted all activity for user."));
} else {
    echo json_encode(array("error" => true, "data" => "Error: " . $sql . "<br>" . $conn->error));
}
<?php
include("../../server/config.php");
//logout from the mysql database and delete the token from the database
$token = strip_tags(stripslashes($_POST['token']));

if ($token == '') {
    echo json_encode(array("error" => true, "data" => "No token provided"));
    exit();
}

$sql = "DELETE FROM `tokens` WHERE `tokens`.`token` = '$token'";


if ($conn->query($sql) === TRUE) {
    echo json_encode(array('error' => false, "data" => "Logged out successfully"));
} else {
    echo json_encode(array("error" => true, "data" => "Error: " . $sql));
}

$conn->close();
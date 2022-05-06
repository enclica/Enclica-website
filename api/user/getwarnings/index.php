<?php
include("../../server/config.php");

//get username from token
include("../../server/config.php");

//get user info from database
$token = strip_tags(stripslashes($_GET['token']));
if ($token == '') {
    echo json_encode(array("error" => true, "data" => "Error: no token provided"));
    die();
}

//get username from token
$sql = "SELECT * FROM `tokens` WHERE `tokens`.`token` = '$token' LIMIT 1";
$result = $conn->query($sql);

$un = $result->fetch_assoc()['username'];

//look for all items in the table activity and return as a json object then echo back if not echo a json error
$sql = "SELECT * FROM warnings WHERE username = '$un'";
$result = $conn->query($sql);
//use results to output all rows into json and echo back
if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $arr[] = $row;
    }
    echo json_encode($arr);
} else {
    //array with subkeys and subvalues
    echo json_encode(array("error" => true, "data" => "No data"));
}
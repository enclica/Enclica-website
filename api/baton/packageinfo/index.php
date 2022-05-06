<?php
include("../../server/config.php");

//get package info from get request
$packagename = $_GET['package'];

//sanitize package name
$packagename = stripslashes(strip_tags($packagename));

//get package info from database
$sql = "SELECT * FROM `packages` WHERE `packages`.`packagename` = '$packagename' LIMIT 1";
$result = $conn->query($sql);

//if result is empty, package does not exist
if ($result->num_rows == 0) {
    echo json_encode(array("error" => true, "data" => "Package does not exist"));
    exit();
}

//echo out package info via json
echo json_encode($result->fetch_assoc());
?>


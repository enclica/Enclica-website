<?php

include("../../server/config.php");

//get username from product key

$productkey = strip_tags(stripslashes($_POST['productkey']));

echo $productkey;

//filter product key to only allow numbers letters and dashes
//$productkey = preg_replace('/[^A-Za-z0-9\-]/', '', $productkey);

$sql = "SELECT * FROM `productkeys` WHERE `productkeys`.`productkey` = '$productkey' LIMIT 1";

$result = $conn->query($sql);

//check if product key exists by seeing if there is a row in the table



$un = $result->fetch_assoc()['associatedaccount'];

if($un == ''){
    echo json_encode(array("error" => true, "data" => "Error: no product key provided 06"));
    die();
}

//remove one from maxuses and change used to 1
$sql = "UPDATE `productkeys` SET `maxuses` = `maxuses` - 1, `used` = 1 WHERE `productkeys`.`productkey` = '$productkey'";
$result = $conn->query($sql);


echo json_encode(array("error" => false, "data" => "Success"));

?> 
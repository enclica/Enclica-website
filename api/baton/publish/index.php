<?php

include("../../server/config.php");

$token = stripslashes(strip_tags($_POST['token']));

if ($token == '') {
    echo json_encode(array("error" => true, "data" => "Error: no token provided"));
    die();
}

//get username from token stuff

$sql = "SELECT * FROM `tokens` WHERE `tokens`.`token` = '$token' LIMIT 1";
$result = $conn->query($sql);

$username = $result->fetch_assoc()['username'];

if($username == '') {
    echo json_encode(array("error" => true, "data" => "Error: no username found for token"));
    die();
}
//baton publish code 
$packagename = stripslashes(strip_tags($_POST['packagename']));
$packagedescription = stripslashes(strip_tags($_POST['packagedescription']));
$packageversion = stripslashes(strip_tags($_POST['packageversion']));
$packagelicense = stripslashes(strip_tags($_POST['packagelicense']));
$packagelicenseurl = stripslashes(strip_tags($_POST['packagelicenseurl']));
$packagefile = $_FILES['packagefile'];
$packagetags = stripslashes(strip_tags($_POST['packagetags']));
$platform = stripslashes(strip_tags($_POST['platform']));
$packagetype = stripslashes(strip_tags($_POST['packagetype']));
$packageicon = $_FILES['packageicon'];


//check if all fields are filled in
if ($packagename == '' || $packagedescription == '' || $packageversion == '' || $packagelicense == '' || $packagelicenseurl == '' || $packagefile == '' || $platform == '' || $packagetype == '' || $packageicon == '') {
    echo json_encode(array("error" => true, "data" => "Error: not all fields are filled in"));
    die();
}

//check if package name is valid
if (!preg_match("/^[a-zA-Z0-9_]+$/", $packagename)) {
    echo json_encode(array("error" => true, "data" => "Error: package name is not valid"));
    die();
}

//check if package version is valid
if (!preg_match("/^[0-9]+(\.[0-9]+)*$/", $packageversion)) {
    echo json_encode(array("error" => true, "data" => "Error: package version is not valid"));
    die();
}

//check if package license is valid
if (!preg_match("/^[a-zA-Z0-9_]+$/", $packagelicense)) {
    echo json_encode(array("error" => true, "data" => "Error: package license is not valid"));
    die();
}

//check if package license url is valid
if (!preg_match("/^(http|https):\/\/[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(([0-9]{1,5})?\/.*)?$/i", $packagelicenseurl)) {
    echo json_encode(array("error" => true, "data" => "Error: package license url is not valid"));
    die();
}



//check to see if user cdn folder for baton exists

if(file_exists("/cdn.csoftware.cf/baton/".$username)) {
    //do nothing
} else {
    mkdir("/cdn.csoftware.cf/baton/".$username, 0777, true);
}

//check to see if package folder for baton exists

if(file_exists("/cdn.csoftware.cf/baton/".$username."/".$packagename)) {
    //echo error that says that package already exists
    echo json_encode(array("error" => true, "data" => "Error: package already exists for your account"));
} else {
    mkdir("/cdn.csoftware.cf/baton/".$username."/".$packagename, 0777, true);
}

//check to see if package version folder for baton exists

if(file_exists("/cdn.csoftware.cf/baton/".$username."/".$packagename."/".$packageversion)) {
    //echo error that says that package already exists
    echo json_encode(array("error" => true, "data" => "Error: package version already exists for your account"));
} else {
    mkdir("/cdn.csoftware.cf/baton/".$username."/".$packagename."/".$packageversion, 0777, true);
}

//upload package file to package version folder
$packagefile_name = $packagefile['name'];
$packagefile_tmp_name = $packagefile['tmp_name'];
$packagefile_size = $packagefile['size'];
$packagefile_error = $packagefile['error'];
$packagefile_type = $packagefile['type'];

$packagefile_ext = explode('.', $packagefile_name);
$packagefile_ext = strtolower(end($packagefile_ext));

$packagefile_name = $packagefile_name.".".$packagefile_ext;

$packagefile_destination = "/cdn.csoftware.cf/baton/".$username."/".$packagename."/".$packageversion."/".$packagefile_name;

if(move_uploaded_file($packagefile_tmp_name, $packagefile_destination)) {
    //do nothing
} else {
    echo json_encode(array("error" => true, "data" => "Error: package file upload failed"));
    die();
}

//move package icon to package version folder and name it icon.png
$packageicon_name = $packageicon['name'];
$packageicon_tmp_name = $packageicon['tmp_name'];
$packageicon_size = $packageicon['size'];
$packageicon_error = $packageicon['error'];
$packageicon_type = $packageicon['type'];

if(move_uploaded_file($packageicon_tmp_name, "/cdn.csoftware.cf/baton/".$username."/".$packagename."/".$packageversion."/icon.png")) {
    //do nothing
} else {
    echo json_encode(array("error" => true, "data" => "Error: package icon upload failed"));
    die();
}

//create a package.baton file with all the package info in it as json
$packagefile_json = array(
    "packagename" => $packagename,
    "packagedescription" => $packagedescription,
    "packageversion" => $packageversion,
    "packagelicense" => $packagelicense,
    "packagelicenseurl" => $packagelicenseurl,
    "packagefile" => $packagefile_name,
    "packagetags" => $packagetags,
    "platform" => $platform,
    "publisher" => $username,
    "packagetype" => $packagetype,
    "packageicon" => "icon.png"
);

file_put_contents("/cdn.csoftware.cf/baton/".$username."/".$packagename."/".$packageversion."/package.baton", json_encode($packagefile_json));





$query = "INSERT INTO `packages` (`packagename`, `packagedescription`, `packageversion`, `packagelicense`, `packagelicenseurl`, `packagefile`, `packagetags`, `platform`, `publisher`, `packagetype`, `packageicon`) VALUES ('".$packagename."', '".$packagedescription."', '".$packageversion."', '".$packagelicense."', '".$packagelicenseurl."', '".$packagefile_name."', '".$packagetags."', '".$platform."', '".$username."', '".$packagetype."', 'icon.png')";


if ($conn->query($query) === TRUE) {
    echo json_encode(array("error" => false, "data" => "Package successfully uploaded"));
} else {
    echo json_encode(array("error" => true, "data" => "Error: package upload failed"));
}
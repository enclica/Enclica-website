<?php
header('Access-Control-Allow-Origin: *');
include('../../server/config.php');

$token = strip_tags(stripslashes($_POST['token']));

$sql = "SELECT * FROM tokens WHERE token = '$token'";

$results = mysqli_query($link, $sql);

$tempdataa = array();

if (mysqli_num_rows($results) > 0) {



    while ($row = mysqli_fetch_assoc($results)) {

        $tempdataa = $row;
    }
} else {

    echo json_encode(

        array(

            'code' => 58757,

            'error' => 'User token is invalid.',

            'data' => null

        )
    );
    exit();
}



$groups = null;

$un =  $tempdataa['username'];

$currentserver = strip_tags(stripcslashes($_POST['serverid']));
$msg = strip_tags(stripcslashes(openssl_encrypt($_POST['message'], "aes-256-cfb", $currentserver)));
if ($msg == "") {
    return;
}
$randomNumber = rand(0, 9999999);
$time = time();


$sql = "INSERT INTO activity (username, activity) VALUES ('$un', 'activity: sent message')";

if (mysqli_query($link, $sql)) {
}

$msgsql = "INSERT INTO `messages` (`ID`, `sender`, `time`, `edited`, `chat_type`, `serverid`, `message`) VALUES ('$randomNumber', '$un', $time, '0', '1', '$currentserver', '$msg'); ";

mysqli_query($link, $msgsql);


echo json_encode($_POST);
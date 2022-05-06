<?php


//include config
require_once('../../server/config.php');

//check to see if the token is valid and if so get the username then check to see if they are the owner of the server
if (!isset($_POST['token'])) {
    echo json_encode(
        array(
            'error' => true,
            'data' => 'Invalid token.'
        )
    );
    exit();
}
function contains($str, array $arr)
{
    foreach ($arr as $a) {
        if (stripos($str, $a) !== false) return true;
    }
    return false;
}
//get username from token and check to see if they are the owner of the server with the token
$token = $_POST['token'];
$serverid = strip_tags(stripslashes($_POST['serverid']));

$description = strip_tags(stripslashes($_POST['description']));
$name = strip_tags(stripslashes($_POST['name']));


$order   = array("||", "^");


//search in a dictionary file for the string $name and if the dictionary line contains the string $name then exit with error
$file = fopen("https://raw.githubusercontent.com/alexsannikov/adguardhome-filters/master/porn.txt", "r") or die("Unable to open file!");

while (!feof($file)) {
    $line = fgets($file);
    if (contains(str_replace($order, '', $line), array($name))) {
        echo json_encode(
            array(
                'error' => true,
                'data' => 'NSFW links are not allowed in name.'
            )
        );
        exit();
    }
}

while (!feof($file)) {
    $line = fgets($file);
    if (contains(str_replace($order, '', $line), array($description))) {
        echo json_encode(
            array(
                'error' => true,
                'data' => 'NSFW links are not allowed in description.'
            )
        );
        exit();
    }
}











$filteredtoken = strip_tags(stripslashes($token));
$token = mysqli_real_escape_string($link, $filteredtoken);
$query = "SELECT username FROM tokens WHERE token = '$token'";
$result = mysqli_query($link, $query);
if (!$result) {
    echo json_encode(
        array(
            'error' => true,
            'data' => 'Invalid token.'
        )
    );
    exit();
}
$row = mysqli_fetch_assoc($result);
$username = $row['username'];
$query = "SELECT * FROM groups WHERE owner = '$username' AND ID = '$serverid'";
$result = mysqli_query($link, $query);
if (!$result) {
    echo json_encode(
        array(
            'error' => true,
            'data' => 'Not the owner.'
        )
    );
    exit();
} else {
    //add server id to the communities table
    $query = "INSERT INTO communities (serverid,name,description) VALUES ('$serverid','$name','$description')";
    $result = mysqli_query($link, $query);
    if (!$result) {
        echo json_encode(
            array(
                'error' => true,
                'data' => 'Could not add server to community.'
            )
        );
        exit();
    } else {
        echo json_encode(
            array(
                'error' => false,
                'data' => 'Successfully added server to community.'
            )
        );
        exit();
    }
}
<?php
include '../../server/config.php';

//get profilepicture from user profile
$username = $_GET['username'];
$size = $_GET['s'];

//get profile picture from database
$sql = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);
$profilepicture = $row['profilepicture'];


//get profilepicture from cdn and output as a display
if($profilepicture){
    $profilepicture = "https://cdn.csoftware.cf/enc/pfp/". $username. "/data/pfp/". $profilepicture;
    if($size == "sm"){
        $profilepicture = $profilepicture. "_sm_";
    }
    $profilepicture = $profilepicture. $size;
    header("Content-Type: image/png");
    readfile($profilepicture);
}

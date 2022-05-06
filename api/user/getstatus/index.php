<?php
include("../../server/config.php");

$un = stripslashes(strip_tags($_GET['username']));
$overwrittenstatus; $lastseen;
if($un == ''){
    echo json_encode(array('error' => true, 'message' => 'Please enter a username.'));
}
//get the overwrittenstatus and lastseen time from the database using $conn
$sql = "SELECT overwrittenstatus, lastseen FROM users WHERE username = '$un'";
$result = $conn->query($sql);
//see if overwrittenstatus is empty
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        $overwrittenstatus = $row["overwrittenstatus"];
        $lastseen = $row["lastseen"];
    }
} else {
    echo json_encode(array('error' => true, 'message' => 'No results found.'));
}

//check to see if overwrittenstatus is empty and if so echo itself
if($overwrittenstatus != ''){
    echo json_encode(array('status' => $overwrittenstatus));
    exit();
}

//check to see if lastseen is over 2 hours ago and if so echo itself
if($lastseen != ''){
    $lastseen = strtotime($lastseen);
    $now = time();
    $difference = $now - $lastseen;
    if($difference > 7200){
        echo json_encode(array('status' => 'offline'));
        exit();
    }else{
        echo json_encode(array('status' => 'online'));
        exit();
    }
}

<?php
//report system (prep)
//1.0.0
include("../server/config.php");

$reporter = stripslashes(strip_tags($_GET['r']));
$serverid = stripslashes(strip_tags($_GET['id']));
$reason = stripslashes(strip_tags($_GET['input']));

$msgsql = "INSERT INTO `report` (`reporter`, `serverID`,`reason`) VALUES ('$reporter','$serverid','$reason'); ";
  
mysqli_query($link, $msgsql);

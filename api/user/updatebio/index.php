<?php

function generateRandomString($length = 10)
{

    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';

    $charactersLength = strlen($characters);

    $randomString = '';

    for ($i = 0; $i < $length; $i++) {

        $randomString .= $characters[rand(0, $charactersLength - 1)];
    }


    return $randomString;
}


include("../../server/config.php");

//get username from token and get bio from post input and update the bio in the database
if ($_POST['token'] == '') {
    echo json_encode(array(
        'error' => true,
        'data' => 'No token provided.'
    ));
    exit;
}

//get username from token
if ($_POST['token']) {
    $token = $_POST['token'];
    $token = mysqli_real_escape_string($conn, $token);
    $sql = "SELECT * FROM tokens WHERE token='$token'";
    $result = mysqli_query($conn, $sql);
    if (!mysqli_query($conn, $sql)) {
        echo json_encode(array(
            'error' => true,
            'data' => 'Error: ' . mysqli_error($conn)
        ));
        exit;
    }
    $row = mysqli_fetch_assoc($result);
    $username = $row['username'];
}

//get bio from username and update bio in the database for that user if no error occures then echo json output with error equals false and data equals success
    $bio = $_POST['bio'];
    $bio = mysqli_real_escape_string($conn, $bio);
    $sql = "UPDATE users SET bio='$bio' WHERE username='$username'";
    if (mysqli_query($conn, $sql)) {
        echo json_encode(array(
            'error' => false,
            'data' => 'Success'
        ));
        exit;
    } else {
        echo json_encode(array(
            'error' => true,
            'data' => 'Error: ' . mysqli_error($conn)
        ));
        exit;
    }
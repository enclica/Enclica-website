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

//include config
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

$backs = '../../../../';
mkdir($backs . "cdn.csoftware.cf/enc/data/" . $un . "/");



// file upload 1



$target_dir = $backs . "cdn.csoftware.cf/enc/data/" . $un . "/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        $uploadOk = 0;
        echo json_encode(

            array(

                'error' => true,

                'data' => 'fake image'

            )
        );
        exit();
    }
}

// Allow certain file formats
if (
    $imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" && $imageFileType != "mp3" && $imageFileType != "wav" && $imageFileType != "mp4" && $imageFileType != "avi" && $imageFileType != "docx" && $imageFileType != "pptx" && $imageFileType != "zip" && $imageFileType != "pptx"
) {
    echo json_encode(

        array(

            'error' => true,

            'data' => 'untrusted file'

        )
    );
    exit();
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000000) {
    echo json_encode(

        array(
            'error' => 'file size to large',

            'data' => null

        )
    );
    $uploadOk = 0;

    exit();
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
    echo json_encode(

        array(

            'error' => 'Unknown error',

            'data' => null

        )
    );

    exit();
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $str = generateRandomString(40) . "_";
        if ($imageFileType == "gif") {
        } else if ($imageFileType == "png" && $imageFileType == "jpg" && $imageFileType == "jpeg") {
            $img = new Imagick($target_file);
            $img->stripImage();
            $img->setImageDelay(10);
            $img->writeImage($target_file);
        } else {
        }
        rename($target_file, $target_dir . strip_tags(stripcslashes(basename($str . $_FILES["fileToUpload"]["name"]))));
        // removeExif($target_file, $target_dir. strip_tags(stripcslashes( basename( $str. $_FILES["fileToUpload"]["name"] ))));
        $name = strip_tags(stripcslashes(basename($str . $_FILES["fileToUpload"]["name"])));

        echo json_encode(

            array(
                'data' => 'Done'

            )
        );
    } else {
        return;
    }
}


//file upload 0

$sql = "INSERT INTO activity (username, activity) VALUES ('$un', 'activity: sent message')";

if (mysqli_query($link, $sql)) {
}

$currentserver = strip_tags(stripcslashes($_POST['serverid']));
$msg = openssl_encrypt(".", "aes-256-cfb", $currentserver);
if ($msg == "") {
    return;
}
$randomNumber = rand(0, 9999999);
$time = time();

$msgsql = "INSERT INTO `messages` (`ID`, `sender`, `time`, `edited`, `chat_type`, `serverid`, `message`,`file`) VALUES ('$randomNumber', '$un', $time, '0', '1', '$currentserver', '$msg','$name'); ";

mysqli_query($link, $msgsql);
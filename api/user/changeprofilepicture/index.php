<?php
include("../../server/config.php");

$token = $_POST['token'];
$profilepicture = $_POST['profilepicture'];
if(!$token){
    echo json_encode(array(
        'error' => true,
        'data' => 'No token provided.'
    ));
    exit;
}


//sanitize token string for mysal database
$token = mysqli_real_escape_string($conn, $token);
$sql = "SELECT * FROM tokens WHERE token='$token'";
$result = mysqli_query($conn, $sql);
//get usernames from token
if(!mysqli_query($conn, $sql)){
    echo json_encode(array(
        'error' => true,
        'data' => 'Error: ' . mysqli_error($conn)
    ));
    exit;
}
$row = mysqli_fetch_assoc($result);
$username = $row['username'];


//upload profile picture to cdn.enclica.com and get the url by file name
$rand = rand(0,999999).rand(0,999999).rand(0,999999).rand(0,999999).rand(0,999999).rand(0,999999);

$randname = $rand. "_sm_";


mkfil("/home/csoftwar/cdn.csoftware.cf/enc/pfp/". $username. "/data/pfp/"."BASE.png",$data, "w");
for ($x = 1; $x <= 400; $x++) {
    resize($x,"/home/csoftwar/cdn.csoftware.cf/enc/pfp/". $username. "/data/pfp/". $rand. "_sm_". $x,"/home/csoftwar/cdn.csoftware.cf/enc/pfp/". $username. "/data/pfp/"."BASE.png");
    
  } 

  unlink("/home/csoftwar/cdn.csoftware.cf/enc/pfp/". $username. "/data/pfp/"."BASE.png");

  //change profilepicture in database for user profile
    $sql = "UPDATE users SET profilepicture='$randname' WHERE username='$username'";
    if(!mysqli_query($conn, $sql)){
        echo json_encode(array(
            'error' => true,
            'data' => 'Error: ' . mysqli_error($conn)
        ));
        exit;
    }














function base64_img_ext($image){
    $image_array_1 = explode(";", $image);
    $i_a_2 = explode(",", $image_array_1[1]);
    $data = base64_decode($i_a_2[1]);
    return $data;
  }
  
  function mkfil($file,$text,$method = "w"){
    $myfile = fopen($file, $method);
    $txt = $text;
    fwrite($myfile, $txt);
    fclose($myfile);
  }
  
  function resize($newWidth, $targetFile, $originalFile) {
  
    $info = getimagesize($originalFile);
    $mime = $info['mime'];
  
    switch ($mime) {
            case 'image/jpeg':
                    $image_create_func = 'imagecreatefromjpeg';
                    $image_save_func = 'imagejpeg';
                    $new_image_ext = 'jpg';
                    break;
  
            case 'image/png':
                    $image_create_func = 'imagecreatefrompng';
                    $image_save_func = 'imagepng';
                    $new_image_ext = 'png';
                    break;
  
            case 'image/gif':
                    $image_create_func = 'imagecreatefromgif';
                    $image_save_func = 'imagegif';
                    $new_image_ext = 'gif';
                    break;
  
            default: 
                    throw new Exception('Unknown image type.');
    }
  
    $img = $image_create_func($originalFile);
    list($width, $height) = getimagesize($originalFile);
  
    $newHeight =(int) ($height / $width) * $newWidth;
    $tmp = imagecreatetruecolor((int)$newWidth, (int)$newHeight);
    imagecopyresampled($tmp, $img, 0, 0, 0, 0, $newWidth, $newHeight, $width, $height);
  
    if (file_exists($targetFile)) {
            unlink($targetFile);
    }
    $image_save_func($tmp, "$targetFile.$new_image_ext");
  }
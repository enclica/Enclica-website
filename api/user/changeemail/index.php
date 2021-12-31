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

//check if email is on POST
if(!$_POST['email']){
    //encode a json response where error is true and data = error message
    echo json_encode(array(
        'error' => true,
        'data' => 'No email address provided.'
    ));
    exit;
}


//get username from token via database
$token = $_POST['token'];

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

if(!mysqli_query($conn, $sql)){
    echo json_encode(array(
        'error' => true,
        'data' => 'Error: ' . mysqli_error($conn)
    ));
    exit;
}
$row = mysqli_fetch_assoc($result);
$username = $row['username'];

echo $username;


//get email address for current user
$sql = "SELECT * FROM users WHERE username='$username'";
$result = mysqli_query($conn, $sql);

if(!mysqli_query($conn, $sql)){
    echo json_encode(array(
        'error' => true,
        'data' => 'Error: ' . mysqli_error($conn)
    ));
    exit;
}
$row = mysqli_fetch_assoc($result);
$oemail = $row['email'];
$nemail = $_POST['email'];

//send an email to the email address
$to = $oemail;
$subject = "Enclica - Change email";
$message = "
<html>
<head>
<title>Enclica - Change email</title>
<img style='
display: block;
margin-left: auto;
margin-right: auto;' 
src='https://new.enclica.com/assets/img/logoset/Layout_trans_ty.png' />
</head>
<body style='text-align:center'>
<p>Hi $username,</p>

<p>Your email address has been changed from <b>$oemail</b> to <b>$nemail</b>.</p>
<p>If you did not request this then please contact Enclica software immedietly.</p>
<p>Thank you.</p>

</body>
</html>
";

//send email with message
$headers = "MIME-Version: 1.0" . "\r\n";
$headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
$headers .= 'from: Enclica Software  <no-reply@enclica.com>' . "\r\n";
if(!mail($to,$subject,$message,$headers)){
    echo json_encode(array(
        'error' => true,
        'data' => 'Email could not be sent.'
    ));
    exit();
}



// Change email address on database but email the old email address before changing.

$email = $_POST['email'];

$sql = "UPDATE users SET email = '$email' WHERE username = '$username'";

if ($conn->query($sql) === TRUE) {
   echo json_encode(array('error' => false, 'data' => 'Email address changed successfully.'));
} else {
    echo json_encode(array('error' => true, 'data' => 'Error: ' . $sql . '<br>' . $conn->error));
}

$conn->close();

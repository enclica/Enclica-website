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
if ($_POST['code'] == '') {
    if ($_POST['username'] == '') {
        if ($_POST['token'] == '') {
            echo json_encode(array(
                'error' => true,
                'data' => 'No token provided.'
            ));
            exit;
        }
    }
}
//change user password by sending a email with a code which is added to the database to the table named resetcodes.
//the code is then used to change the password.

if (!$_POST['code']) {
    //send an email to the user with a randomly generated code for resetting their password and it expires in 24 hours.

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
    } else {

        if (!$_POST['username']) {
            echo json_encode(array(
                'error' => true,
                'data' => 'No username provided.'
            ));
            exit;
        }

        $username = $_POST['username'];
        $username = mysqli_real_escape_string($conn, $username);
    }

    //get email from username in users
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    if (!mysqli_query($conn, $sql)) {
        echo json_encode(array(
            'error' => true,
            'data' => 'Error: ' . mysqli_error($conn)
        ));
        exit;
    }
    $row = mysqli_fetch_assoc($result);
    $email = $row['email'];
    $code = rand(100000, 999999);
    //expire code in 24 hours
    $expire = date("Y-m-d H:i:s", strtotime("+24 hours"));
    $sql = "INSERT INTO resetcodes (username, code, expire) VALUES ('$username', '$code', '$expire')";
    if (!mysqli_query($conn, $sql)) {
        echo json_encode(array(
            'error' => true,
            'data' => 'Error: ' . mysqli_error($conn)
        ));
        exit;
    }
    $to = $email;
    $subject = "Password Reset";
    $message = "
    <html>
    <head>

    <title>Password Reset</title>
    <img style='
display: block;
margin-left: auto;
margin-right: auto;' 
src='https://new.enclica.com/assets/img/logoset/Layout_trans_ty.png' />
    </head>
    <body style='text-align:center;'>
    <p>Hello, $username!</p>
    <p>You have requested to reset your password.</p>
    <h3 style='color:#00abff;'>Your code $code</h3>

    <h4 style='color:red;'>!DO NOT SHARE THIS CODE!</h4>
    </body>
    </html>
    ";
    $headers = "MIME-Version: 1.0" . "\r\n";

    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

 //   $headers .= 'From: Enclica software<no-reply@enclica.com>' . "\r\n";

    if (!mail($to, $subject, $message, $headers)) {
        echo json_encode(array(
            'error' => true,
            'data' => 'Email could not be sent.'
        ));
        exit();
    }

    echo json_encode(array(
        'error' => false,
        'data' => 'Email sent.'
    ));


    exit;
} else {
    //change the password when we detect the code as a input on POST
    $code = $_POST['code'];
    $code = mysqli_real_escape_string($conn, $code);
    $sql = "SELECT * FROM resetcodes WHERE code='$code'";
    $result = mysqli_query($conn, $sql);
    if (!mysqli_query($conn, $sql)) {
        echo json_encode(array(
            'error' => true,
            'data' => 'Error: ' . mysqli_error($conn)
        ));
        exit;
    }
    $row = mysqli_fetch_assoc($result);
    //check to see if code has expired by seeing if its over 24 hours old
    $expire = $row['expire'];
    $expire = strtotime($expire);
    $now = time();
    if ($now > $expire) {
        echo json_encode(array(
            'error' => true,
            'data' => 'Code has expired.'
        ));
        //remove code from database
        $sql = "DELETE FROM resetcodes WHERE code='$code'";
        if (!mysqli_query($conn, $sql)) {
            exit;
        }

        exit;
    }
    //get username from Code in the database


    $sql = "SELECT * FROM resetcodes WHERE code='$code'";
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

    //get email from username in users
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    if (!mysqli_query($conn, $sql)) {
        echo json_encode(array(
            'error' => true,
            'data' => 'Error: ' . mysqli_error($conn)
        ));
        exit;
    }
    $row = mysqli_fetch_assoc($result);
    $email = $row['email'];
    $email = $row['email'];
    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);
    if (!mysqli_query($conn, $sql)) {
        echo json_encode(array(
            'error' => true,
            'data' => 'Error: ' . mysqli_error($conn)
        ));
        exit;
    }
    $row = mysqli_fetch_assoc($result);
    $password = $_POST['password'];
    $password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "UPDATE users SET password='$password' WHERE username='$username'";
    if (!mysqli_query($conn, $sql)) {
        echo json_encode(array(
            'error' => true,
            'data' => 'Error: ' . mysqli_error($conn)
        ));
        exit;
    }


    $sql = "INSERT INTO activity (username, activity) VALUES ('$username', 'activity: setting change')";
    //echo $sql;
    $conn->query($sql);


    $to = $email;
    $subject = "Password Reset";
    $message = "
    <html>
    <head>
    <title>Password Reset</title>
    <img style='
    display: block;
    margin-left: auto;
    margin-right: auto;' 
    src='https://new.enclica.com/assets/img/logoset/Layout_trans_ty.png' />
    </head>
    <body style='text-align: center;'>
    <p>Hello, $username!</p>
    <p>Your password has been reset. If this was not you please contact enclica software support.</p>
    </body>
    </html>
    ";
    $headers = "MIME-Version: 1.0" . "\r\n";

    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";

  //  $headers .= 'From: Enclica software<no-reply@enclica.com>' . "\r\n";

    if (!mail($to, $subject, $message, $headers)) {
        echo json_encode(array(
            'error' => true,
            'data' => 'Error: ' . mysqli_error($conn)
        ));
        exit;
    }

    //delete code from database.
    $sql = "DELETE FROM resetcodes WHERE code='$code'";
    if (!mysqli_query($conn, $sql)) {
        echo json_encode(array(
            'error' => true,
            'data' => 'Error: ' . mysqli_error($conn)
        ));
        exit;
    }

    echo json_encode(array(
        'error' => false,
        'data' => 'Password changed.'
    ));
}
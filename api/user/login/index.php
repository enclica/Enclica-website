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

// Check if username is empty

if (empty(trim($_POST["username"]))) {



    echo json_encode(

        array(

            'error' => true,

            'data' => 'Login | no username provided'

        )
    );



    die();
} else {

    $username = trim($_POST["username"]);
}



// Check if password is empty

if (empty(trim($_POST["password"]))) {

    echo json_encode(

        array(

            'error' => true,

            'data' => 'Login | no password provided'

        )
    );



    die();
} else {

    $password = trim($_POST["password"]);
}



// Validate credentials

if (empty($username_err) && empty($password_err)) {

    // Prepare a select statement

    $sql = "SELECT id, username, password FROM users WHERE username = ? AND ba=0";



    if ($stmt = mysqli_prepare($link, $sql)) {

        // Bind variables to the prepared statement as parameters

        mysqli_stmt_bind_param($stmt, "s", $param_username);



        // Set parameters

        $param_username = $username;



        // Attempt to execute the prepared statement

        if (mysqli_stmt_execute($stmt)) {

            // Store result

            mysqli_stmt_store_result($stmt);



            // Check if username exists, if yes then verify password

            if (mysqli_stmt_num_rows($stmt) == 1) {

                // Bind result variables

                mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);

                if (mysqli_stmt_fetch($stmt)) {

                    if (password_verify($password, $hashed_password)) {

                        // Password is correct, so start a new session

                        session_start();



                        // Store data in session variables

                        $_SESSION["loggedin"] = true;

                        $_SESSION["id"] = $id;

                        $_SESSION["username"] = $username;

                        //add to activity table

                        $sql = "INSERT INTO activity (username, activity) VALUES ('$username', 'activity: login')";

                        if (mysqli_query($link, $sql)) {
                        }



                        // GIVES THE APPLICATION A TOKEN.



                        $randomtoken = generateRandomString(100);

                        $sql = "INSERT INTO tokens (userid, token, username,datecreated) VALUES ('$id', '$randomtoken', '$username', NOW())";

                        if (mysqli_query($link, $sql)) {
                            mkdir("../../../cdn.csoftware.cf/enc/data/" . $username);
                            file_put_contents("../../../cdn.csoftware.cf/enc/data/" . $username . "/index.php", " ");

                            echo json_encode(

                                array(

                                    'error' => false,

                                    'data' => 'Successfully logged in.',

                                    'token' => $randomtoken

                                )
                            );
                        } else {

                            echo json_encode(

                                array(

                                    'error' => true,

                                    'data' => mysqli_error($link)

                                )
                            );
                        }





                        die();
                    } else {

                        // Display an error message if password is not valid

                        echo json_encode(

                            array(


                                'error' => true,

                                'data' =>  'Login | password isnt valid'

                            )
                        );



                        die();
                    }
                }
            } else {

                // Display an error message if username doesn't exist

                echo json_encode(

                    array(

                        'error' => true,

                        'data' => 'Login | no account with that username exists'

                    )
                );
            }
        } else {

            echo json_encode(

                array(

                    'error' => true,

                    'data' => 'Login | something went wrong try again later.'

                )
            );
        }



        // Close statement

        mysqli_stmt_close($stmt);
    }
}



// Close connection

mysqli_close($link);

exit();
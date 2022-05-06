<?php
$isXHR = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtoupper($_SERVER['HTTP_X_REQUESTED_WITH']) === 'XMLHTTPREQUEST';

if (!$isXHR) {
    $title = 'login';
    include dirname(__FILE__) . '/inc/header.php';
}
?>
<title>Enclica software UK.</title>
<div
    style="background-image: url(https://i.picsum.photos/id/1055/5472/3648.jpg?hmac=1c293cGVlNouNQsjxT8y3nsYO-7qLCaOBEGvih0ibEU); background-size: auto;   background-repeat: no-repeat; background-attachment: fixed;">
    <div class="container">

        <div class="p-5 pb-4  rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Enclica account settings
                </h1>
                <p class="col-md-8 fs-4">Your account settings.</p>
                <div class="col-md-6">
                    <div class=" p-5">
                        <div id="alert-settings">
                        </div>

                        <!-- change user email with a text input -->

                        <p>Change email.</p>
                        <p>Change your current email address.</p>
                        <input type="email" class="form-control" id="emailinput" placeholder="Email"
                            onload="userinfo();" />
                        <input type="submit" class="btn btn-primary mt-3" value="Change Email Address"
                            onclick="changeemail();"></input>
                        <p>Change your current password.</p>
                        <p>This will send you an email where you type the code into the display box</p>
                        <button class="btn btn-primary mt-5" id="pwd-btn" onclick="sendpasswordcode()">Change
                            Password</button>

                        <!-- bootstrap 5 modal with a code input and new password input with a confirm button-->
                        <div class="modal fade" id="passwordmodal" tabindex="-1" aria-labelledby="pwm"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Change Password</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>We have sent you a code to your email address associated with your account
                                            please use the code to enter a new password.</p>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Code:</label>
                                            <input type="text" class="form-control" id="code" placeholder="Code">
                                        </div>
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">New Password:</label>
                                            <input type="password" class="form-control" id="npassword"
                                                placeholder="New Password">
                                        </div>
                                    </div>
                                    <div class="modal-footer">

                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary"
                                            onclick="changepassword();">Confirm</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- connect with excenote -->
                        <p>Connect with Excenote</p>
                        <p>Connect your account with Excenote</p>
                        <button class="btn btn-primary mt-5" id="excenote-btn" onclick="connectexcenote()">Connect
                            with Excenote</button>



                        <!-- application connections -->
                        <p>Your application connections.</p>
                        <p>You can connect your application to your account.</p>
                        <!-- bootstrap 5 table with the rows application permissions date of connections -->
                        <div class="table-responsive">
                            <table class="table-responsive table  table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">Application</th>
                                        <th scope="col">Permissions</th>
                                        <th scope="col">Date of connection</th>
                                    </tr>
                                </thead>
                                <tbody id="applications">

                                </tbody>
                            </table>
                        </div>



                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="/assets/js/settings.js"></script>
    <script type="text/javascript">
    userinfo();
    </script>

    <?php
    $isXHR = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtoupper($_SERVER['HTTP_X_REQUESTED_WITH']) === 'XMLHTTPREQUEST';

    if (!$isXHR) {

        include dirname(__FILE__) . '/inc/footer.php';
    }
    ?>
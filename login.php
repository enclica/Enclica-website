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
                <h1 class="display-5 fw-bold">Login to the enclica network.
                </h1>
                <p class="col-md-8 fs-4">Enclica login</p>
                <div class="col-md-6">
                    <div class=" p-5">
                        <div id="alert">
                        </div>
                        <form id="loginform">
                            <input type="text" class="form-control" ID="username" placeholder="Username" />
                            <br />
                            <input type="password" class="form-control" ID="password" placeholder="password" />
                            <br />
                            <input type="submit" onclick="event.preventDefault(); login();" class="btn btn-secondary" value="Login!" />
                        </form>
                        <a href="signup">Don't have an account?</a><br/>
                        <a onclick="sendpasswordcode();" class="link n-o" style="cursor: pointer;">Forgot password?</a>
                        <div class="modal fade" id="passwordmodal" tabindex="-1" aria-labelledby="pwm" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Change Password</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>We have sent you a code to your email address associated with your account please use the code to enter a new password.</p>
                                        <div class="form-group">
                                            <label for="recipient-name" class="col-form-label">Code:</label>
                                            <input type="text" class="form-control" id="code" placeholder="Code">
                                        </div>
                                        <div class="form-group">
                                            <label for="message-text" class="col-form-label">New Password:</label>
                                            <input type="password" class="form-control" id="npassword" placeholder="New Password">
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" onclick="changepassword();">Confirm</button>
                                    </div>
                                </div>
                            </div>
                    </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="/assets/js/login.js"></script>
<?php
$isXHR = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtoupper($_SERVER['HTTP_X_REQUESTED_WITH']) === 'XMLHTTPREQUEST';

if (!$isXHR) {

    include dirname(__FILE__) . '/inc/footer.php';
}
?>
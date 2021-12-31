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
                         <input type="email" class="form-control" id="emailinput" placeholder="Email"  onload="userinfo();"/>
                        <input type="submit" class="btn btn-primary mt-3" value="Change Email Address" onclick="changeemail();"></input>
                        <p>Change your current password.</p>
                        <p>This will send you an email where you type the code into the display box</p>
                        <button class="btn btn-primary mt-5">Change Password</button>




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
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
                            <input type="submit" class="btn btn-secondary" value="Login!" />
                        </form>
                        <a href="signup">Don't have an account?</a>

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
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
                        <form onsubmit="login();">
                            <input type="text" class="form-control" placeholder="Username" />
                            <br />
                            <input type="email" class="form-control" placeholder="Email" />
                            <br />
                            <input type="password" class="form-control" placeholder="password" />
                            <br />
                            <input type="submit" class="btn btn-secondary" value="Login!" />

                        </form>

                        <a href="login">have an account?</a>

                        <h3>Why would i need an enclica account?</h3>
                        <p>A enclica account is used to authenticate purhceses in the software store which is seprate
                            from the network.
                            you also need an enlica account if you want to use enclica messenger, canvs, etc.
                        </p>
                        <h3>How do you secure my account?</h3>
                        <p>At enclica we secure your account by encrypting your password using a salted hashing
                            algorythm specfically Bcrypt which is
                            the industry standard used by google, facecbook, apple, etc.
                        </p>
                        <h3>Will you sell my information?</h3>
                        <p>No we wont you can look at our <a href="privacypolicy">privacy policy</a> for more
                            information
                        </p>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
$isXHR = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtoupper($_SERVER['HTTP_X_REQUESTED_WITH']) === 'XMLHTTPREQUEST';

if (!$isXHR) {

    include dirname(__FILE__) . '/inc/footer.php';
}
?>
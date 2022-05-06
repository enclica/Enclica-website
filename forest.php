<?php
$isXHR = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtoupper($_SERVER['HTTP_X_REQUESTED_WITH']) === 'XMLHTTPREQUEST';

if (!$isXHR) {
  $title = 'browse';
  include dirname(__FILE__) . '/inc/header.php';
}
?>
<title>Enclica software UK.</title>
<div
    style="background-image: url(https://i.picsum.photos/id/1055/5472/3648.jpg?hmac=1c293cGVlNouNQsjxT8y3nsYO-7qLCaOBEGvih0ibEU); background-size: auto;   background-repeat: no-repeat; background-attachment: fixed;">
    <div class="container">

        <div class="p-5 pb-4  rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Forest OS
                </h1>
                <p class="col-md-8 fs-4">Forest os a new way to interface with your pc.</p>
                <div class="col-md-6">
                    <div class=" p-5">
                        <h3>Forest OS - About</h3>
                        <p>Forest os is a operating system designed for people.</p>
                        <p>Forest os is designed for business, artists, musicians, content creators, servers, enterprise and you.</p>

                        <h3>Internal Screenshots</h3>
                        <p>Coming soon.</p>
                        <h3>Download Forest OS iso and drive loader.</h3>

                        <button type="button" class="btn btn-primary">Download Forest OS ISO</button>
                        <button type="button" class="btn btn-primary">Download Drive Loader</button>
                        
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
<?php
$isXHR = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtoupper($_SERVER['HTTP_X_REQUESTED_WITH']) === 'XMLHTTPREQUEST';

if (!$isXHR) {
    $title = 'login';
    include dirname(__FILE__) . '/inc/header.php';
}
?>
<title>Enclica software UK.</title>
<div
    style="background-image: url(https://i.picsum.photos/id/1055/5472/3648.jpg?hmac=1c293cGVlNouNQsjxT8y3nsYO-7qLCaOBEGvih0ibEU);   background-repeat: no-repeat; background-attachment: fixed;">
    <div class="container">

        <div class="p-5 pb-4  rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Enclica messenger
                </h1>
                <p class="col-md-8 fs-4">Enclica messenger is a messaging platform built for everyone to communicate and
                    collaborate.</p>
                <div class="col-md-6">
                    <div class=" p-5">
                        <h2>Benefits of enclica messenger</h2>
                        <p>Enclica messenger is a open source platform meaning if you find a issue you want to fix you
                            can by changing and sending a pull request.</p>
                        <p>Its free with no catch and with no hidden costs to the service.</p>
                        <p>Upto 1gb per file upload meaning you can send more files.</p>
                        <p>Build your own community, yes you can build your own community for free.</p>
                        <p>Simple and familiar design with animations to look pretty.</p>
                        <a href="msgdownload" class="btn btn-success">Download enclica messenger (autoplatform)</a>

                        <br />
                        <a href="https://github.com/bluethefoxofficial/CreativePublicMessenger"
                            class="n-o btn btn-secondary">Enclica source-code</a>

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
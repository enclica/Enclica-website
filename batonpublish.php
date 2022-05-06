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
                <h1 class="display-5 fw-bold">Publish a baton package
                </h1>
                <p class="col-md-8 fs-4">Enclica BATON (Based Attended Total Online Nextgen package manager)</p>
                <div class="col-md-6">

                <form id="batonpublish" method="post" enctype="multipart/form-data">

                <input type="text" class="form-control" ID="packagename" placeholder="Package name*" />

                <br />

                <input type="text" class="form-control" ID="packagedescription" placeholder="Package description*" />

                <br />

                <input type="text" class="form-control" ID="packageversion" placeholder="Package version*" />

                <br />

                <input type="text" class="form-control" ID="packagelicense" placeholder="Package license*" />

                <br />

                <input type="text" class="form-control" ID="packagelicenseurl" placeholder="Package license url*" />

                <br />

                <!-- package  file -->
                <p>Package file (exe,zip,dmg,rpm,etc)</p>
                <input type="file" class="form-control" ID="packagefile" placeholder="Package file*" />

                <br />

                <input type="text" class="form-control" ID="packagetags" placeholder="Package tags" />

                <br />

                <!-- platform selection -->
                <select class="form-control" id="platform">
                    <option value="">Select platform</option>
                    <option value="windows">Windows</option>
                    <option value="linux">Linux</option>
                    <option value="macos">MacOS</option>
                    <option value="android">Android</option>
                    <option value="any">Any</option>
                </select>

                <br />

                <!-- package type selection -->

                <select class="form-control" id="packagetype">
                    <option value="">Select package type</option>
                    <option value="application">Application</option>
                    <option value="library">Library</option>
                    <option value="theme">Theme</option>
                    <option value="plugin">Plugin</option>
                    <option value="any">Any</option>

                </select>

                <br />

                <!-- package icon -->

                <p>Package icon</p>

                <input type="file" class="form-control" ID="packageicon" placeholder="Package icon" />

                <br />

                <!-- package publish button -->

                <button type="submit" class="btn btn-primary">Publish</button>

                </form>



            </div>
        </div>
    </div>
</div>

<script src="/assets/js/baton.js"></script>
<?php
$isXHR = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtoupper($_SERVER['HTTP_X_REQUESTED_WITH']) === 'XMLHTTPREQUEST';

if (!$isXHR) {

    include dirname(__FILE__) . '/inc/footer.php';
}
?>
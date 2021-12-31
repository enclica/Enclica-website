<?php
$isXHR = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtoupper($_SERVER['HTTP_X_REQUESTED_WITH']) === 'XMLHTTPREQUEST';

if (!$isXHR) {
  $title = 'browse';
  include dirname(__FILE__) . '/inc/header.php';
}
?>
<title>Enclica software UK.</title>
<div
    style="background-repeat: no-repeat; background-attachment: fixed; background-image: url(https://i.picsum.photos/id/866/1920/1080.jpg?hmac=dNBuPEp10RySTqlc5EpGw7QyrFIpBd2X88r1Ixla7pw); background-size: auto;">
    <div class="container">

        <div class="p-5  rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Our software</h1>
                <p class="col-md-8 fs-4">Some of our software is premium and requires you to goto the enclica store.</p>
                <div class="col-md-6">
                    <div class="h-100 p-5">
                        <h2>Excenote</h2>
                        <p>Excenote is a freemium service built for your needs as a business / education.</p>
                        <a href="https://excenote.cf/" class="n-o btn btn-secondary">Access Excenote</a>
                        <h2>Canvs</h2>
                        <p>Canvs is a drwing tool built for artists to draw and express their creative output.</p>
                        <a href="#" disabled class="n-o btn btn-secondary">Access canvs</a>
                        <h2>Enclica Messenger</h2>
                        <p>Enclica messenger is a messaging platform built for everyone to communicate and collaborate.
                        </p>
                        <a href="messenger" disabled class="n-o btn btn-secondary">Access Enclica Messenger</a>
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
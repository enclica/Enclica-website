<?php
$isXHR = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtoupper($_SERVER['HTTP_X_REQUESTED_WITH']) === 'XMLHTTPREQUEST';

if (!$isXHR) {
    $title = 'browse';
    include dirname(__FILE__) . '/inc/header.php';
}
?>
<title>Enclica software UK.</title>
<div style="background-image: url(https://i.picsum.photos/id/866/1920/1080.jpg?hmac=dNBuPEp10RySTqlc5EpGw7QyrFIpBd2X88r1Ixla7pw);   background-attachment: fixed;
  background-position: center;">
    <div class="container">

        <div class="p-5 mb-4  rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Welcome to enclica</h1>
                <p class="col-md-8 fs-4">We are enclica a software company based in the United Kingdom that hopes to
                    provide a good experience for everyone.</p>
                <a href="/about" class="btn btn-primary btn-lg" type="button">learn more</a>
            </div>
        </div>
        <div class="row align-items-md-stretch">

            <div class="col-md-6">
                <div class="h-100 p-5">

                    <h2>Freedom of expression.</h2>
                    <p>We hope to make users feel free to express themselves freely with certain acceptions that can
                        cause harm to our users.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div style="background-color: grey;   background-attachment: fixed;
  background-position: center; height:300px">
    <div class="container">
        <div class="p-5 mb-4  rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">We are Enclica</h1>
            </div>
        </div>
    </div>
</div>
<div style="background-image: url(https://i.picsum.photos/id/731/1920/1080.jpg?hmac=qdpvjpl6tO45PVUVs6QYfkKQhT7kU1msek0zfPKX5uM);   background-attachment: fixed;
  background-position: center;">
    <div class="container">

        <div class="p-5 mb-4  rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Welcome to enclica - the future meets you.</h1>
                <p class="col-md-8 fs-4">We are enclica where we make the future using our own in house tools.</p>
            </div>
        </div>
        <div class="row align-items-md-stretch">

            <div class="col-md-6">
                <div class="h-100 p-5">

                    <h2>all our software is opensource.</h2>
                    <a href="https://github.com/enclica" class="btn btn-primary btn-lg n-o" type="button">Github</a>
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
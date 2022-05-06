<?php
$isXHR = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtoupper($_SERVER['HTTP_X_REQUESTED_WITH']) === 'XMLHTTPREQUEST';

if (!$isXHR) {
    $title = 'browse';
    include dirname(__FILE__) . '/inc/header.php';
}
?>
<title>Enclica software UK.</title>
<div
    style="background-image: url(https://i.picsum.photos/id/475/1920/1080.jpg?hmac=PKbK2DCZLdfZC8is9aIqSZYnB5HxTgS6QvfUJre0Vd4); background-size: auto;   background-repeat: no-repeat; background-attachment: fixed;">
    <div class="container">

        <div class="p-5 pb-4  rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Enclica Music
                </h1>
                <div class="col-md-6">
                    6
                    <div class=" p-5"
                        style="background-color:rgba(255,255,255,0.5); backdrop-filter:blur(10px); box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

                        <h3>Enclica Music Central (BlueFox Records)</h3>
                        <p>Enclica is the owner of bluefox records and here we have sounds and drums for your music
                            producer needs.</p>


                        <p>What is bluefox records?</p>
                        <p>Bluefox records is a subsidiary of enclica software specifically for the music industry.</p>
                        <p>Bluefox records has got a bunch of sounds for you to play with.</p>

                        <h3>Serum Presets</h3>
                        <p>Synthbeat pack.</p>
                        <a class="btn btn-primary" href="http://store.enclica.com/">Buy from the enclica software
                            store.</a>



                        <h3>Roland cloud JUNO-60 presets</h3>
                        <p>Feel the synth</p>
                        <a class="btn btn-primary" href="#">Free download</a>

                        <h3>Our own VSTS</h3>
                        <p>VSTS are a collection of plugins for your music production needs.</p>
                        <p>Elgato</p>
                        <a class="btn btn-primary" href="#">Free download</a>
                        <p>Priverb</p>
                        <a class="btn btn-primary" href="#">Free download</a>
                    </div>
                </div>
            </div>



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
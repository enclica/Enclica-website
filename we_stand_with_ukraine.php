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
            <p>Enclica translated page (ETP)</p>
            <a href="we_stand_with_ukraine-ukt">український переклад.</a>
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">We stand with ukraine &#127482;&#127462;
                </h1>
                <p class="col-md-8 fs-4">Enclica - We have info and support links for ukraians for those in ukraine and others</p>
                <p>Some info on this page might be unsettling for some if you wish to proceed do so with warning. If you with to leave <a href="/">click here</a></p>
                <div class="col-md-6">
                    <div class=" p-5">
                        <h3>What is happening in Ukraine?</h3>
                        <p>We will write an abridged version of events occurring in Ukraine. Our sources are from the news directly please do your own research and dont rely on us we know as much as you.</p>
                        <p>The russian Fedoration anounced it has gone to war on Ukraine at the border. Putin wants to take ukraine as he does not believe ukraine should be a seperate coutry and instead be apart of Russia. We are not going to spread theories but this is what he said.</p>
                        <p>Putin has no right to invade Ukraine but, they have. NATO(The North Atlantic Treaty Organization) has said they will not be deploying troops to Ukraine as Ukraine is not apart of NATO.</p>
                        <h3>Has anyone died in Ukraine because of this war?</h3>
                        <p>Sadly yes people have been killed by Russian military forces. We cant keep track of the death toll. But we give our condolences to the families affected by this crisis.</p>
                        <h3>What is world leaders doing to support Ukraine.</h3>
                        <p>In terms of ukraine just help supply weapons to Ukraine. Russia on the other hand is being hit with sanctions to prevent international trade and affect their economy.</p>


                        <h3>How can i help?</h3>
                        <p>There are things you can do to help Ukranians and that is donate to Ukraine charaties we have provided links to support Ukraine where you can donate.</p>
                        <!-- Razom for Ukraine a tag with the href="https://razomforukraine.org/" -->
                            <p>Razom for Ukraine</p>
                            <a href="https://razomforukraine.org/" class="n-o" target="_blank">
                                <img src="https://razomforukraine.org/wp-content/themes/heartfelt/img/razom_logo_2.png" alt="Razom for Ukraine" width="200">
                            </a>

                            <!-- ICRC charity link -->
                            <p>ICRC</p>
                            <a href="https://www.icrc.org/en/donate/ukraine" class="n-o" target="_blank">
                                <img src="https://www.icrc.org/sites/default/themes/icrc_theme/images/en/logo.png" alt="ICRC" width="100">
                            </a>


                        <p>DISCLAMER: WE ARE NOT ASSOCIATED WITH ANY OF THE CHARITIES ABOVE.</p>


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
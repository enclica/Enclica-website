<?php
$isXHR = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtoupper($_SERVER['HTTP_X_REQUESTED_WITH']) === 'XMLHTTPREQUEST';

if (!$isXHR)
{
	$title = 'browse';
	include dirname(__FILE__) . '/inc/header.php';
}
?>
<title>Enclica software UK.</title>
<div style="background-image: url(https://i.picsum.photos/id/866/1920/1080.jpg?hmac=dNBuPEp10RySTqlc5EpGw7QyrFIpBd2X88r1Ixla7pw); background-size: auto;   background-repeat: no-repeat; background-attachment: fixed;">
<div class="container">

    <div class="p-5  rounded-3">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Our Pivacy Policy</h1>
        <p class="col-md-8 fs-4">We require a privacy policy by law and we made sure we made it clear and concice.</p>
        <div class="col-md-6">
        <div class="p-5">
        <h2>Section 1a - user data.</h2>
        <p>We do not sell any data to third parties. We store data that is required for our services to work correctly like login info, email, etc. We use your email to send reset emails and we never send you info about marketing.</p>
        <p>If requested we will hand any data that we can obtain from a user using our services to the authories, if they have a correct warrant and or can present the warrant.</p>
        <h2>Section 1b - user timestamping.</h2>
        <p>We do timestamp specific timings for example in enclica mesenger we store your time you last performed a heartbeat(Sending a request to the server every x seconds.) but this is no corelated to any specific action you perform.</p>
        <p>We also timestamp the date of your account creation on furryfan, excenote, enclica, etc for information on the most user accounts for anonymous statsitics which are not linked to a particular user account.</p>

        </div>
      </div>
      </div>
    </div>
  </div>
</div>
<?php 
$isXHR = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtoupper($_SERVER['HTTP_X_REQUESTED_WITH']) === 'XMLHTTPREQUEST';

if (!$isXHR)
{

include dirname(__FILE__) . '/inc/footer.php';
}
?>
<?php
$isXHR = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtoupper($_SERVER['HTTP_X_REQUESTED_WITH']) === 'XMLHTTPREQUEST';

if (!$isXHR)
{
	$title = 'browse';
	include dirname(__FILE__) . '/inc/header.php';
}
?>
<title>Enclica software UK.</title>
<div style=" background-size: auto; background-image: url('https://i.picsum.photos/id/385/1920/1080.jpg?hmac=cPvxEBKaH4ZB2q4yMIcq0iEklhFe-CLy0UUaO7J1ZOY');   background-repeat: no-repeat; background-attachment: fixed;">
<div class="container">

    <div class="p-5 rounded-3">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Enclica software - Enclica HUB</h1>
        <p class="col-md-8 fs-4">The main software manager for all commercial applications.</p>
        <div class="col-md-6">
        <div class="p-5">
        <h2>What does enclica hub do?</h2>
        <p>enclica hub helps manage all your commercial applications.</p>
        <p>A enclica account is required for this.</p>
        <h2></h2>

        <h2>Download.</h2>
          <p>Enclica hub.</p>
          <a class="btn btn-success n-o" href="/dl/enclicahub-86-64x.exe">Download windows x86-64</a><br/><br/>
          <a class="btn btn-success n-o" href="/dl/enclicahub-86-64x.tar.gz">Download Linux .tar.gz x86-65.</a>



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
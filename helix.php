<?php
$isXHR = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtoupper($_SERVER['HTTP_X_REQUESTED_WITH']) === 'XMLHTTPREQUEST';

if (!$isXHR)
{
	$title = 'browse';
	include dirname(__FILE__) . '/inc/header.php';
}
?>
<title>Enclica software UK.</title>
<div style=" background-size: auto;   background-repeat: no-repeat;">
<div class="container">

    <div class="p-5 mb-4  rounded-3">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Enclica software - Helix</h1>
        <p class="col-md-8 fs-4">The game engine for modern 3D and 2D games without a paywall.</p>
        <div class="col-md-6">
        <div class="h-100 p-5">
        <h2>What does Helix do?</h2>
        <p>Helix is a game engine built for games of the modern age.</p>
        <p>.</p>
        <h2>Download helix SDK source.</h2>
        <h2>Helix SDK</h2>
          <p>Helix SDK</p>
          <a href="#" class="btn btn-info">Download Helix SDK installer.</a>
          <h2>Helix SDK source beta</h2>
          <p>Helix SDK B1.0</p>
          <a href="#" class="btn btn-info">Download Helix SDK installer.</a>
        <h2>Helix 2D</h2>
        <p>Helix SDK 2D</p>
          <a href="#" class="btn btn-info">Download Helix SDK installer 2D.</a>
          <h2>Helix SDK source beta</h2>
          <p>Helix SDK B1.0</p>
          <a href="#" class="btn btn-info">Download Helix SDK installer 2D.</a>
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
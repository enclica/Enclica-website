<?php
$isXHR = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtoupper($_SERVER['HTTP_X_REQUESTED_WITH']) === 'XMLHTTPREQUEST';

if (!$isXHR)
{
	$title = 'CWD lts';
	include dirname(__FILE__) . '/inc/header.php';
}
?>
<title>Enclica software UK.</title>
<div style=" background-size: auto;   background-repeat: no-repeat;">
<div class="container">

    <div class="p-5 mb-4  rounded-3">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Enclica software - CWD LTS (Legacy)</h1>
        <p class="col-md-8 fs-4">CWD is outdated and being replaced with EWD but here is the LTS for enterprises that need CWD.</p>
        <div class="col-md-6">
        <div class="h-100 p-5">
        <h2>What is CWD.</h2>
        <p>CWD is the now outdated name for the program EWD which.</p>
        <h2>Why offer LTS (Long Term Support) for CWD?</h2>
        <p>Mainly because CWD is still used by many businesses.</p>
        <h3>Download CWD LTS</h3>
        <p>CWD is a IDE for building websites or web based applications with debugging functionality.</p>
        <a class="btn btn-success n-o" href="/dl/cwd/lts/cwd_lts.exe" target="_blank">Download latest version of CWD LTS.</a>
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
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

    <div class="p-5  rounded-3">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Enclica software - Eling</h1>
        <p class="col-md-8 fs-4">Eling the universal programming language.</p>
        <div class="col-md-6">
        <div class="h-100 p-5">
        <h2>What can Baton install.</h2>
        <p>Baton can install local programs and packages using the command line.</p>
        <p>Baton can install the following:</p>
        <p>Windows/linux/mac programs.</p>
        <p>Dev packages.</p>
        <h>How do i publish a package?</h2>
        <p>Baton can publish a package to the database via our online uploader or local command line tool.</p>
        <p>To publish a package to the database via the online uploader:</p>
        <p>goto <a href="/batonpublish">Baton publisher</a></p>
        <p>To publish a package to the database via the CLI uploader:</p>
        <p>goto baton console and type <code>baton-console init -y</code> to initiliaze the package with default parameters.</p>
        <p>this will generate a package.baton file for configuration.</p>
        <p>goto baton console and type <code>baton-console publish</code> to publish the package to the database.</p>


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
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
        <h2>What can newton install.</h2>
        <p>Newton can install local programs and packages using the command line.</p>
        <p>newton can install the following:</p>
        <p>Newton extentions.</p>
        <p>Windows programs.</p>
        <p>Dev packages.</p>
        <h2>What is the local database?</h2>
        <p>the local database is a list of all the packages and their dedicated installer servers if you wish to update this do <code>newton -u</code> this would be done when you first install a package/program.</p>
        

        <h2>Download Eling compiler for newton.</h2>
          <p>CWD is a IDE for building websites or web based applications with debugging functionality.</p>
          <a class="btn btn-success n-o" href="https://github.com/enclica/CWD-creative-web-develop">Download latest version of newton.</a>



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
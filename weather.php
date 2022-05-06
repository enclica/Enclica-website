<?php
$isXHR = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtoupper($_SERVER['HTTP_X_REQUESTED_WITH']) === 'XMLHTTPREQUEST';

if (!$isXHR)
{
	$title = 'browse';
	include dirname(__FILE__) . '/inc/header.php';
}
?>
<title>Enclica software UK.</title>
<style>
  /* animated spinner */
  .spinner {
    margin: 100px auto;
    width: 50px;
    height: 40px;
    text-align: center;
    font-size: 10px;
  }


</style>
<div id="weatherbg" style=" background-size: auto;   background-repeat: no-repeat; background-attachment: fixed;">
<div class="container">


    <div class="p-5  rounded-3">
      <div class="container-fluid py-5">
        <h1 class="display-5 fw-bold">Enclica software - Weather Report</h1>
        <p class="col-md-8 fs-4">Enclica weather report.</p>
        <div class="col-md-6">
        <div class="h-100 p-5 card">
        <div class="spinner-border center" style="    margin-left: auto;
    margin-right: auto;" role="status" id="status">
        <span class="visually-hidden">Loading...</span>
        </div>
            <div id="weather-data">
        <h1 id="temp"></h1>
        <h2 id="currentconditions"></h2>
        <h4 id="location"></h4>
        <img id="icon" width="60px"></img>
            </div>
        </div>
      </div>
      </div>
    </div>
  </div>
</div>
<script src="/assets/js/weather.js" async defer></script>
<?php 
$isXHR = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtoupper($_SERVER['HTTP_X_REQUESTED_WITH']) === 'XMLHTTPREQUEST';

if (!$isXHR)
{

include dirname(__FILE__) . '/inc/footer.php';
}
?>
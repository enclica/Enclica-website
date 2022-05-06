<?php
$isXHR = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtoupper($_SERVER['HTTP_X_REQUESTED_WITH']) === 'XMLHTTPREQUEST';

if (!$isXHR) {
    $title = 'browse';
    include dirname(__FILE__) . '/inc/header.php';
}
?>
<title>Enclica software UK.</title>
<div style=" background-size: auto;   background-repeat: no-repeat;">
    <div class="container">

        <div class="p-5 mb-4  rounded-3">
            <div class="container-fluid py-5 card">
                <h1 class="display-5 fw-bold">Enclica software - Elgato design</h1>
                <p class="col-md-8 fs-4">Elgato is enclica software design style built from bootstrap.</p>
                <div class="col-md-6">
                    <div class="h-100 p-5">


                        <h2>elgato guidelines.</h2>

                        <p style="color: red !important;">NOTE: This is mainly describing the bootstrap based guidelines
                            each
                            enclica app follows similar standards but for different versions. Below is a list of enclica
                            software and the elgato versions.</p>

                        <p>Enclica software - Bootstrap v5.0.0 + Elgato bootstyle 2.10.0</p><br />
                        <p>Enclica messenger - Elgato origstyle 1.10.0</p><br />
                        <p>Canvs - Elgato plainstyle 1.10.0</p><br />




                        <h3>Back-filter and card color</h3>


                        <p>Elgato must have frosted glass styling for primary foreground elements.(this does not work on
                            Firefox)</p>

                        <p>elgato foreground elements must have a rgba value of R: 255 G: 255 B: 255 A: 0.5-0.9</p>

                        <p>Image example</p>

                        <img src="https://enclica.com/assets/img/design/elgato-standard-1.png" width="100%">


                        <h3>Button color and visuals</h3>

                        <p>Elgato uses the main colours in the bootstrap css library and instead of blue for primary it
                            uses black and white.</p>

                        <p>Border and hover actions dont matter for the standard for example for enclica messenger
                            hovering makes the button more transparent and darker when clicked while here the button has
                            a large transparent border and when clicked acts like bootstrap</p>

                        <p>Button example</p>
                        <button class="btn btn-primary">Primary</button>
                        <button class="btn btn-secondary">Secondary</button>
                        <button class="btn btn-success">Success</button>

                        <p>Button code sample</p>
                        <code>
<xmp style="padding: 10px;    overflow: auto; resize: both; color: white; border-radius: 5px; background-color: rgba(100,100,100,1); width: 100%; white-space: pre-wrap">
<button class="btn btn-primary">Primary</button>
<button class="btn btn-secondary">Secondary</button>
<button class="btn btn-success">Success</button>
</xmp>
</code>


                        <h3>Navigation</h3>

                        <p>Elgato uses the bootstrap 5 navbar and navbar links are the same as bootstrap 5 except in
                            enclica messenger.</p>

                        <p>Navbar example (elgato bootstrap example)</p>

                        <nav class="navbar navbar-expand-lg navbar-light bg-light">
                        <div class="container-fluid">
                        <a class="navbar-brand" href="#">Elgato</a>
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                        <div class="navbar-nav">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                        <a class="nav-link" href="#">Features</a>
                        <a class="nav-link" href="#">Pricing</a>
                        <a class="nav-link disabled">Disabled</a>
                        </div>
                        </div>
                        </div>
                        </nav>

                        <p>Navbar code: bootstrap</p>
<code>
<xmp style="padding: 10px; color: white;   overflow: auto;  resize: both; border-radius: 5px; background-color: rgba(100,100,100,1); width: 100%; white-space: pre-wrap">
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Elgato</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
      <div class="navbar-nav">
        <a class="nav-link active" aria-current="page" href="#">Home</a>
        <a class="nav-link" href="#">Features</a>
        <a class="nav-link" href="#">Pricing</a>
        <a class="nav-link disabled">Disabled</a>
      </div>
    </div>
  </div>
</nav>

</xmp>
</code>



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
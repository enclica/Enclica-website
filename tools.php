<?php
$isXHR = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtoupper($_SERVER['HTTP_X_REQUESTED_WITH']) === 'XMLHTTPREQUEST';

if (!$isXHR) {
  $title = 'browse';
  include dirname(__FILE__) . '/inc/header.php';
}
?>
<title>Enclica software UK.</title>
<div
    style="background-image: url(https://i.picsum.photos/id/1055/5472/3648.jpg?hmac=1c293cGVlNouNQsjxT8y3nsYO-7qLCaOBEGvih0ibEU); background-size: auto;   background-repeat: no-repeat; background-attachment: fixed;">
    <div class="container">

        <div class="p-5 pb-4  rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Developer solutions
                </h1>
                <p class="col-md-8 fs-4">These tools are great for hobby and indie developers.</p>
                <div class="col-md-6">
                    <div class=" p-5">
                       <h3>Open canvas</h3>
                        <p>Open-canvas, an opensource fork of our canvas tool in excenote </p><p><a class="n-o" href="https://github.com/enclica/Open-canvas">Github link</a></p><p><a class="n-o" href="https://www.enclica.com/demos/opencanvas/">Open-canvas demo</a></p>
                        <p>LEGAL: Open canvas uses MDB and JQUERY for both js and styling all rights are reserved for those 2 libaries.</p>
                       <h3>SUGAR (SiB) (LEGACY)</h3>
                       <p>Sugar is a art sharing network with upload, delete, age check and more.</p>
                          <p><a class="n-o" href="https://www.enclica.com/demos/sugar/">Sugar demo</a></p>
                          <P><a class="n-o" href="https://github.com/bluethefoxofficial/Sugar">
                            Sugar Github</a></P>
                          


                       </p>
                </div>


                <h1 class="display-5 fw-bold">Enterprise Solutions</h1>
                <p class="col-md-8 fs-4">Enterprise solutions for developers in a enterprise enviroment.</p>
                <p class="col-md-8 fs-4">As this is enterprise grade you will have to pay.</p>
                <div class="col-md-6">
                <div class="p-5">
                        <h2>Coming soon...</h2>
                        <p>Dynamic PHP page, a dynamic page that can be made for purpose flexibility, customization, simplicity.</p>
                        <p>Inventory manager, Manage your inventory easily with scanners or manual input through a server.</p>
                    </div>

                    <div class="p-5">
                        <h2>Demo's...</h2>
                        <p>EWD (Enclica web design) is a tool used for designing and building websites for production this tool is in alpha but from this we have a short demo for you.</p>
                        <p>This demo has many features missing or inaccessible in the demo as this is mainly to help people from CWD transition to EWD.</p>
                        <p><a href="https://www.enclica.com/ewd-page">EWD page</a></p>
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
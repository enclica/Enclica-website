<?php
$isXHR = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtoupper($_SERVER['HTTP_X_REQUESTED_WITH']) === 'XMLHTTPREQUEST';

if (!$isXHR) {
    $title = 'browse';
    include dirname(__FILE__) . '/inc/header.php';
}
?>
<title>Enclica software UK.</title>
<div style="background-image: url(https://i.picsum.photos/id/1068/1920/1080.jpg?hmac=BBujBk5W9_4CApRfYjKsS7qHc9HhqeN8aPdTj35GmvY); background-size: auto;   background-repeat: no-repeat; background-attachment: fixed;
  background-position: center;">
    <div class="container">

        <div class="p-5 rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">About Enclica software upcycling and referbishment programme</h1>
                <p class="col-md-8 fs-4"></p>
                <div class="col-md-6">
                    <div class="h-99 p-5">

                        <h2>What is it?</h2>
                        <p>Enclica Software, hoping to save the enviromental impact by reusing old machines by fixing
                            them up and selling on these pcs are coming from individuals and businesses across the UK as
                            donations.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="background-color: grey;   background-attachment: fixed;
  background-position: center; height:300px">
    <div class="container">
        <div class="p-5  rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">What is your process for upcycling.</h1>
            </div>
        </div>
    </div>
</div>
<div style="background-image: url(https://i.picsum.photos/id/477/1920/1080.jpg?hmac=8V4fJHSP89AfrwJxObukCzN7UvUriZ6QbXAC6lL-zDs); background-size: auto;   background-repeat: no-repeat; background-attachment: fixed;
  background-position: center;">
    <div class="container">

        <div class="p-5  rounded-3">
            <div class="container-fluid py-5">
                <div class="col-md-6">
                    <div class=" p-5">
                        <h2>Stages 1-3</h2>
                        <p>Stage 1 consists of retreiving the pcs from individuals and businesses by either requesting
                            them directly or
                            they contact us either by social media or through our website.</p>
                        <p>Stage 2 consists of diagnosing the pcs to see if there are any issues we dont touch any data
                            in this step as were mearly seeing if the system boots.</p>
                        <p>Stage 3 consists of erasing any data from the harddrives/ssds.</p>
                        <h2>Stages 4-6</h2>
                        <p>stage 4 consists of fixing any hardware issues in the pc discovered by the diagnostics.</p>
                        <p>stage 5 consists of going through a checklist of issues and seeing if there are any problems
                            further on.</p>
                        <p>stage 6 consists of putting them up on market places and selling on to other
                            people/businesses</p>
                        <h3>What happens if the pc cant be fixed?</h3>
                        <p>If the pc cant be fixed we will salvage any parts we can and recycle the rest at an
                            appropriate recycling facility.</p>
                        <p>Some things cant be put into recycling facilities so we turn them into art.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="background-color: grey;   background-attachment: fixed;
  background-position: center; height:300px">
    <div class="container">
        <div class="p-5  rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">What we accept.</h1>
            </div>
        </div>
    </div>
</div>
<div style="background-image: url(https://i.picsum.photos/id/485/1920/1080.jpg?hmac=o22v7VwPC2dDWI5sS7-jQvMd9OdzCVwcmDdBGRRVZDU); background-size: auto;   background-repeat: no-repeat; background-attachment: fixed;
  background-position: center;">
    <div class="container">

        <div class="p-5  rounded-3">
            <div class="container-fluid py-5">
                <div class="col-md-6">
                    <div class=" p-5">
                        <h3>We accept the following:</h3>
                        <ul>
                            <li>All computers</li>
                            <li>All laptops</li>
                            <li>All desktops</li>
                            <li>All servers</li>
                            <li>All mobile devices</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div style="background-color: grey;   background-attachment: fixed;
  background-position: center; height:300px">
    <div class="container">
        <div class="p-5  rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Join or donate.</h1>
            </div>
        </div>
    </div>
</div>
<div style="background-image: url(https://i.picsum.photos/id/865/1920/1080.jpg?hmac=6r3QuP0fPQ_Ydr1L68QjchpBzZ7n5IKmrL9PPMH65YA); background-size: auto;   background-repeat: no-repeat; background-attachment: fixed;
  background-position: center;">
    <div class="container">

        <div class="p-5  rounded-3">
            <div class="container-fluid py-5">
                <div class="col-md-6">
                    <div class=" p-5">

                        <h2>how do i join the upcycling programme?</h2>
                        <p>We are always looking for people to join the upcycling programme. If you are interested
                            in joining please contact us on our social media accounts or email upcyling@enclica.com.</p>

                        <h3>Have a pc you are willing to donate?</h3>
                        <p>n/a</p>
                      <br /><br />

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
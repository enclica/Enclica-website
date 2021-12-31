<?php
$isXHR = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtoupper($_SERVER['HTTP_X_REQUESTED_WITH']) === 'XMLHTTPREQUEST';

if (!$isXHR) {
    $title = 'login';
    include dirname(__FILE__) . '/inc/header.php';
}
?>
<title>Enclica software UK.</title>
<div
    style="background-image: url(https://i.picsum.photos/id/1055/5472/3648.jpg?hmac=1c293cGVlNouNQsjxT8y3nsYO-7qLCaOBEGvih0ibEU); background-size: auto;   background-repeat: no-repeat; background-attachment: fixed;">
    <div class="container">

        <div class="p-5 pb-4  rounded-3">
            <div class="container-fluid py-5">
                <h1 class="display-5 fw-bold">Downloading enclica messenger</h1>
                </h1>
                <p class="col-md-8 fs-4"></p>
                <div class="col-md-6">
                    <div class=" p-5">
                        <h3>Downloading enclica messenger for <span id="os">UNKNOWN OS</span></h3>
                        <P>If your download hasnt started please click one of the options below.</P>
                        <br />
                        <a class="n-o" style="cursor: pointer;" onclick="downloadwin();">Download for windows</a><br />
                        <a class="n-o" style="cursor: pointer;" onclick="downloadmac();">Download for mac</a><br />
                        <a class="n-o" style="cursor: pointer;" onclick="downloadlin();">Download for linux.</a><br />
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="frameDiv" style="display: none;"></div>
<script>
var v = "3.0.0";
var os = navigator.platform;
var noticetext =
    "This version of enclica only supports windows and even then only supports win32 (and windows 64) this does not include Macos, Linux or android.";

function downloadwin() {
    var htm = '<iframe src="' + `/dl/messenger/${v}/enclica Setup ${v}.exe` + '" onload="downloadComplete()"></iframe>';
    document.getElementById('frameDiv').innerHTML = htm;
    document.getElementById('os').innerHTML = 'Windows';
}

function downloadlin() {
    var htm = '<iframe src="' + `/dl/messenger/${v}/enclica Setup ${v}.deb` + '" onload="downloadComplete()"></iframe>';
    document.getElementById('frameDiv').innerHTML = htm;
    document.getElementById('os').innerHTML = 'Linux';
}

function downloadmac() {
    var htm = '<iframe src="' + `/dl/messenger/${v}/enclica Setup Darwin${v}.zip` +
        '" onload="downloadComplete()"></iframe>';
    document.getElementById('frameDiv').innerHTML = htm;
    document.getElementById('os').innerHTML = 'Mac os';
}

switch (os) {
    case "Win32":
        downloadwin();
        break;
    case "Linux":
        downloadlin();
        break;
    case "MacIntel":
        downloadmac()
        break;

}
</script>
<?php
$isXHR = isset($_SERVER['HTTP_X_REQUESTED_WITH']) && strtoupper($_SERVER['HTTP_X_REQUESTED_WITH']) === 'XMLHTTPREQUEST';

if (!$isXHR) {

    include dirname(__FILE__) . '/inc/footer.php';
}
?>
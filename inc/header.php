<html>

<head>
    <?php include dirname(__FILE__) . "/head.php";
    if ($_SERVER["HTTPS"] != "on") {
        header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
        exit();
    } ?>





    <script src="/assets/js/purecookie.js"></script>


    <script src="https://redirectrussia.org/v1.js" data-detection="ip-only" async integrity="sha384-7eCSZggA5dvBgailUQh//+IinV8dfWf7/6yuq6jzyBq6zc5/N0g5UASeuPfxAUx8" crossorigin="anonymous"></script>
<script>


</script>

    <style>
    .fixed-top {
        top: -40px;
        transform: translateY(40px);
        transition: transform .3s;
        backdrop-filter: blur(10px);
        background-color: rgba(255, 255, 255, 0.5);
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
    }

    .fixed-top::before{
        filter: blur(20px);
        z-index: -1;
    }

    .card {
        background-color: rgba(255, 255, 255, 0.5);
        backdrop-filter: blur(10px) !important;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19) !important;
    }
    </style>

    <nav id="navbar_top" class="navbar navbar-expand-lg navbar-light">
        <div class="container-fluid">
            <a class="navbar-brand" id="logo" href="/"><img src="../assets/img/logoset/Layout_trans_ty.png"
                    style="width: 90px;" /></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="/about">About Enclica</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/software">software</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/tools">Dev tools</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link n-o" href="https://store.enclica.com/">Enclica software store</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/we_stand_with_ukraine">we stand with &#127482;&#127462;</a>
                    </li>


                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle n-o" href="#" id="login-mnu" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            UNKNOWN VAL
                        </a>
                        <ul class="dropdown-menu" id="login-menu" aria-labelledby="login">

                        </ul>
                    </li>
            </div>
        </div>
    </nav>
</head>
<div id="application">
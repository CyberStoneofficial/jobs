<?php
require_once realpath("vendor/autoload.php");
use Job_Portal\Job;
$portal = new Job();

if(isset($_COOKIE['type'])) {
    echo $_COOKIE['type'];
}

if(isset($_POST['logout'])) {
    echo $portal->Logout();
}
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Basic Page Needs
    ================================================== -->
    <title>Job Stock - Responsive Job Portal Bootstrap Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <!-- CSS
    ================================================== -->
    <link rel="stylesheet" href="assets/plugins/css/plugins.css">

    <!-- Custom style -->
    <link href="assets/css/style.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" id="jssDefault" href="assets/css/colors/green-style.css">

</head>
<body class="simple-bg-screen" style="background-image:url(assets/img/banner-10.jpg);">
<div class="Loader"></div>
<div class="wrapper">

    <!-- Title Header Start -->
    <section class="login-screen-sec">
        <div class="container">


            <form method="post" action="job_user_profile.php">
                <div class="mng-resume">
                    <div class="col-md-2 col-sm-2">
                        <div class="mng-resume-pic">
                            <img src="assets/img/client-1.jpg" class="img-responsive" alt="">
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3">
                        <div class="mng-resume-name">
                            <h4>
                            
                            <?php

                            if(isset($_GET['who'])) {
                                $who = $_GET['who'];
                                echo $portal->getUsersProfile($who)->email;
                            }

                            ?> 
                                
                            <span class="cand-designation">(Web Developer)</span></h4>
                            <span class="cand-status">
                                <input type="submit" name="logout" value="Logout">
                            </span>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-3">
                        <div class="mng-resume-name">
                            <h4><?php echo $portal->getUsersProfile($who)->username; ?><span class="cand-designation">(Web Developer)</span></h4>
                            <span class="cand-status">asdasasdasd</span>
                        </div>
                    </div>

                   


            </form>
        </div>
</div>
</section>
<button class="w3-button w3-teal w3-xlarge w3-right" onclick="openRightMenu()"><i class="spin fa fa-cog" aria-hidden="true"></i></button>
<div class="w3-sidebar w3-bar-block w3-card-2 w3-animate-right" style="display:none;right:0;" id="rightMenu">
    <button onclick="closeRightMenu()" class="w3-bar-item w3-button w3-large">Close &times;</button>
    <ul id="styleOptions" title="switch styling">
        <li>
            <a href="javascript: void(0)" class="cl-box blue" data-theme="colors/blue-style"></a>
        </li>
        <li>
            <a href="javascript: void(0)" class="cl-box red" data-theme="colors/red-style"></a>
        </li>
        <li>
            <a href="javascript: void(0)" class="cl-box purple" data-theme="colors/purple-style"></a>
        </li>
        <li>
            <a href="javascript: void(0)" class="cl-box green" data-theme="colors/green-style"></a>
        </li>
        <li>
            <a href="javascript: void(0)" class="cl-box dark-red" data-theme="colors/dark-red-style"></a>
        </li>
        <li>
            <a href="javascript: void(0)" class="cl-box orange" data-theme="colors/orange-style"></a>
        </li>
        <li>
            <a href="javascript: void(0)" class="cl-box sea-blue" data-theme="colors/sea-blue-style "></a>
        </li>
        <li>
            <a href="javascript: void(0)" class="cl-box pink" data-theme="colors/pink-style"></a>
        </li>
    </ul>
</div>

<!-- Scripts
================================================== -->
<script type="text/javascript" src="assets/plugins/js/jquery.min.js"></script>
<script type="text/javascript" src="assets/plugins/js/viewportchecker.js"></script>
<script type="text/javascript" src="assets/plugins/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/plugins/js/bootsnav.js"></script>
<script type="text/javascript" src="assets/plugins/js/select2.min.js"></script>
<script type="text/javascript" src="assets/plugins/js/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="assets/plugins/js/bootstrap-wysihtml5.js"></script>
<script type="text/javascript" src="assets/plugins/js/datedropper.min.js"></script>
<script type="text/javascript" src="assets/plugins/js/dropzone.js"></script>
<script type="text/javascript" src="assets/plugins/js/loader.js"></script>
<script type="text/javascript" src="assets/plugins/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="assets/plugins/js/slick.min.js"></script>
<script type="text/javascript" src="assets/plugins/js/gmap3.min.js"></script>
<script type="text/javascript" src="assets/plugins/js/jquery.easy-autocomplete.min.js"></script>

<!-- Custom Js -->
<script src="assets/js/custom.js"></script>
<script src="assets/js/jQuery.style.switcher.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#styleOptions').styleSwitcher();
    });
</script>
<script>
    function openRightMenu() {
        document.getElementById("rightMenu").style.display = "block";
    }

    function closeRightMenu() {
        document.getElementById("rightMenu").style.display = "none";
    }
</script>
</div>
</body>

<!-- login35:58-->
</html>

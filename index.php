<?php 
require_once realpath("vendor/autoload.php");
use Job_Portal\Job;
$portal = new Job();

if(isset($_GET['category']) && isset($_GET['city']))
{
    $cities = $_GET['city'];
    $categories = $_GET['category'];

    $jobs_portal = $portal->getByCities($cities);
    $jobs_portal = $portal->getByCategory($categories);
   
} else {
    $jobs_portal = $portal->getAllJobs();
}

if(isset($_POST['login'])){
    $data = array();
    $data['email'] = $_POST['email'];
    $data['password'] = $_POST['password'];
    if($portal->getLogin($data)){
        echo $_COOKIE['type'];
    }
}


if(isset($_POST['signup'])){
    $data = array();
    $data['name'] = $_POST['name'];
    $data['email'] = $_POST['email'];
    $data['username'] = $_POST['username'];
    $data['password'] = $_POST['password'];
    $data['confirm_password'] = $_POST['confirm_password'];

    if($portal->create_register($data)){
        $_SESSION['success'] = "CONFIRMED";
    } else {
        $_SESSION['status'] = "DONT CONFIRMED";
    }
}
?>

<!doctype html>
<html lang="en">

<head>
    <!-- Basic Page Needs==================================================-->
    <title>Job Stock - Responsive Job Portal Bootstrap Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <!-- CSS==================================================-->
    <link rel="stylesheet" href="assets/plugins/css/plugins.css">
    <link href="assets/css/style.css" rel="stylesheet">
    <link type="text/css" rel="stylesheet" id="jssDefault" href="assets/css/colors/green-style.css">
</head>
<body>
<div class="Loader"></div>
<div class="wrapper">
    <nav class="navbar navbar-default navbar-fixed navbar-transparent white bootsnav">
        <div class="container">

            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-menu"><i
                    class="fa fa-bars"></i></button>
            <div class="navbar-header"><a class="navbar-brand" href="index.php"><img src="assets/img/logo-white.png"
                                                                                     class="logo logo-display"
                                                                                     alt=""><img
                        src="assets/img/logo-white.png" class="logo logo-scrolled" alt=""></a></div>
            <div class="collapse navbar-collapse" id="navbar-menu">
                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                    <li><a href="login.html"><i class="fa fa-pencil" aria-hidden="true"></i>SignUp</a></li>
                    <li><a href="job_user_profile.php"><i class="fa fa-sign-in" aria-hidden="true"></i>My Profile</a></li>
                    <li class="left-br"><a href="javascript:void(0)" data-toggle="modal" data-target="#signup"
                                           class="signin">Sign In Now</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right" data-in="fadeInDown" data-out="fadeOutUp">
                    <li class="dropdown megamenu-fw">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Brows</a>
                        <ul class="dropdown-menu megamenu-content" role="menu">
                            <li>
                                <div class="row">
                                    <div class="col-menu col-md-3">
                                        <h6 class="title">Main Pages</h6>

                                        <!-- <div class="content">
                                            <ul class="menu-col">
                                                <li><a href="index-2.html">Home Page 1</a></li>
                                                <li><a href="index-3.html">Home Page 2</a></li>
                                                <li><a href="index-4.html">Home Page 3</a></li>
                                                <li><a href="index-5.html">Home Page 4</a></li>
                                                <li><a href="index-6.html">Home Page 5</a></li>
                                                <li><a href="freelancing.html">Freelancing</a></li>
                                                <li><a href="signin-signup.html">Sign In / Sign Up</a></li>
                                                <li><a href="search-job.html">Search Job</a></li>
                                                <li><a href="accordion.html">Accordion</a></li>
                                                <li><a href="tab.html">Tab Style</a></li>
                                            </ul>
                                        </div> -->
                                    </div>
                                    <div class="col-menu col-md-3">
                                        <h6 class="title">For Candidate</h6>

                                        <!-- <div class="content">
                                            <ul class="menu-col">
                                                <li><a href="browse-jobs.html">Browse Jobs</a></li>
                                                <li><a href="browse-company.html">Browse Companies</a></li>
                                                <li><a href="create-resume.html">Create Resume</a></li>
                                                <li><a href="resume-detail.html">Resume Detail</a></li>
                                                <li><a href="#">Manage Jobs</a></li>
                                                <li><a href="job-detail.html">Job Detail</a></li>
                                                <li><a href="browse-jobs-grid.html">Job In Grid</a></li>
                                                <li><a href="candidate-profile.html">Candidate Profile</a></li>
                                                <li><a href="manage-resume-2.html">Manage Resume 2</a></li>
                                                <li><a href="company-detail.html">Company Detail</a></li>
                                            </ul>
                                        </div> -->
                                    </div>
                                    <div class="col-menu col-md-3">
                                        <h6 class="title">For Employer</h6>

                                        <div class="content">

                                            <ul class="menu-col">
                                                <li>
                                                    <a href="
                                                    <?php
                                                    if(isset($_COOKIE['type']))  { echo 'job_create.php'; }
                                                    if(!isset($_COOKIE['type'])) { echo 'job_login.php'; }
                                                    ?>
                                                    "> Create Job</a>
                                                </li>

                                                <li>
                                                    <a href="
                                                    <?php
                                                    if(isset($_COOKIE['type']))  { echo 'job_create_company.php'; }
                                                    if(!isset($_COOKIE['type'])) { echo 'job_login.php'; }
                                                    ?>
                                                    "> Create Company</a>
                                                </li>
                                                <!--                                                <li><a href="create-company.html">Create Company</a></li>-->
                                                <!--                                                <li><a href="manage-company.html">Manage Company</a></li>-->
                                                <!--                                                <li><a href="manage-candidate.html">Manage Candidate</a></li>-->
                                                <!--                                                <li><a href="manage-employee.html">Manage Employee</a></li>-->
                                                <!--                                                <li><a href="browse-resume.html">Browse Resume</a></li>-->
                                                <!--                                                <li><a href="search-new.html">New Search Job</a></li>-->
                                                <!--                                                <li><a href="employer-profile.html">Employer Profile</a></li>-->
                                                <!--                                                <li><a href="manage-resume.html">Manage Resume</a></li>-->
                                                <!--                                                <li><a href="new-job-detail.html">New Job Detail</a></li>-->
                                            </ul>
                                        </div>


                                    </div>
                                    <div class="col-menu col-md-3">
                                        <h6 class="title">Extra Pages <span class="new-offer">New</span></h6>

                                        <!-- <div class="content">
                                            <ul class="menu-col">
                                                <li><a href="freelancer-detail.html">Freelancer detail</a></li>
                                                <li><a href="job-apply-detail.html">New Apply Job</a></li>
                                                <li><a href="payment-methode.html">Payment Methode</a></li>
                                                <li><a href="new-login-signup.html">New LogIn / SignUp</a></li>
                                                <li><a href="freelancing-jobs.html">Freelancing Jobs</a></li>
                                                <li><a href="freelancers.html">Freelancers</a></li>
                                                <li><a href="freelancers-2.html">Freelancers 2</a></li>
                                                <li><a href="premium-candidate.html">Premium Candidate</a></li>
                                                <li><a href="premium-candidate-detail.html">Premium Candidate Detail</a>
                                                </li>
                                                <li><a href="blog-detail.html">Blog detail</a></li>
                                            </ul>
                                        </div> -->

                                    </div>
                                </div>

                            </li>
                        </ul>
                    </li>
                    <li><a href="blog.html">Blog</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="clearfix"></div>
    <div class="banner" style="background-image:url(assets/img/banner-9.jpg);">
        <div class="container">
            <div class="banner-caption">
                <div class="col-md-12 col-sm-12 banner-text">
                    <h1>Welcome To Grand Master</h1>
                    <?php

                    if(isset($_SESSION['success']) && $_SESSION['success'] != '')
                    {
                        echo '<h2 class = "btn btn-success"> ' . $_SESSION['success'] . ' </h2>';
                        unset($_SESSION['success']);
                    }

                    if(isset($_SESSION['status']) && $_SESSION['status'] != '')
                    {
                        echo '<h2 class = "btn btn-danger"> ' . $_SESSION['status'] . ' </h2>';
                        unset($_SESSION['status']);
                    }

                    ?>

                    <form method="get" action="index.php" class="form-horizontal">
                        <div class="col-md-3 no-padd">
                            <div class="input-group">
                                <select id="choose-job" name="category" class="form-control">
                                    <option value="0">Choose Category</option>
                                    <?php foreach($portal->getCategories() as $category): ?>
                                        <option value="<?php echo $category->id; ?>"><?php echo $category->name; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 no-padd">
                            <div class="input-group">
                                <select name="city" class="form-control">
                                    <option value="0">Choose City</option>
                                    <?php foreach($portal->getCities() as $city): ?>
                                        <option value="<?php echo $city->id; ?>"><?php echo $city->city; ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <!--                        <div class="col-md-3 no-padd">-->
                        <!--                            <div class="input-group">-->
                        <!--                                <select id="choose-category" class="form-control">-->
                        <!--                                    <option>ყველა კატეგორია</option>-->
                        <!--                                    <option>ინფორმაციული ტექნოლოგიები</option>-->
                        <!--                                </select>-->
                        <!--                            </div>-->
                        <!--                        </div>-->
                        <div class="col-md-2 no-padd">
                            <div class="input-group">
                                <button type="submit" class="btn btn-primary">Search Job</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="company-brand">
            <div class="container">
                <div id="company-brands" class="owl-carousel">
                    <div class="brand-img"><img src="assets/img/microsoft-home.png" class="img-responsive" alt=""/>
                    </div>
                    <div class="brand-img"><img src="assets/img/img-home.png" class="img-responsive" alt=""/></div>
                    <div class="brand-img"><img src="assets/img/mothercare-home.png" class="img-responsive" alt=""/>
                    </div>
                    <div class="brand-img"><img src="assets/img/paypal-home.png" class="img-responsive" alt=""/></div>
                    <div class="brand-img"><img src="assets/img/serv-home.png" class="img-responsive" alt=""/></div>
                    <div class="brand-img"><img src="assets/img/xerox-home.png" class="img-responsive" alt=""/></div>
                    <div class="brand-img"><img src="assets/img/yahoo-home.png" class="img-responsive" alt=""/></div>
                    <div class="brand-img"><img src="assets/img/mothercare-home.png" class="img-responsive" alt=""/>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="clearfix"></div>
    <section>
        <div class="container">
            <div class="row">
                <div class="main-heading">
                    <p>200 New Jobs</p>

                    <h2>New & Random <span>Jobs</span></h2>
                </div>
            </div>
            <div class="row extra-mrg">
                <?php foreach($jobs_portal as $job) : ?>
                    <div class="brows-job-list">
                        <div class="col-md-1 col-sm-2 small-padding">
                            <div class="brows-job-company-img">
                                <a href="job-detail.html"><img src="assets/img/com-1.jpg" class="img-responsive" alt=""></a>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-5">
                            <div class="brows-job-position">
                                <a href="job_detail.php?id=<?php echo $job->id; ?>"><h3><?php echo $job->job_title; ?></h3></a>
                                <p>
                                    <span><?php echo $job->company; ?></span><span class="brows-job-sallery"><i class="fa fa-money"></i><?php echo $job->salary; ?></span>
                                    <span class="job-type cl-success bg-trans-success"><?php echo $job->time; ?></span>
                                </p>
                            </div>
                        </div>

                        <div class="col-md-2 col-sm-2">
                            <div class="brows-job-link">
                                <a href="job_detail.php?id=<?php echo $job->id; ?>" class="btn btn-default">Apply Now</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <section class="video-sec dark" id="video" style="background-image:url(assets/img/banner-10.jpg);">
        <div class="container">
            <div class="row">
                <div class="main-heading">
                    <p>Best For Your Projects</p>

                    <h2>Watch Our <span>video</span></h2>
                </div>
            </div>
            <div class="video-part"><a href="#" data-toggle="modal" data-target="#my-video" class="video-btn"><i
                        class="fa fa-play"></i></a></div>
        </div>
    </section>
    <div class="clearfix"></div>
    <section class="how-it-works">
        <div class="container">
            <div class="row" data-aos="fade-up">
                <div class="col-md-12">
                    <div class="main-heading">
                        <p>Working Process</p>

                        <h2>How It <span>Works</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-4">
                    <div class="working-process">
                        <span class="process-img"><img src="assets/img/step-1.png" class="img-responsive" alt=""/><span
                                class="process-num">01</span></span>
                        <h4>Create An Account</h4>

                        <p>Post a job to tell us about your project. We'll quickly match you with the right freelancers
                            find place best.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="working-process">
                        <span class="process-img"><img src="assets/img/step-2.png" class="img-responsive" alt=""/><span
                                class="process-num">02</span></span>
                        <h4>Search Jobs</h4>

                        <p>Post a job to tell us about your project. We'll quickly match you with the right freelancers
                            find place best.</p>
                    </div>
                </div>
                <div class="col-md-4 col-sm-4">
                    <div class="working-process">
                        <span class="process-img"><img src="assets/img/step-3.png" class="img-responsive" alt=""/><span
                                class="process-num">03</span></span>
                        <h4>Save & Apply</h4>

                        <p>Post a job to tell us about your project. We'll quickly match you with the right freelancers
                            find place best.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <section class="testimonial" id="testimonial">
        <div class="container">
            <div class="row">
                <div class="main-heading">
                    <p>What Say Our Client</p>

                    <h2>Our Success <span>Stories</span></h2>
                </div>
            </div>
            <div class="row">
                <div id="client-testimonial-slider" class="owl-carousel">
                    <div class="client-testimonial">
                        <div class="pic"><img src="assets/img/client-1.jpg" alt=""></div>
                        <p class="client-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod tempor et dolore magna aliqua.</p>

                        <h3 class="client-testimonial-title">Lacky Mole</h3>
                        <ul class="client-testimonial-rating">
                            <li class="fa fa-star-o"></li>
                            <li class="fa fa-star-o"></li>
                            <li class="fa fa-star"></li>
                        </ul>
                    </div>
                    <div class="client-testimonial">
                        <div class="pic"><img src="assets/img/client-2.jpg" alt=""></div>
                        <p class="client-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod tempor et dolore magna aliqua.</p>

                        <h3 class="client-testimonial-title">Karan Wessi</h3>
                        <ul class="client-testimonial-rating">
                            <li class="fa fa-star-o"></li>
                            <li class="fa fa-star"></li>
                            <li class="fa fa-star"></li>
                        </ul>
                    </div>
                    <div class="client-testimonial">
                        <div class="pic"><img src="assets/img/client-3.jpg" alt=""></div>
                        <p class="client-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod tempor et dolore magna aliqua.</p>

                        <h3 class="client-testimonial-title">Roul Pinchai</h3>
                        <ul class="client-testimonial-rating">
                            <li class="fa fa-star-o"></li>
                            <li class="fa fa-star-o"></li>
                            <li class="fa fa-star"></li>
                        </ul>
                    </div>
                    <div class="client-testimonial">
                        <div class="pic"><img src="assets/img/client-1.jpg" alt=""></div>
                        <p class="client-description">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                            eiusmod tempor et dolore magna aliqua.</p>

                        <h3 class="client-testimonial-title">Adam Jinna</h3>
                        <ul class="client-testimonial-rating">
                            <li class="fa fa-star-o"></li>
                            <li class="fa fa-star-o"></li>
                            <li class="fa fa-star"></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="pricing">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="main-heading">
                        <p>Top Freelancer</p>

                        <h2>Hire Expert <span>Freelancer</span></h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 col-sm-6">
                    <div class="freelance-container style-2">
                        <div class="freelance-box">
                            <span class="freelance-status">Available</span>
                            <h4 class="flc-rate">$17/hr</h4>

                            <div class="freelance-inner-box">
                                <div class="freelance-box-thumb"><img src="assets/img/can-5.jpg"
                                                                      class="img-responsive img-circle" alt=""/></div>
                                <div class="freelance-box-detail">
                                    <h4>Agustin L. Smith</h4>
                                    <span class="location">Australia</span>
                                </div>
                                <div class="rattings"><i class="fa fa-star fill"></i><i class="fa fa-star fill"></i><i
                                        class="fa fa-star fill"></i><i class="fa fa-star-half fill"></i><i
                                        class="fa fa-star"></i></div>
                            </div>
                            <div class="freelance-box-extra">
                                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui.</p>
                                <ul>
                                    <li>Php</li>
                                    <li>Android</li>
                                    <li>Html</li>
                                    <li class="more-skill bg-primary">+3</li>
                                </ul>
                            </div>
                            <a href="freelancer-detail.html" class="btn btn-freelance-two bg-default">View Detail</a><a
                                href="freelancer-detail.html" class="btn btn-freelance-two bg-info">View Detail</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="freelance-container style-2">
                        <div class="freelance-box">
                            <span class="freelance-status bg-warning">At Work</span>
                            <h4 class="flc-rate">$22/hr</h4>

                            <div class="freelance-inner-box">
                                <div class="freelance-box-thumb"><img src="assets/img/can-5.jpg"
                                                                      class="img-responsive img-circle" alt=""/></div>
                                <div class="freelance-box-detail">
                                    <h4>Delores R. Williams</h4>
                                    <span class="location">United States</span>
                                </div>
                                <div class="rattings"><i class="fa fa-star fill"></i><i class="fa fa-star fill"></i><i
                                        class="fa fa-star fill"></i><i class="fa fa-star-half fill"></i><i
                                        class="fa fa-star"></i></div>
                            </div>
                            <div class="freelance-box-extra">
                                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui.</p>
                                <ul>
                                    <li>Php</li>
                                    <li>Android</li>
                                    <li>Html</li>
                                    <li class="more-skill bg-primary">+3</li>
                                </ul>
                            </div>
                            <a href="freelancer-detail.html" class="btn btn-freelance-two bg-default">View Detail</a><a
                                href="freelancer-detail.html" class="btn btn-freelance-two bg-info">View Detail</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-6">
                    <div class="freelance-container style-2">
                        <div class="freelance-box">
                            <span class="freelance-status">Available</span>
                            <h4 class="flc-rate">$19/hr</h4>

                            <div class="freelance-inner-box">
                                <div class="freelance-box-thumb"><img src="assets/img/can-5.jpg"
                                                                      class="img-responsive img-circle" alt=""/></div>
                                <div class="freelance-box-detail">
                                    <h4>Daniel Disroyer</h4>
                                    <span class="location">Bangladesh</span>
                                </div>
                                <div class="rattings"><i class="fa fa-star fill"></i><i class="fa fa-star fill"></i><i
                                        class="fa fa-star fill"></i><i class="fa fa-star-half fill"></i><i
                                        class="fa fa-star"></i></div>
                            </div>
                            <div class="freelance-box-extra">
                                <p>At vero eos et accusamus et iusto odio dignissimos ducimus qui.</p>
                                <ul>
                                    <li>Php</li>
                                    <li>Android</li>
                                    <li>Html</li>
                                    <li class="more-skill bg-primary">+3</li>
                                </ul>
                            </div>
                            <a href="freelancer-detail.html" class="btn btn-freelance-two bg-default">View Detail</a><a
                                href="freelancer-detail.html" class="btn btn-freelance-two bg-info">View Detail</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="text-center"><a href="freelancers-2.html" class="btn btn-primary">Load More</a></div>
                </div>
            </div>
        </div>
    </section>
    <section class="download-app" style="background-image:url(assets/img/banner-7.jpg);">
        <div class="container">
            <div class="col-md-5 col-sm-5 hidden-xs"><img src="assets/img/iphone.png" alt="iphone"
                                                          class="img-responsive"/></div>
            <div class="col-md-7 col-sm-7">
                <div class="app-content">
                    <h2>Download Our Best Apps</h2>
                    <h4>Best oppertunity in your hand</h4>

                    <p>Aliquam vestibulum cursus felis. In iaculis iaculis sapien ac condimentum. Vestibulum congue
                        posuere lacus, id tincidunt nisi porta sit amet. Suspendisse et sapien varius, pellentesque dui
                        non, semper orci. Curabitur blandit, diam ut ornare ultricies.</p>
                    <a href="#" class="btn call-btn"><i class="fa fa-apple"></i>Download</a><a href="#"
                                                                                               class="btn call-btn"><i
                            class="fa fa-android"></i>Download</a>
                </div>
            </div>
        </div>
    </section>
    <div class="clearfix"></div>
    <footer class="footer">
        <div class="row lg-menu">
            <div class="container">
                <div class="col-md-4 col-sm-4"><img src="assets/img/footer-logo.png" class="img-responsive" alt=""/>
                </div>
                <div class="col-md-8 co-sm-8 pull-right">
                    <ul>
                        <li><a href="index-2.html" title="">Home</a></li>
                        <li><a href="blog.html" title="">Blog</a></li>
                        <li><a href="404.html" title="">404</a></li>
                        <li><a href="faq.html" title="">FAQ</a></li>
                        <li><a href="contact.html" title="">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="row no-padding">
            <div class="container">
                <div class="col-md-3 col-sm-12">
                    <div class="footer-widget">
                        <h3 class="widgettitle widget-title">About Job Stock</h3>

                        <div class="textwidget">
                            <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem.</p>

                            <p>7860 North Park Place<br>San Francisco, CA 94120</p>

                            <p><strong>Email:</strong> Support@careerdesk</p>

                            <p><strong>Call:</strong> <a href="tel:+15555555555">555-555-1234</a></p>
                            <ul class="footer-social">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="footer-widget">
                        <h3 class="widgettitle widget-title">All Navigation</h3>

                        <div class="textwidget">
                            <div class="textwidget">
                                <ul class="footer-navigation">
                                    <li><a href="manage-company.html" title="">Front-end Design</a></li>
                                    <li><a href="manage-company.html" title="">Android Developer</a></li>
                                    <li><a href="manage-company.html" title="">CMS Development</a></li>
                                    <li><a href="manage-company.html" title="">PHP Development</a></li>
                                    <li><a href="manage-company.html" title="">IOS Developer</a></li>
                                    <li><a href="manage-company.html" title="">Iphone Developer</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="footer-widget">
                        <h3 class="widgettitle widget-title">All Categories</h3>

                        <div class="textwidget">
                            <ul class="footer-navigation">
                                <li><a href="manage-company.html" title="">Front-end Design</a></li>
                                <li><a href="manage-company.html" title="">Android Developer</a></li>
                                <li><a href="manage-company.html" title="">CMS Development</a></li>
                                <li><a href="manage-company.html" title="">PHP Development</a></li>
                                <li><a href="manage-company.html" title="">IOS Developer</a></li>
                                <li><a href="manage-company.html" title="">Iphone Developer</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-3 col-sm-4">
                    <div class="footer-widget">
                        <h3 class="widgettitle widget-title">Connect Us</h3>

                        <div class="textwidget">
                            <form class="footer-form"><input type="text" class="form-control" placeholder="Your Name">
                                <input type="text" class="form-control" placeholder="Email"><textarea
                                    class="form-control" placeholder="Message"></textarea>
                                <button type="submit" class="btn btn-primary">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row copyright">
            <div class="container">
                <p><a target="_blank" href="https://www.templateshub.net">Templates Hub</a></p>
            </div>
        </div>
    </footer>
    <div class="clearfix"></div>
    <div class="modal fade" id="signup" tabindex="-1" role="dialog" aria-labelledby="myModalLabel2" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="tab" role="tabpanel">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#login" role="tab" data-toggle="tab">Sign
                                    In</a></li>
                            <li role="presentation"><a href="#register" role="tab" data-toggle="tab">Sign Up</a></li>
                        </ul>
                        <div class="tab-content" id="myModalLabel2">
                            <div role="tabpanel" class="tab-pane fade in active" id="login">
                                <img src="assets/img/logo.png" class="img-responsive" alt=""/>

                                <div class="subscribe wow fadeInUp">
                                    <form class="form-inline" method="post">
                                        <div class="col-sm-12">
                                            <div class="form-group">
                                                <input type="email" name="email" class="form-control"
                                                       placeholder="Username" required="">
                                                <input type="password" name="password" class="form-control" placeholder="Password" required="">



                                                <div class="center">
                                                    <button type="submit" id="login-btn" name="login" class="submit-btn"> Login
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div role="tabpanel" class="tab-pane fade" id="register">
                                <img src="assets/img/logo.png" class="img-responsive" alt=""/>

                                <form class="form-inline" method="post">
                                    <div class="col-sm-12">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="name"  placeholder="Your Name">
                                            <input type="email" class="form-control" name="email" placeholder="Your Email">
                                            <input type="text" class="form-control" name="username" placeholder="Useraname">
                                            <input type="password" class="form-control" name="password" placeholder="Password">
                                            <input type="confirm_password" class="form-control" name="confirm_password" placeholder="confirm_password">
                                            <div class="center">
                                                <button type="submit" id="subscribe" name="signup" class="submit-btn"> Create
                                                    Account
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button class="w3-button w3-teal w3-xlarge w3-right" onclick="openRightMenu()"><i class="spin fa fa-cog"
                                                                                      aria-hidden="true"></i></button>
    <div class="w3-sidebar w3-bar-block w3-card-2 w3-animate-right" style="display:none;right:0;" id="rightMenu">
        <button onclick="closeRightMenu()" class="w3-bar-item w3-button w3-large">Close &times;</button>
        <ul id="styleOptions" title="switch styling">
            <li><a href="javascript: void(0)" class="cl-box blue" data-theme="colors/blue-style"></a></li>
            <li><a href="javascript: void(0)" class="cl-box red" data-theme="colors/red-style"></a></li>
            <li><a href="javascript: void(0)" class="cl-box purple" data-theme="colors/purple-style"></a></li>
            <li><a href="javascript: void(0)" class="cl-box green" data-theme="colors/green-style"></a></li>
            <li><a href="javascript: void(0)" class="cl-box dark-red" data-theme="colors/dark-red-style"></a></li>
            <li><a href="javascript: void(0)" class="cl-box orange" data-theme="colors/orange-style"></a></li>
            <li><a href="javascript: void(0)" class="cl-box sea-blue" data-theme="colors/sea-blue-style "></a></li>
            <li><a href="javascript: void(0)" class="cl-box pink" data-theme="colors/pink-style"></a></li>
        </ul>
    </div>
    <!-- Scripts==================================================-->
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
    <script src="assets/js/custom.js"></script>
    <script src="assets/js/jQuery.style.switcher.js"></script>
    <script type="text/javascript">$(document).ready(function () {
            $('#styleOptions').styleSwitcher();
        });</script>
    <script>function openRightMenu() {
            document.getElementById("rightMenu").style.display = "block";
        }
        function closeRightMenu() {
            document.getElementById("rightMenu").style.display = "none";
        }</script>
</div>
</body>

</html>








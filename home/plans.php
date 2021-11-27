<?php 
include("../functions/init.php");

if(isset($_SESSION['login'])) {

   
?>



<!DOCTYPE html>
<html lang="en">

<?php include("include/head.php") ?>

<body class="layout-2">
    <div id="app">
        <div class="main-wrapper">


            <?php
            //get user details
            user_details(); 
            
             include("include/nav.php"); 
             include("include/sidebar.php");
            ?>
            <!--Greet new customer -->
            <div class="main-content">
                <section class="section">



                    <div class="section-body">

                        <div class="hero-inner">
                            <h2 class="text-dark">Saving Plans</h2>
                            <p class="lead">Enjoy a well developed student-in-mind savings package that meet your
                                everyday needs.
                            </p>
                        </div>

                        <div class="row">
                            <div class="col-lg-4 col-md-4 col-sm-12 pl-0">
                                <div class="card card-statistic-2">
                                    <div class="card-wrap">
                                        <div class="card-header">
                                            <h4 class="lead mb-2">YOUR CLASSIC SAVINGS</h4>
                                        </div>
                                        <div class="card-body">
                                            ₦ <?php echo number_format($t_users['wallet'] + $t_ref_earn) ?>
                                        </div>
                                        <div class="card-header">
                                            <h4 style="cursor: pointer" class="lead mt-3 mb-4 text-primary"
                                                data-toggle="modal" data-target="#payModal"><b>SAVE NOW</b>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 pl-0">
                                <div class="card card-statistic-2">
                                    <div class="card-wrap">
                                        <div class="card-header">
                                            <h4 class="lead mb-2">YOUR FLEX SAVINGS</h4>
                                        </div>
                                        <div class="card-body">
                                            ₦ <?php echo number_format($t_users['wallet'] + $t_ref_earn) ?>
                                        </div>
                                        <div class="card-header">
                                            <h4 style="cursor: pointer" class="lead mt-3 mb-4 text-primary"
                                                data-toggle="modal" data-target="#payModal"><b>SAVE NOW</b>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4 col-sm-12 pl-0">
                                <div class="card card-statistic-2">
                                    <div class="card-wrap">
                                        <div class="card-header">
                                            <h4 class="lead mb-2">YOUR CAMPUS SAVINGS</h4>
                                        </div>
                                        <div class="card-body">
                                            ₦ <?php echo number_format($t_users['wallet'] + $t_ref_earn) ?>
                                        </div>
                                        <div class="card-header">
                                            <h4 style="cursor: pointer" class="lead mt-3 mb-4 text-primary"
                                                data-toggle="modal" data-target="#payModal"><b>SAVE NOW</b>
                                            </h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 col-md-4 col-lg-4 pl-0">
                                <div class="pricing">
                                    <div class="pricing-title">
                                        Classic Plan
                                    </div>
                                    <div class="pricing-padding">
                                        <div class="pricing-price">
                                            <div>₦2,000</div>
                                            <div>2 months and above</div>
                                        </div>
                                        <div class="pricing-details">
                                            <div class="pricing-item">
                                                <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                                <div class="pricing-item-label">1 user agent</div>
                                            </div>
                                            <div class="pricing-item">
                                                <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                                <div class="pricing-item-label">Core features</div>
                                            </div>
                                            <div class="pricing-item">
                                                <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                                <div class="pricing-item-label">1GB storage</div>
                                            </div>
                                            <div class="pricing-item">
                                                <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                                <div class="pricing-item-label">2 Custom domain</div>
                                            </div>
                                            <div class="pricing-item">
                                                <div class="pricing-item-icon bg-danger text-white"><i
                                                        class="fas fa-times"></i></div>
                                                <div class="pricing-item-label">Live Support</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pricing-cta">
                                        <a href="#">Subscribe <i class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4 pl-0">
                                <div class="pricing pricing-highlight">
                                    <div class="pricing-title">
                                        FLEX PLAN
                                    </div>
                                    <div class="pricing-padding">
                                        <div class="pricing-price">
                                            <div>$60</div>
                                            <div>per month</div>
                                        </div>
                                        <div class="pricing-details">
                                            <div class="pricing-item">
                                                <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                                <div class="pricing-item-label">5 user agent</div>
                                            </div>
                                            <div class="pricing-item">
                                                <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                                <div class="pricing-item-label">Core features</div>
                                            </div>
                                            <div class="pricing-item">
                                                <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                                <div class="pricing-item-label">10GB storage</div>
                                            </div>
                                            <div class="pricing-item">
                                                <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                                <div class="pricing-item-label">10 Custom domain</div>
                                            </div>
                                            <div class="pricing-item">
                                                <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                                <div class="pricing-item-label">24/7 Support</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pricing-cta">
                                        <a href="#">Subscribe <i class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-12 col-md-4 col-lg-4 pl-0">
                                <div class="pricing">
                                    <div class="pricing-title">
                                        Enterprise
                                    </div>
                                    <div class="pricing-padding">
                                        <div class="pricing-price">
                                            <div>$499</div>
                                            <div>per month</div>
                                        </div>
                                        <div class="pricing-details">
                                            <div class="pricing-item">
                                                <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                                <div class="pricing-item-label">Unlimited user agent</div>
                                            </div>
                                            <div class="pricing-item">
                                                <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                                <div class="pricing-item-label">Core features</div>
                                            </div>
                                            <div class="pricing-item">
                                                <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                                <div class="pricing-item-label">8TB storage</div>
                                            </div>
                                            <div class="pricing-item">
                                                <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                                <div class="pricing-item-label">Unlimited custom domain</div>
                                            </div>
                                            <div class="pricing-item">
                                                <div class="pricing-item-icon"><i class="fas fa-check"></i></div>
                                                <div class="pricing-item-label">Lifetime Support</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pricing-cta">
                                        <a href="#">Subscribe <i class="fas fa-arrow-right"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="row mt-5">

                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <a data-toggle="modal" href="#classicModal">
                                            <div id=" carouselExampleIndicators" class="carousel slide"
                                                data-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img class="d-block w-100" src="assets/img/cl1.jpg"
                                                            alt="First slide">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100" src="assets/img/cl2.jpg"
                                                            alt="Second slide">
                                                    </div>

                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <a data-toggle="modal" href="#flexModal">
                                            <div id=" carouselExampleIndicators" class="carousel slide"
                                                data-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img class="d-block w-100" src="assets/img/fl1.jpg"
                                                            alt="First slide">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100" src="assets/img/fl2.jpg"
                                                            alt="Second slide">
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>


                            <div class="col-lg-4 col-md-4 col-sm-12">
                                <div class="card">
                                    <div class="card-body">
                                        <a data-toggle="modal" href="#campusModal">
                                            <div id=" carouselExampleIndicators" class="carousel slide"
                                                data-ride="carousel">
                                                <div class="carousel-inner">
                                                    <div class="carousel-item active">
                                                        <img class="d-block w-100" src="assets/img/cp1.jpg"
                                                            alt="First slide">
                                                    </div>
                                                    <div class="carousel-item">
                                                        <img class="d-block w-100" src="assets/img/cp2.jpg"
                                                            alt="Second slide">
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                                </div>
                            </div>



                        </div>

                    </div>

            </div>
            </section>
        </div>
    </div>
    </div>


    <?php
 include("include/footer.php");
 include("include/component/modal.php"); ?>




    <!-- General JS Scripts -->
    <script src="assets/modules/jquery.min.js"></script>
    <script src="assets/modules/popper.js"></script>
    <script src="assets/modules/tooltip.js"></script>
    <script src="assets/modules/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/modules/nicescroll/jquery.nicescroll.min.js"></script>
    <script src="assets/modules/moment.min.js"></script>
    <script src="assets/js/stisla.js"></script>

    <!-- JS Libraies -->
    <script src="assets/modules/sticky-kit.js"></script>

    <!-- Page Specific JS File -->

    <!-- Template JS File -->
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/custom.js"></script>
    <script src="ajax.js"></script>
</body>

</html>


<?php

  
} else {

    redirect(".././logout");

}
?>